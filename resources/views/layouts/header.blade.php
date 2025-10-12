<nav class="bg-white shadow-sm">
  <div class="container mx-auto px-4 py-4 flex items-center justify-between">
    <a href="{{ route('home') }}" class="flex items-center gap-3">
      <span class="text-2xl font-bold text-dorm-primary">DormSeek</span>
    </a>

    <form action="{{ route('home') }}" method="GET" class="hidden md:flex items-center gap-2">
      <input type="text" name="q" placeholder="Search dorms, city, school" value="{{ request('q') }}" class="border rounded px-3 py-2 w-80">
      <button class="px-4 py-2 bg-dorm-primary text-white rounded">Search</button>
    </form>

    <div class="flex items-center gap-3">
      @auth
        <a href="{{ url('/dashboard') }}" class="px-3 py-2 rounded hover:bg-gray-100">Dashboard</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="px-3 py-2 rounded hover:bg-gray-100">Logout</button>
        </form>
      @else
        {{-- <a href="{{ route('login') }}" class="px-3 py-2 rounded hover:bg-gray-100">Login</a>
        <a href="{{ route('register') }}" class="px-3 py-2 bg-dorm-primary text-white rounded">Sign up</a> --}}
        <span class="px-3 py-2 text-gray-400 rounded">Login</span>
        <span class="px-3 py-2 bg-gray-200 text-gray-400 rounded">Sign up</span>
      @endauth

      <!-- mobile menu button -->
      <button id="mobileMenuBtn" class="md:hidden">☰</button>
    </div>
  </div>
</nav>