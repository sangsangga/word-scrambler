@extends('./layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="bg-white w-4/12 p-6 rounded-lg">
    <h1 class="text-3xl text-center mb-4">Find The Correct Word!</h1>
    <h1>Your score {{Session::get("score")}}</h1>
    <div id="word" class="text-center">
    </div>
    <div>
      <form action="" id="form-answer">
        <input type="text" id="answer" class="w-full p-4 bg-gray-100 rounded-lg text-black mb-2" placeholder="Guess Here">
        <button type="submit" class="bg-blue-800 p-2 text-white w-full rounded-lg">Submit</button>
      </form>
    </div>
  </div>
  @endsection('content')