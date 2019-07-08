<?php

namespace App\Http\Controllers\User;

use App\City;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $cities = City::all();

        return view('user.index',compact('categories','cities'));
    }

    /**
     * Get All Post by Category
     */
    public function postsByCategory(Request $request,$cat_id){
        $category = Category::findOrFail($cat_id);
        $categories = Category::all();
        $cities = City::all();

        $posts = Post::where('category_id',$cat_id)->paginate(50);

        return view('user.postsByCategory',compact('categories','category','posts','cities'));
    }

    /**
     * Get All posts by City
     */
    public function postsByCity(Request $request,$city_id){
        $category = Category::findOrFail($city_id);
        $categories = Category::all();
        $cities = City::all();

        $posts = Post::where('city_id',$city_id)->paginate(50);

        return view('user.postsByCategory',compact('categories','category','posts','cities'));
    }

    /**
     * Get All posts By Search
     */
    public function postsBySearch(Request $request){

        $categories = Category::all();
        $cities = City::all();

        $posts = Post::query();

        $searchQuery = "";
        if ( $request->search ){
            
            $searchQuery .= $request->search;

            $posts = $posts->where(function($query) use ($request){
                $query->where('title','Like','%'.$request->search.'%');
                $query->orWhere('description','Like','%'.$request->search.'%');
            });
        }

        if( $request->category ){

            $searchQuery .= Category::find($request->category)->name;

            $posts = $posts->where('category_id',$request->category);
        }

        if( $request->city ){

            $searchQuery .= City::find($request->city)->name;

            $posts = $posts->where('city_id',$request->city);
        }

        $posts = $posts->paginate(50);
        

        return view('user.search',compact('categories','category','posts','cities','searchQuery'));
    }

    /**
     * Get Post Details
     */
    public function postDetail(Request $request,$id){
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $cities = City::all();

        return view('user.postDetail',compact('categories','post','cities'));
    }
}
