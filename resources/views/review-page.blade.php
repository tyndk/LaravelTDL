@extends('layout')

@section('title')Один коммент@endsection

@section('content')

<div class="container px-3 py-1 mt-5">
  <h3 class="px-3">Комментарий от {{ $data->email }}</h3>

<div class="m-3 w-50 ">
  <form action="{{ route('review_edit', [$data->id]) }}" method="post">
    @csrf
  <div class="form-group">
    <label for="score">Оценка:</label>
    <select class="form-control" name="score" id="score">
      <option value="1" {{ $data->score == 1 ? 'selected' : '' }}>1</option>
      <option value="2" {{ $data->score == 2 ? 'selected' : '' }}>2</option>
      <option value="3" {{ $data->score == 3 ? 'selected' : '' }}>3</option>
      <option value="4" {{ $data->score == 4 ? 'selected' : '' }}>4</option>
      <option value="5" {{ $data->score == 5 ? 'selected' : '' }}>5</option>
    </select>
  </div>
  <div class="form-group mt-2">
    <label for="caption">Комментарий:</label>
    <textarea class="form-control" name="caption" id="caption" rows="3">{{ $data->caption }}</textarea>
  </div>

  <div class="mt-3">
        <button type="submit" class="btn btn-outline-primary">Обновить</button>
  </div>
  </form>
</div>



@if($errors->any())
  <div class="container mt-3 col-md-3 pb-0 alert alert-warning">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif


</div>

@endsection