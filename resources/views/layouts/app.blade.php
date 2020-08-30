

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        input[type="radio"] + label span {
            transition: background .2s,
              transform .2s;
        }
        
        input[type="radio"] + label span:hover,
        input[type="radio"] + label:hover span{
          transform: scale(1.2);
        } 
        #radio1:checked + label span {
          background-color:#FFAA37 ; 
          box-shadow: 0px 0px 0px 2px white inset;
        }
        
     
        #radio2:checked + label span {
          background-color: #FF1E3D ; 
          box-shadow: 0px 0px 0px 2px white inset;
        }
        
       
        </style>
</head>

<body class="bg-grey-light">
    <div id="app">
        <nav class="bg-white section">
            <div class="container mx-auto">
                <div class="flex justify-between items-center py-1">
                    <h1>
                        <a class="text-blue-dark text-3xl tracking-wide  no-underline  line-through" href="{{ url('/projects') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </h1>
                        

                    <div>
                        <!-- Right Side Of Navbar -->
                        <div class="flex items-center ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <a class="text-accent mr-4 no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>

                                @if (Route::has('register'))
                                    <a class="text-accent no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            @else
                                <theme-switcher></theme-switcher>

                                <dropdown align="right" width="200px">
                                    <template v-slot:trigger>
                                        <button
                                            class="flex items-center text-default no-underline text-sm focus:outline-none"
                                            v-pre
                                        >
                                        <img width="35"
                                        class="rounded-full mr-3"
                                        src="/uploads/avatars/{{ Auth::user()->avatar }}">

                                            {{ auth()->user()->name }}
                                        </button>
                                    </template>
                                    <a href="/users/profile" class="dropdown-menu-link text-xs text-grey no-underline  w-full text-left">Profile</a>
                                    <hr >
                                    <form id="logout-form" method="POST" action="/logout">
                                        @csrf

                                        <button type="submit" class="dropdown-menu-link text-xs text-red  w-full text-left">Logout</button>
                                    </form>
                                    
                                </dropdown>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="section">
            <main class="container mx-auto py-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
