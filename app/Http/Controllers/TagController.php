<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags_data=Tag::orderBy('created_at','DESC')->paginate(20);
        return view('admin.tags.index',compact('tags_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);

        $tag=Tag::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name,'-'),
            'description'=>$request->description
        ]);

        Session::flash('success','Tag Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request,[
            'name'=>"required|unique:categories,name,$tag->name"
        ]);

        // $category=Category::update([
        //     'name'=>$request->name,
        //     'slug'=>Str::slug($request->name,'-'),
        //     'description'=>$request->description
        // ]);
        $tag->name=$request->name;
        $tag->slug=Str::slug($request->name,'-');
        $tag->description=$request->description;
        $tag->save();

        Session::flash('success','Tag Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if ($tag) {
            $tag->delete();
            Session::flash('success','Tag Deleted Successfully');
            return redirect()->back();        
        }
    }
}
