@extends('./layouts.app')

@section('content')
<div class="flex flex-col justify-center">
  <div>
    <h1 class="text-5xl text-center mb-4">Find The Correct Word!</h1>
  </div>
  <div id="word">
    <form>
      <input type="text" id="userAnswer">
    </form>
    <button type="submit" class="bg-blue-800 text-white w-full">Submit</button>
  </div>
  <div id="test">
    <h1>Ajax</h1>
  </div>
</div>
@endsection('content')