<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @stack('css')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/sass/app.css'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-xl navbar-light custom-background-color shadow-sm">
            <div class="container">
                <a class="navbar-brand text" href="{{ url('/about') }}">
                    Medtrack
                </a>

                <div class="flex items-center justify-center">
                <div class="flex items-center justify-center h-full">
                    
                </div>
            </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto ">

                    </ul>

                    <!-- Centered Search Bar
                     <ul class="navbar-nav mx-auto"> Utilizing mx-auto to center align 
                         <li class="nav-item">
                            <form class="d-flex" method="post">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nama_obat" id="nama_obat">
                                <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
                            </form>
                        </li>
                    </ul> jika butuh-->
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="navbar-toggler-icon"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-item non-clickable" >{{ Auth::user()->name }} ({{ Auth::user()->username }})</div>
                                    <a class="dropdown-item {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">{{ __('Home') }}</a>
                                    <a class="dropdown-item {{ request()->routeIs('obat.tambahObat') ? 'active' : '' }}" href="{{ route('obat.tambahObat') }}">{{ __('Tambah Obat') }}</a>
                                    <a class="dropdown-item {{ request()->routeIs('transaksi.transaksiObat') ? 'active' : '' }}" href="{{ route('transaksi.transaksiObat') }}">{{ __('Transaksi') }}</a>
                                    <a class="dropdown-item {{ request()->routeIs('transaksi.viewDetailTransaksiTerima') ? 'active' : '' }}" href="{{ route('transaksi.viewDetailTransaksiTerima') }}">{{ __('Detail Transaksi Penerimaan') }}</a>
                                    <a class="dropdown-item {{ request()->routeIs('transaksi.viewDetailTransaksiJual') ? 'active' : '' }}" href="{{ route('transaksi.viewDetailTransaksiJual') }}">{{ __('Detail Transaksi Penjualan') }}</a>
                                    <a class="dropdown-item {{ request()->routeIs('log.logTransaksi') ? 'active' : '' }}" href="{{ route('log.logTransaksi') }}">{{ __('Log Transaksi') }}</a>
                                    <a class="dropdown-item {{ request()->routeIs('stockOpname.viewStockOpname') ? 'active' : '' }}" href="{{ route('stockOpname.viewStockOpname') }}">{{ __('Stock Opname') }}</a>
                                    <a class="dropdown-item {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">{{ __('About') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

        <main class="{{ request()->is('about') ? '' : 'py-4' }}">
            @yield('content')
        </main>
   
    @stack('scripts')
</body>
</html>
