@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>{{ $post->title }}</h1>
                @if(!empty($post->image))
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }} - immagine di copertina">
                @endif
                <div class="post-content">
                    {{ $post->content }}
                </div>

                <p>Categoria: {{ $post->category->name }}</p>
                {{-- @if(!empty($post->category))
                    <p>Categoria: <a href="{{ route('blog.category', ['slug' => $post->category->slug]) }}">{{ $post->category->name }}</a></p>
                @endif
                @if(($post->tags)->isNotEmpty())
                    <p>Tags:
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('blog.tag', ['slug' => $tag->slug]) }}">{{ $tag->name }}</a>{{ $loop->last ? '' : ',' }}
                        @endforeach
                    </p>
                @endif --}}
                <p><em>{{ $post->author }}</em></p>
            </div>
        </div>
    </div>
@endsection
