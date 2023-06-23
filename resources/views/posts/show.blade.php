@extends('layouts.master')

@section('content')

<div class="container mt-4">
 
    <div class="card border-info mb-3" style="max-width: 960px;">
      <div class="card-header">{{$post->user->name}}</div>
      <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
    

      <p class="card-text">{{$post->body}} </p>
   
    </div>
    
    <div class="card-footer">
     {{-- Modal --}}
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Comments
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class=" modal-dialog modal-dialog-centered modal-dialog-scrollable"  >
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
         
            @foreach ($post->comments as $comment)
                
            <div class="card ">
              
              <div class="card-header">
                
                {{-- @if ($comment->user) --}}
                    
                {{$comment->user->name}}
                {{-- @endif  --}}
              </div>
              <div class="card-body">
                
                <p class="card-text">{{$comment->body}}</p>
                
              </div>
              <div class="card-footer text-body-secondary">
                commented at:{{$comment->created_at}}
              </div>
            </div> 
            @endforeach
           
          </div>
         
        </div>
      </div>
    </div>
    {{-- End of modal --}}
  </div>
  
</div>
</div>
@endsection
