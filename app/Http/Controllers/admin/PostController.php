<?php

namespace App\Http\Controllers\admin;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;






class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        
        return view('admin/Post',['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.PostCreate',['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dati= $request->all();


        $post= new Post();

        $post->fill($dati);


        if (!empty($dati['image'])) {
            $image= $dati['image'];
            $image_path = Storage::put('uploads',$image);
            $post->image = $image_path;
        }

        $slug_originale= Str::slug($dati['title']);
        $slug = $slug_originale;

        $post_slug =Post::where('slug',$slug)->first();

        $slug_trovati=1;
        while(!empty($post_slug)){
            $slug= $slug_originale.'-'.$slug_trovati;
            $post_slug =Post::where('slug',$slug)->first();
            $slug_trovati++;
        }

        $post->slug= $slug;

        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.PostShow',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin/PostEdit',['post'=>$post]);
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

        $dati=$request->all();
        $post->update($dati);
        return redirect()->route('admin.posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->destroy($id);
        return redirect()->route('admin.posts.index');
    }
}
