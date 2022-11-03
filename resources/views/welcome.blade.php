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
                    <x-button-primary>
                        Register
                    </x-button-primary>
                  </a>
                @endauth
            @endif
          </nav>
        </div>
      </header>

        <!-- Main Content -->
        <main>
          <section class="text-gray-600 body-font bg-indigo-100">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
              <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Before they sold out
                  <br class="hidden lg:inline-block">readymade gluten
                </h1>
                <p class="mb-8 leading-relaxed">Copper mug try-hard pitchfork pour-over freegan heirloom neutra air plant cold-pressed tacos poke beard tote bag. Heirloom echo park mlkshk tote bag selvage hot chicken authentic tumeric truffaut hexagon try-hard chambray.</p>
                <div class="flex justify-center">
                  <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                  <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
                </div>
              </div>
              <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
              </div>
            </div>
          </section>
    
          <section class="text-gray-600 body-font">
            <div class="container flex flex-wrap px-5 py-24 mx-auto items-center">
              <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Pitchfork Kickstarter Taxidermy</h1>
                <p class="leading-relaxed text-base">Locavore cardigan small batch roof party blue bottle blog meggings sartorial jean shorts kickstarter migas sriracha church-key synth succulents. Actually taiyaki neutra, distillery gastropub pok pok ugh.</p>
                <a class="text-indigo-500 inline-flex items-center mt-4">Learn More
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
              <div class="flex flex-col md:w-1/2 md:pl-12">
                <h2 class="title-font font-semibold text-gray-800 tracking-wider text-sm mb-3">CATEGORIES</h2>
                <nav class="flex flex-wrap list-none -mb-1">
                  <li class="lg:w-1/3 mb-1 w-1/2">
                    <a class="text-gray-600 hover:text-gray-800">First Link</a>
                  </li>
                  <li class="lg:w-1/3 mb-1 w-1/2">
                    <a class="text-gray-600 hover:text-gray-800">Second Link</a>
                  </li>
                  <li class="lg:w-1/3 mb-1 w-1/2">
                    <a class="text-gray-600 hover:text-gray-800">Third Link</a>
                  </li>
                  <li class="lg:w-1/3 mb-1 w-1/2">
                    <a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
                  </li>
                  <li class="lg:w-1/3 mb-1 w-1/2">
                    <a class="text-gray-600 hover:text-gray-800">Fifth Link</a>
                  </li>
                  <li class="lg:w-1/3 mb-1 w-1/2">
                    <a class="text-gray-600 hover:text-gray-800">Sixth Link</a>
                  </li>
                  <li class="lg:w-1/3 mb-1 w-1/2">
                    <a class="text-gray-600 hover:text-gray-800">Seventh Link</a>
                  </li>
                  <li class="lg:w-1/3 mb-1 w-1/2">
                    <a class="text-gray-600 hover:text-gray-800">Eighth Link</a>
                  </li>
                </nav>
              </div>
            </div>
          </section>
        </main>
        
        @include('layouts.footer')
    </body>
</html>
