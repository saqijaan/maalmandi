<?php

namespace App\Http\Controllers\admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\City;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $cities = City::all();
        return view('admin.posts.add', compact('categories', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'category_id'       => 'required',
            'city_id'           => 'required',
            'title'             => 'required|unique:posts,title',
            'description'       => 'required',
            'main_image'        => 'required|image',
        ];

        $this->validate($request, $rules);

        $image = $request->main_image;
        $imageName = md5(microtime()).'.'.$image->getClientOriginalExtension();
        $image->storeAs('posts/images', $imageName);

        Post::create([
            'user_id'       => auth()->Id()??1,
            'category_id'   => $request->category_id,
            'city_id'       => $request->city_id,
            'title'         => $request->title,
            'active'        => $request->active,
            'description'   => $request->description,
            'main_image'    => $imageName,
        ]);

        session()->flash('alert-success', 'Post Created Successfully');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $cities = City::all();
        $post  = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post','categories','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Post = Post::findOrFail($id);

        $rules = [
            'category_id'       => 'required',
            'city_id'           => 'required',
            'title'             => 'required|unique:posts,title,'.$id,
            'description'       => 'required',
        ];

        if ($request->hasFile('')) {
            $rules['main_image'] = 'required|image';
        }

        $this->validate($request, $rules);

        $imageName = $Post->main_image;

        if ($request->hasFile('main_image')){
            $image = $request->main_image;
            $imageName = md5(microtime()).'.'.$image->getClientOriginalExtension();
            $image->storeAs('posts/images', $imageName);
        }

        $Post->update([
            'user_id'       => auth()->Id()??1,
            'category_id'   => $request->category_id,
            'city_id'       => $request->city_id,
            'title'         => $request->title,
            'active'        => $request->active,
            'description'   => $request->description,
            'main_image'    => $imageName,
        ]);

        session()->flash('alert-success', 'Post Updated Successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Post = Post::find($id);
        $Post->delete();
        session()->flash('alert-success', 'Post deleted Successfully');
        return redirect()->route('post.index');
    }
}
