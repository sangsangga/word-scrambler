@extends('./layouts.app')

@section('content')
<div class="flex justify-center items-stretch h-full">
  <div class="w-6/12 p-6 bg-cover bg-center bg-no-repeat" style="background-image: url('img/scrambler.jpg');">
    <h1 class="text-3xl text-center">Word Scrambler</h1>
  </div>

  <div class="w-6/12 p-6 bg-yellow-400">
    <h1 class="text-2xl text-center mb-4">Register</h1>
    <form action="{{route('register')}}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="username" class="sr-only">Username</label>
        <input type="text" name="username" placeholder="username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror">
      </div>
      <div class="text-red-400 text-sm">
        @error('username')
        {{$message}}
        @enderror
      </div>

      <div class="mb-4">
        <label for="email" class="sr-only">Email</label>
        <input type="text" name="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror">
      </div>

      <div class="mb-4">
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" placeholder="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror">
      </div>
      <div>
        <button type="submit" class="bg-blue-800 hover:bg-blue-500 text-white p-4 text-center w-full">Submit</button>
      </div>
    </form>
  </div>
</div>
@endsection('content')