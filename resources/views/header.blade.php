<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styleku.css') }}">
    <title>BetterMe</title>
    <link rel="shortcut icon" href="{{ asset('image/betterme.png')}}">
  </head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="{{ url('/home')}}">
      <img src="{{ asset('image/betterme.png')}}" width="50" height="50" class=" align-top" alt="">
    </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/home')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('/about')}}">About Us <span class="sr-only">(current)</span></a>
          </li>
        </ul>
  
        <div class = "col-md-3">
               <p class="text-dark"><?php echo "Welcome, ".$user->nama ?></p>
               
                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                        </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">  
                   @csrf
                 </form>
          </div>
      </div>

    </nav>
	