<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;  
class PostsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();
        return json_encode($posts);
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
        $done = ['insertion => Success'];
        return json_encode($done);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $result = Posts::findOrFail($post);
        return json_encode($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $done = ['update => Success'];
        return json_encode($done);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Not Working
        $post = Posts::firdOrFail($id);
        $post->delete();
        $done = ['Deletion => Success'];
        return json_encode($done);
    }
}
