<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8" />
    <title>RAGEBAITsrc | #1 Ragebait picker</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo-small.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ragebait-card.css') }}">


    @stack('styles')

</head>
<body>

<header class="header">
  <div class="header-grid">
    <div></div>

    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo" />

    <div class="header-actions">
      <input type="search" placeholder="Search" class="search">
    @guest
        <a href="{{ route('login') }}" class="nav-link">Login</a>
        <a href="{{ route('register') }}" class="nav-link">Register</a>
    @endguest

    @auth
        <span class="nav-user">{{ auth()->user()->name }}</span>

        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="nav-link">Logout</button>
        </form>
    @endauth
    </div>
  </div>

  <nav class="navbar">
    <a href="/">Home</a>
    <a href="#">Tierlist</a>
    <a href="#">Docs</a>
  </nav>
</header>

<main class="main-content">

  {{-- flash messages --}}
  @if (session('success'))
      <p>{{ session('success') }}</p>
  @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

  @yield('content')

</main>

<footer class="footer">
  <p>© 2025 RAGEBAITsrc</p>
</footer>

</body>
</html>
