<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} — Admin</title>

        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <nav class="bg-white border-b border-gray-200">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
              <!-- Left side -->
              <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logo.png') }}" alt="DormSeek Logo" class="h-8 w-8">
                <span class="text-lg font-semibold text-gray-700">DORMSEEK - ADMIN</span>
              </div>

              <!-- Right side -->
              <div class="flex items-center space-x-4">
                <x-dropdown align="right" width="48">
                  <x-slot name="trigger">
                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none">
                      <div>{{ Auth::user()->name }}</div>
                      <div class="ms-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                      </div>
                    </button>
                  </x-slot>

                  <x-slot name="content">
                    <x-dropdown-link href="#">
                      {{ __('Profile (coming soon)') }}
                    </x-dropdown-link>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                      </x-dropdown-link>
                    </form>
                  </x-slot>
                </x-dropdown>
              </div>
            </div>
          </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </body>
</html>


