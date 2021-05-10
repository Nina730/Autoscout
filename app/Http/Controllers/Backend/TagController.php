<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use DB;
use App\Http\Requests\TagRequest;
use Brian2694\Toastr\Facades\Toastr;

class TagController extends Controller
{   
    public function index()
    {   
        $tags = DB::table('tags')->get();

        return view('backend.createTag', ['tags' => $tags]);
    }

    public function create()
    {
        return view('backend.createTag');
    }

    public function store(TagRequest $request)
    {   
        $tag = new Tag;

        $tag->name = $request->name;
        
        $tag->save();

        Toastr::success('Tag added successfully :)','Success');
        
        return redirect()->route('admin.tags.index');
    }

}
