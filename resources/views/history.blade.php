@extends('./layouts.app')

@section('content')
<div class="flex justify-center">
  <div>
  </div>
  <div class="justify-center">
    <h1 class="text-5xl text-center mb-4">My Records</h1>
    <table class="shadow-lg">
      <thead>
        <tr>
          <th class="bg-indigo-500 border text-left px-8 py-4">Date</th>
          <th class="bg-yellow-300 border text-left px-8 py-4">Score</th>
        </tr>
      </thead>
      @foreach ($histories as $history)
      <tr>
        <td class="border px-8 py-4">{{$history->created_at}}</td>
        <td class="border px-8 py-4">{{$history->score}}</td>
      </tr>
      @endforeach
      <tbody>

      </tbody>
    </table>


  </div>
  <div>

  </div>
</div>
@endsection('content')