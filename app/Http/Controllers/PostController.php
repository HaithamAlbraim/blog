<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{


    public function showAll()
    {
        $posts=Post::latest()->get();

        return view('blog',compact('posts'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::where('user_id',Auth::user()->id)->latest()->get();

        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $post=Post::create([
            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'body'=>$request->body
        ]);
        return redirect()->Route('post.index')->with('success','item added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        

       
        $post=Post::findorFail($post->id);
        $post->update([
            'title'=>$request->title,
            'body'=>$request->body
        ]);
        return redirect()->route('post.index')->with('success','item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post=Post::destroy($post->id);
        return redirect()->route('post.index')->with('success','item deleted successfully');
    }
}
