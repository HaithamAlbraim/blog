@extends('layouts.master')

@section('content')
    <br>
    <br>
<div class="container-fluid">

  <a href="{{route("post.create")}}" class="btn btn-primary">Create post</a>
  <div class="card">
  @foreach ($posts as $post)
      
  <div class="card-body">
    <span style="font-size:24px ; margin-right: 940px "> {{$post->title}}
      
      
      <div class="justify-content-end d-flex"> 
        
        <button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#{{$post->id}}" aria-expanded="false" aria-controls="{{$post->id}}">
          
          show full post
        </button>
      </div>
    </span>
    <hr>
    <div class="collapse" id="{{$post->id}}">
     
        {{$post->body}}
        <div>
           <span>

             <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary"> update</a>
             <form action="{{route('post.destroy',$post)}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
              
            </form>
          </span>
          <hr>
      </div>
    
    </div>
  </div>
  @endforeach
</div>
</div>
  @endsection