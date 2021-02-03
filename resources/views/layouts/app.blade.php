<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Word Scrambler</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="bg-gray-100">
  <nav class="p-6 bg-white flex justify-between mb-6">
    <ul class="flex items-center">
      @auth
      <li>
        <a href="" class="p-3">Home</a>
      </li>

      <li>
        <a href="" class="p-3">Dashboard</a>
      </li>
      @endauth
    </ul>

    <ul class="flex items-center">
      @guest
      <li>
        <a href="{{route('login')}}" class="p-3">Login</a>
      </li>

      <li>
        <a href="{{route('home')}}" class="p-3">Register</a>
      </li>
      @endguest
      @auth
      <li>
        <a href="" class="p-3">{{auth()->user()->username}}</a>
      </li>

      <li>
        <a href="" class="p-3">Logout</a>
      </li>
      @endauth
    </ul>
  </nav>

  @yield('content')
</body>

</html>