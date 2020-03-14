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
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
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
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'title'=>'required',
            'body'=>'required',
            'img'=>'required|image',
            'author'=>'required',
        ]);
    
        $img = $data['img'];

        $img_name = time().$img->getClientOriginalName();

        $img->move('uploads/posts',$img_name);
        $data['img'] = '/uploads/posts/' . $img_name;
        

        Posts::create($data);

        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(\App\Posts $post)
    {
        return view('main.show',[
            'post' => $post,
        ]);
    }
    
    public function showall()
    {
        $posts = Posts::orderBy('created_at','DESC')->get();
        return view('main.index',[
            'posts' => $posts,
        ]);
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

        return redirect()->route('posts.index');
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

        return redirect()->route('posts.index');
    }
}
