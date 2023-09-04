@extends('layout')

@section('title')Комменты@endsection

@section('content')

<div class="container px-3 py-1 col-md-3">
  <h3 class="px-3">Добавить запись</h3>
</div>

<div class="container px-3 mt-3 col-md-3">
  <form class="p-2" action="{{ route('review_check') }}" method="post">
    @csrf

    <div class="col-12">
      <label for="email" class="form-label">Ваш Email:</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="examplemail@email.com">
    </div>
    <div class="col-12">
      <label for="score" class="form-label pt-1">Score:</label>
      <select class="form-control" name="score" id="score">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
      <!-- <input type="number" class="form-control" placeholder="Введите число..." name="score" id="score"> -->
    </div>
    <div class="col-12">
      <label for="caption" class="form-label pt-1">Комментарий:</label>
      <textarea class="form-control" placeholder="Введите текст..." name="caption"  id="caption"></textarea>
    </div>

      <button type="submit" class="mt-3 w-100 btn btn-primary">Добавить</button>

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

<div class="container px-3 py-1 mt-5">
  <h3 class="px-3">Все комментарии</h3>

<div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-3 align-items-center justify-content-left">
  <div class="list-group">
@foreach($review as $el)
<div class="card mb-3">
  <div class="card-body">
  <h5 class="card-title">Email: {{ $el->email }}</h5>
    <h5 class="card-title text-white w-25 rounded p-2" style="background-color: 
      @if($el->score == 1) 
      DeepSkyBlue  
      @elseif($el->score == 2) 
      DodgerBlue  
      @elseif($el->score == 3) 
      RoyalBlue  
      @elseif($el->score == 4) 
      Blue  
      @elseif($el->score == 5) 
      MediumBlue  
      @endif">Оценка: {{ $el->score }}</h5>
    <p class="card-text">{{ $el->caption }}</p>
    <p class="card-text"><small class="text-body-secondary">Last updated: {{ $el->updated_at }}</small></p>
  </div>
  <div class="container d-flex m-2">
    <a href="{{ route('review_page', [$el->id]) }}"><button type="submit" class="btn btn-sm btn-outline-primary">Редактировать</button></a>

    <form class="px-2" action="{{ route('review_delete', [$el->id]) }}" method="post">
          @csrf
          {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-outline-danger">Удалить</button>
    </form>
  </div>
</div>
@endforeach
  </div>
</div>
</div>  

<div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-3 align-items-center justify-content-center">
  <div class="list-group">

@endsection

