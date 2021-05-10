<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Tag;
use DB;
use App\Http\Requests\StoreRequest;
use Brian2694\Toastr\Facades\Toastr;

class AutoController extends Controller
{
    public function index()
    { 
        $autos = Auto::paginate(5);

        return view('backend.index', compact('autos'));
       
    }

    public function create()
    {   
        $tags = DB::table('tags')->get();

        return view('backend.create')->with('tags', $tags);
    }

    public function store(StoreRequest $request)
    {   
        $auto = new Auto;

        $auto->brand = $request->input('brand');

        $auto->model = $request->input('model');

        $auto->engine_size = $request->input('engine_size');

        $auto->price = $request->input('price');

        $auto->status ='active';

        $auto->registration_date =$request->input('registration_date');

        $auto->image=$request->image;
       
        if($request->hasFile('image')) {

            $image = $request->image;

            $filename = $image->getClientOriginalName();

            $destinationPath = public_path('/images/');

            $image->move($destinationPath , $filename);

            $auto->image = $filename;
        }
        
        $auto->save();
       
        $tag_id =$request->input('tag_id');

        $auto->tags()->attach($tag_id);
        
        Toastr::success('Auto added successfully :)','Success');

        return redirect()->route('admin.autos.index');
    }

    public function show($id)
    {
        $auto = Auto::find($id);

        $tags = DB::table('tags')->get();

        return view('backend.show',compact('auto'))->with('tags', $tags);
    }

    public function edit($id)
    {
        $auto = Auto::find($id);

        return view('backend.edit',compact('auto'));
    }

    public function update(StoreRequest  $request, $id)
    {
        $auto = Auto::find($id);

        $auto->brand = $request->brand;

        $auto->model = $request->model;

        $auto->engine_size = $request->engine_size;

        $auto->price = $request->price;

        $auto->registration_date = $request->registration_date;
        
        if($request->hasFile('image')) {

            $image = $request->image;

            $filename = $image->getClientOriginalName();

            $destinationPath = public_path('/images/');

            $image->move($destinationPath , $filename);

            $auto->image = $filename;
        }
        
        $auto->save();

        Toastr::success('Auto updated successfully :)','Success');

        return redirect()->route('admin.autos.index');
    }
   
    public function destroy($id)
    {
        $auto = Auto::findOrFail($id);

        $auto->delete();

        Toastr::success('Auto deleted successfully :)','Success');
        
        return redirect()->route('admin.autos.index');
    }

    public function search(Request $request) 
    {  
        $search = $request->input('search');

        $autos = Auto::query()->where('model','LIKE', "%{$search}%")->paginate(5);

        $autos->appends(['search' => $search]);
        
        return view('Backend.search', compact('autos'));
    }
}
