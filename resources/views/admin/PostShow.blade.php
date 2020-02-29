@extends('layouts.admin')

@section('content')

<div class="card text-center">
  <div class="card-header">
    <h1>{{$post->title}}</h1>
    <h6 class="card-subtitle mb-2 text-muted">{{$post->slug}}</h6>
  </div>

  <div class="card-body">
    <h5 class="card-title">ID: {{$post->id}} </h5>
    <h5 class="card-title">Categoria: {{ $post->category ? $post->category->name : '-'}}</h5>
    @if (($post->tags)->isNotEmpty())


    <h5 class="card-title">Tag:</h5>
    <ul>
        @foreach ($post->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>
    @endif

    <h5>TESTO</h5>
    <p class="card-text">{{$post->content}}</p>
    <img src="{{$post->image ? asset("storage/". $post->image) : asset("storage/uploads/non-dispo.png") }}" alt="Immagine di copertina">
  </div>

  <div class="card-footer text-muted">
    creato il:   {{$post->created_at}}  <br>  ultima modifica:    {{$post->updated_at}}
  </div>

</div>
@endsection
