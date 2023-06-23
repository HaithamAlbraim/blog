<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Notifications\CreateComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use PhpParser\Builder\Use_;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function s($nid,$cid)
    {
        $unread_note=Auth::user()->unreadNotifications->where('id',$nid)->first();
        if($unread_note)
        {
        $unread_note->markAsRead();
        }
        // print_r($unread_note);
        $comment=Comment::find($cid);
        $post=$comment->post;

        return view('posts.show',compact('post'));
        // return $unread_note;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {


      $comment=Comment::create([
          'user_id'=>Auth::user()->id,
          'post_id'=>$request->post_id,
          'body'=>$request->comment_body
      ]);

    $comment_r=Comment::find($comment->id);
    $post_title=$comment_r->post->title;
      $user_id=$request->resever_user;
      $user=User::where('id','=',$user_id)->first();
      $created_by=Auth::user()->name ;     

      Notification::send($user,new CreateComment($comment->id,$created_by,$post_title));
    
      return redirect()->back();
        
    
     



    }
        

       

    /**
     * Display the specified resource.
     */
    public function show($notification)
    {
      // $comment=CreateComment::find('id','=',$notification)->first() ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
