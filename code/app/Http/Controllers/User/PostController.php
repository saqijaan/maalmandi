<?php

namespace App\Http\Controllers\User;

use App\City;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $cities = City::all();
        $posts = Post::where('user_id',auth()->Id())->paginate(50);
        return view('user.posts.index', compact('posts','categories', 'cities'));
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
        return view('user.newPost', compact('categories', 'cities'));
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
            'price'             => 'required|numeric',
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
            'description'   => $request->description,
            'price'         => $request->price,
            'main_image'    => $imageName,
        ]);

        session()->flash('alert-success', 'Post Created Successfully');
        // return redirect()->route('user.post.index');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
