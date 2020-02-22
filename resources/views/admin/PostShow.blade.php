@extends('layouts.admin')

@section('content')
    <div class="card text-center">
  <div class="card-header">
    <h1>{{$post->title}}</h1>
    <h6 class="card-subtitle mb-2 text-muted">{{$post->slug}}</h6>
  </div>
  <div class="card-body">
    <h5 class="card-title">ID: {{$post->id}}</h5>

    <h5>TESTO</h5>
    <p class="card-text">{{$post->content}}</p>

  </div>
  <div class="card-footer text-muted">
    creato il:   {{$post->created_at}}  <br>  ultima modifica:    {{$post->updated_at}}
  </div>
</div>
@endsection
