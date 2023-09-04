<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Favicons -->
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2-circle" viewBox="0 0 16 16">
            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
        </symbol>
        </svg>
        <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<!-- Header -->
<nav class="py-2 bg-body-tertiary border-bottom">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
        </svg vg>
        </a>
        <li class="nav-item"><a href="/" class="nav-link link-body-emphasis px-2 active" aria-current="page">Главная</a></li>
        <li class="nav-item"><a href="{{ route('tasks') }}" class="nav-link link-body-emphasis px-2">Записи_адвансед</a></li>
        <li class="nav-item"><a href="{{ route('review') }}" class="nav-link link-body-emphasis px-2">Комментарии</a></li>
        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link link-body-emphasis px-2">О нас</a></li>
      </ul>
      <ul class="nav">
        <li class="nav-item"><a href="/login" class="nav-link link-body-emphasis px-2">Войти</a></li>
        <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Регистрация</a></li>
      </ul>
    </div>
  </nav>

<div class="container mb-0 pb-0 mt-3 col-md-2">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
</div>

@yield('content')

<!-- Footer -->
<div class="d-flex flex-column flex-sm-row justify-content-center py-4 my-4 border-top">
      <p>© 2023 Company, Inc. All rights reserved.</p>
</div>

</body>
</html>