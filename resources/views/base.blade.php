<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" 
     integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
    @yield('head-element')

    <title>Vromon</title>
    
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2" id='navbar'>
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Vromon</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('article.add')}}">Blog</a>
                        </li>
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Service
                                </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @auth
                                    @if (auth()->user()->hotel()->count() == 1)
                                        <li><a class="dropdown-item" href="{{ route('hotel.booking') }}">Hotel</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="{{ route('hotel.list') }}">Hotel</a></li>
                                    @endif
                                @endauth

                                @guest
                                    <li><a class="dropdown-item" href="{{ route('hotel.list') }}">Hotel</a></li>
                                @endguest
                                <li><a class="dropdown-item" href="#">Shop</a></li>
                                <li><a class="dropdown-item" href="#">Package</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" tabindex="-1">Weather</a>
                        </li>
                        @yield("navbar")
                        @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                            @csrf
                                <button class="btn nav-link" type="submit">Logout</button>
                            </form>
                        </li>
                        @endauth

                        @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}" tabindex="-1">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}" tabindex="-1">Registration</a>
                        </li>
                        @endguest
                    </ul>
                    
            </div>
            </div>
        </nav>

        @yield('content')


        <footer class="bg-secondary text-white mt-5 p-3">
            <div class="row row-cols-1 row-cols-md-3">

                <div class="row justify-content-center">
                    <h4>About Us</h4>
                    <p>We are a promise website devoloper. We working with Laravel, 
                    Django, Graphics Designa and Motion Graphics Design.</p>
                </div>

                <div class="col">
                    <h4>Our Contact Details:</h4>
                    <p class="m-0">Gmail: jahid15-1905@diu.edu.bd</p>
                    
                    <a href="www.linked.com"><button class="btn btn-outline-light btn-sm">
                        <i class="bi bi-linkedin m-1"></i>Linkedin
                    </button></a>
                </div>

                <div class="row justify-content-center">
                    Section 3
                </div>
            </div>
        </footer>
    </div>

    @yield('java-script')
</body>
</html>