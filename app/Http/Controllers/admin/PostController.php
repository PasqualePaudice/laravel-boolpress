<?php

namespace App\Http\Controllers\admin;

use App\Post;
use App\Category;
use App\Tag;
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
        $tags = Tag::all();
        return view('admin.PostCreate',['categories'=> $categories,'tags'=>$tags]);
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

        $post->tags()->sync($dati['tag_id']);

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
        $tags = Tag::all();
        return view('admin/PostEdit',['post'=>$post , 'tags'=>$tags]);
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
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'content' => 'required',
            'image' => 'image'
        ]);

        $dati=$request->all();

        if (!empty($dati['image'])) {

            if (!empty($post->image)) {
                Storage::delete($post->image);
            }

            $image = $dati['image'];
            $image_path = Storage::put('uploads',$image);
            $dati['image'] = $image_path;
        }

        $post->update($dati);
        if(!empty($dati['tag_id'])) {
        $post->tags()->sync($dati['tag_id']);
    }
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
        if (!empty($post->image)) {
            Storage::delete($post->image);
        }


        if ($post->tags->isNotEmpty()) {
            $post->tags()->sync([]);
        }

        $post->delete($id);
        return redirect()->route('admin.posts.index');
    }
}
