<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name'))</title>
        
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
      <div class="flex flex-col h-screen">
        <header class="text-gray-600 body-font border">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">

          <!-- Logo -->
          <a href="/" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <x-application-logo />
            <span class="ml-3 text-xl">TMS</span>
          </a>

          <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900">First Link</a>
            <a class="mr-5 hover:text-gray-900">Second Link</a>
            @if (Route::has('login'))
                @auth
                  <a href="{{ url('/dashboard') }}">
                    <x-button-primary>
                       Dashboard
                    </x-button-primary>
                  </a>
                @else
                  <a href="{{ route('register') }}">
                    <x-button-primary class="uppercase">
                        Register
                    </x-button-primary>
                  </a>
                @endauth
            @endif
          </nav>
        </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow">
              {{ $slot }}
        </main>
        @include('layouts.footer')
      </div>
    </body>
</html>
