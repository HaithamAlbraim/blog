@extends('../layouts.master')

@section('content') 
<div class="container d-flex mt-4 justify-content-center">
<div class="card p-4" style="width:400px">
    
<form action="{{route('post.store')}}" method="post">
  
  @csrf

  title
  <input type="text" name="title" class="form-control"> <br>
  post
  <input type="text" name="body" class="form-control"> <br>
  <button type="submit" class="btn btn-primary">create</button>
  
</form>
</div>
</div>
@endsection