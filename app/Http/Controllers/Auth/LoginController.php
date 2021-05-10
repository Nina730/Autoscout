<?php
namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Auto;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Brian2694\Toastr\Facades\Toastr;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
    public function showLogin()
    {
       return view('auth.login');
    }

    
    public function process_login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)
            ->first();

        if (!is_null($user))
        {

            $remember = $request->has('remember_token') ? true : false;

            $credentials = $request->except(['_token']);

            if (auth()->attempt($credentials))
            {

                if ($user->role_id == 1)
                {
                    return redirect()->route('admin.dashboard');
                }
                else
                {
                    $auto = Auto::with('tags')->paginate(6);
                   return view('Frontend.index', compact('auto'));
                }

            }
            else
                {   Toastr::error('This user doesnt exist :)','Error');
                    return redirect()->back();
                }
        }
        else
            {  Toastr::error('This user doesnt exist,please register!!!','Error');
                return redirect()->back();
            }
    }
    public function show_signup_form()
    {
        return view('auth.register');
    }

    public function process_signup(Request $request)
    {
        $request->validate
            ([
                'name' => 'required', 
                'email' => 'required', 
                'password' => 'required', 
                'role_id' => 'required'
                
            ]);

        $user = User::create
            ([
                'name' => trim($request->input('name')) , 
                'email' => strtolower($request->input('email')) ,
                'password' => bcrypt($request->input('password')) ,
                'role_id' => $request->input('role_id') ,

            ]);

        session()->flash('message', 'Your account is created');

        return redirect()->route('login');
    }
    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }

}
