<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Base Laravel Step1 lessons </title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script> --}}

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">     --}}

    @vite(['resources/js/app.js'])    
</head>

<body>
    <div class="container">
        <div class="row">

            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('main.index') }}">Main</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('about.index') }}">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacts.index') }}">Contacts</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>


        </div>


        @yield('content')
    </div>
</body>

</html>
