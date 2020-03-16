<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Posts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderBy('created_at','DESC')->get();
        return view('main.index',[
            'posts' => $posts,
        ]);
    }
    public function show(\App\Posts $post)
    {
        return view('main.show',[
            'post' => $post,
        ]);
    }
}
