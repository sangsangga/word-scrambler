@extends('./layouts.app')

@section('content')
<div class="flex flex-col justify-center">
  <div>
    <h1 class="text-5xl text-center mb-4">My Records</h1>
  </div>
  <div class="justify-center">
    <table class="table-auto">
      <thead>
        <tr>
          <th>Date</th>
          <th>Score</th>
        </tr>
      </thead>
      @foreach ($histories as $history)
      <tr>
        <td>{{$history->created_at}}</td>
        <td>{{$history->score}}</td>
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