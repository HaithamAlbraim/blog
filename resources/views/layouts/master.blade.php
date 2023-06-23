<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse position-relative " id="navbarSupportedContent">

        <div class=" d-flex position-absolute top-0 end-0">

          <a href="{{ route('showAll') }}" class="btn btn-primary mx-4  ">Blog</a>
          @auth

            <a href="{{ route('post.index') }}" class="btn btn-primary mx-4">My posts</a>
          @endauth


          <form class="d-flex  mx-4" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @auth
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                  aria-expanded="false">

                  <i class="fa-sharp fa-regular fa-bell fa"></i>
                  {{ Auth::user()->unreadNotifications->count() }}
                </button>

                <ul class="dropdown-menu">

                  @foreach (Auth::user()->unreadNotifications as $notification)
                     <li>
                      <h6>{{$notification->data['created_by']}}</h6>
                     
                      <a class="dropdown-item" href="{{route('s',['nid'=>$notification,'cid'=>$notification->data['comment_id']])}}">{{$notification->data['post_title']}}</a>
                    <p>{{$notification->created_at}}</p> 
                    </li> 
                  @endforeach

                
                 
                </ul>
              </div>
              <div class="dropdown mx-4 px-4">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  {{ Auth::user()->name }}
                </button>

                <ul class="dropdown-menu ">
                  <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf


                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
              this.closest('form').submit();">Logout</a></li>

                  </form>
                </ul>
              </div>

            @endauth
            @guest

              <li class="nav-item mx-2">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
            @endguest


          </ul>
        </div>
      </div>
    </div>


  </nav>

  <br>
  <br>
  <br>
  @yield('content')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
