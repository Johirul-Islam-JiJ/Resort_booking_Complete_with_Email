<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">


    {{-- Toast Notification --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- Toast Notification End --}}



    @yield('styles')

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light text-light" style="background-color: #2e2d2c;">
            <div class="container">
                <a class="navbar-brand text-light font-weight-bold" href="{{ url('/') }}">
                    Cholo Ghuri
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto text-light">
                        <!-- Authentication Links -->
                        @if (Auth::user())
                            <li class="nav-item">
                                <a class="nav-link {{ Request::path() === '/' ?
                                'active' : '' }}" href="{{ route('homepage') }}">HomePage</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::path() === 'home' ?
                                 'active' : '' }}" href="{{ route('home') }}">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ Request::path() === 'view-user' ?
                                'active' : '' }}" aria-current="page" href="{{ route('users.index')}}">User</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ Request::path() === 'view-resort' ?
                                 'active' : '' }}" href="{{ route('resorts.index') }}">Resort List</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ Request::path() === 'bookings' ?
                                'active' : '' }}" href="{{ route('bookings.index') }}">Booking</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-light {{ Request::path() === '/' ?
                                'active' : '' }}" href="{{ route('homepage') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light {{ Request::path() === 'view-resort' ?
                                 'active' : '' }}" href="{{ route('resorts.cards') }}">Resort</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light {{ Request::path() === 'view-resort' ?
                                 'active' : '' }}" href="#">Package</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light {{ Request::path() === 'view-resort' ?
                                 'active' : '' }}" href="#">Swimming</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light {{ Request::path() === 'view-resort' ?
                                 'active' : '' }}" href="#">Travel Advisory</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light {{ Request::path() === 'view-resort' ?
                                 'active' : '' }}" href="{{ route('resorts.promotions') }}">Promotions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light {{ Request::path() === 'view-resort' ?
                                 'active' : '' }}" href="{{ route('resorts.contact') }}">Contact Us</a>
                            </li>

                        @endif


                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    {{-- <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li> --}}
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>

                                </ul>
                            </li>


                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            @yield('content')
        </main>
    </div>



    <!-- Scripts -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    {{-- Toast Notification --}}
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
</body>

</html>
