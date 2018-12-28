<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Category;
use App\post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $categories = Category::all();
        View::share('categories', $categories);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('home',compact('posts'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function posts_specefic_category($id)
    {
        $posts = post::where('id',$id)->get();
        return view('category',compact('posts'));
    }

    public function specific_post_details($id)
    {
        $post = Post::findOrFail($id);
        return view('post',compact('post'));
    }
}
