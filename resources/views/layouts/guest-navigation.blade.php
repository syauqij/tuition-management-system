<nav class="navbar navbar-expand-lg shadow-md py-2 bg-white relative flex items-center w-full justify-between">
  <div class="px-6 w-full flex flex-wrap items-center justify-between">
    <div class="flex items-center">
      <button class="navbar-toggler border-0 py-3 lg:hidden leading-none text-xl bg-transparent text-gray-600 hover:text-gray-700 focus:text-gray-700 transition-shadow duration-150 ease-in-out mr-2"
          type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContentY"
          aria-controls="navbarSupportedContentY" aria-expanded="false" aria-label="Toggle navigation">

        <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <path fill="currentColor"
            d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
          </path>
        </svg>
      </button>
      <a class="navbar-brand text-indigo-600" href="{{ route('home') }}">
        <svg class="w-5 h-5 ml-2 lg:ml-0 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
          <path fill="currentColor"
            d="M485.5 0L576 160H474.9L405.7 0h79.8zm-128 0l69.2 160H149.3L218.5 0h139zm-267 0h79.8l-69.2 160H0L90.5 0zM0 192h100.7l123 251.7c1.5 3.1-2.7 5.9-5 3.3L0 192zm148.2 0h279.6l-137 318.2c-1 2.4-4.5 2.4-5.5 0L148.2 192zm204.1 251.7l123-251.7H576L357.3 446.9c-2.3 2.7-6.5-.1-5-3.2z">
          </path>
        </svg>
      </a>
    </div>
    <div class="navbar-collapse collapse grow items-center" id="navbarSupportedContentY">
      <ul class="navbar-nav mr-auto lg:flex lg:flex-row">
        <li class="nav-item">
          <a class="nav-link block pr-2 lg:px-2 py-2 {{ request()->routeIs('home') ? 'text-indigo-600' : 'text-gray-600' }}
          hover:text-indigo-700 focus:text-indigo-700 transition duration-150 ease-in-out"
            href="{{ route('home') }}" data-mdb-ripple="true" data-mdb-ripple-color="light">TMS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link block pr-2 lg:px-2 py-2 {{ request()->routeIs('about') ? 'text-indigo-600' : 'text-gray-600' }}
          hover:text-indigo-700 focus:text-indigo-700 transition duration-150 ease-in-out"
            href="{{ route('about') }}" data-mdb-ripple="true" data-mdb-ripple-color="light" >About Us</a>
        </li>
        <li class="nav-item mb-2 lg:mb-0">
          <a class="nav-link block pr-2 lg:px-2 py-2 {{ request()->is('courses*') ? 'text-indigo-600' : 'text-gray-600' }}
          hover:text-indigo-700 focus:text-indigo-700 transition duration-150 ease-in-out"
            href="{{ route('courses.list') }}" data-mdb-ripple="true" data-mdb-ripple-color="light" >Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link block pr-2 lg:px-2 py-2 {{ request()->routeIs('contact') ? 'text-indigo-600' : 'text-gray-600' }}
          hover:text-indigo-700 focus:text-indigo-700 transition duration-150 ease-in-out"
            href="{{ route('contact') }}" data-mdb-ripple="true" data-mdb-ripple-color="light" >Contact Us</a>
        </li>
      </ul>
    </div>
    <div class="flex items-center lg:ml-auto">
      @if (Route::has('login'))
        @auth
          <a href="{{ route('enrolments.index') }}">
            <x-forms.button-primary>
              Enrolments
            </x-forms.button-primary>
          </a>
        @else
          <a href="{{ route('login') }}">
            <x-forms.button-secondary class="uppercase mr-2">
                Login
            </x-forms.button-secondary>
          </a>
          <a href="{{ route('register') }}">
            <x-forms.button-primary class="uppercase">
                Register
            </x-forms.button-primary>
          </a>
        @endauth
      @endif
    </div>
  </div>
</nav>
