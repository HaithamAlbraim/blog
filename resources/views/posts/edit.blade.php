@extends('../layouts.master')

@section('content') 
<div class="container d-flex mt-4 justify-content-center">
<div class="card p-4" style="width:400px">
    
<form action="{{route('post.update',$post)}}" method="post">
  
  @csrf
@method('PUT')
  title
  <input type="text" name="title" class="form-control" value="{{$post->title}}"> <br>
  post
  <input type="text" name="body" class="form-control" value="{{$post->body}}"> <br>
  <button type="submit" class="btn btn-primary">update</button>
  
</form>
</div>
</div>
@endsection