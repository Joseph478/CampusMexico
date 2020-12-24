<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Campus virtual IGH') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            background: rgb(255,255,255);
            background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(252,252,252,1) 38%, rgba(231,231,231,1) 100%);
        }
        .footer {
            position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: #2c3e50;
   text-align: center;
        }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg" style="background: #1473d6;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('images/logo-blanco.png')}}" class="img-fluid" style="width: 50%" alt="">
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item active" >
                        <a class="nav-link" style="color:white" href="{{ route('login') }}">{{ __('INGRESAR') }}</a>

                        </li>
                        <li class="nav-item active">
                        <a class="nav-link" style="color:white" href="{{ route('register') }}">{{ __('REGISTRATE') }}</a>

                        </li>
                        @else

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            <div class="container">
                @if (session()->has('info'))
                    <div class="alert alert-info">
                        {{ session('info') }}
                    </div>
                @endif
                @yield('content')
            </div>

            {{-- <div class="container-fluid footer">
                <div class="d-flex justify-content-between">
                    <div class="row">
                        <p>Todos los derechos reservados</p>
                    </div>
                    <div class="row">
                        Si presenta algún problema llamar:
                        <span style="background: red;color:white;border-radius: 10px;">
                            9999999999
                        </span>
                    </div>
                </div>
              </div> --}}
              <div class="footer">
                <p><i class="fa fa-copyright" aria-hidden="true"></i> Todos los derechos reservados - <strong>Inveritas Global Holdings Peru SA</strong> 2020 </p>
              </div>

        </main>
    </div>
</body>
</html>
