<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
    public function index()
    {
        return view('admin.posts.create');
    }

    public function all()
    {
        $posts = Posts::all();
        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Posts();
        //dd($request->img);


        $img = $request->img;



        $img_name = time().$img->getClientOriginalName();



        $img->move('uploads/posts',$img_name);

        //$post->img = 'dsadsa.png';
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author = $request->author;

        $post->img = 'uploads/posts/' . $img_name;

        $post->save();

        return redirect()->route('indexPost');

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
        $post = Posts::findOrFail($id);
        return view('admin.posts.update')->with('post',$post);
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
        $post = Posts::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author = $request->author;

        $img = $request->img;

        $img_name = time().$img->getClientOriginalName();

        $img->move('uploads/posts',$img_name);

        $post->img = 'uploads/posts/' . $img_name;


        $post->save();

        return redirect()->route('indexPost');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findOrFail($id);

        $post->delete();

        return redirect()->back();
    }

    public function trash()
    {
        $post = Posts::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('trash',$post);
    }

    public function kill($id)
    {
        $post = Posts::withTrashed()->where('id',$id);

        $post->forceDelete();

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Posts::withTrashed()->where('id',$id)->restore();

        return redirect()->route('indexPost');
    }

    // users

    public function user()
    {
        $posts = Posts::all();
        return view('main.posts')->with('posts',$posts);
    }
}
