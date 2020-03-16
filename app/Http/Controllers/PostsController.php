<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Categories;
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
        return view('home');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('admin.posts.create',[
            'categories' => $categories,
        ]);
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
            'cat_id'=>'required',
        ]);
    
        $img = $data['img'];

        $img_name = time().$img->getClientOriginalName();

        $img->move('uploads/posts',$img_name);
        $data['img'] = '/uploads/posts/' . $img_name;
        

        Posts::create($data);

        return redirect()->route('posts.show');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        $posts = Posts::all();
        $categories = Categories::all();
        return view('admin.posts.index',[
            'posts' => $posts,
            'categories' => $categories,
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
        return view('admin.posts.edit')->with('post',$post);
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

        if(($request->img))
        {   
            $img = $request->img;

            $img_name = time().$img->getClientOriginalName();
    
            $img->move('uploads/posts',$img_name);
    
            $post->img = '/uploads/posts/' . $img_name;
        }
        $post->save();

        return redirect()->route('posts.show');
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
