@extends('layouts.admin')

@section('content')

 <div class="container">
    <form class="" action="{{route('admin.posts.update',[ 'post' => $post])}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input name="title" class="form-control" type="text" value="{{ $post->title }}">
        </div>

        <div class="form-group">
            <label for="author">Autore</label>
            <input name="author" class="form-control" type="text"  value="{{ $post->author}}">

        </div>

        <div class="form-group">
            <label for="content">Example textarea</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{ $post->content}}</textarea>
       </div>
       <div class="form-group">
           <label for="image">Immagine</label>
           <input type="file" id="image" name="image" class="form-control"  rows="8" required></input>
       </div>

       <p>Modifica i tag:</p>


       @foreach ($tags as $tag)
        <label for="tag_{{$tag->id}}">
           <input id="tag_{{$tag->id}}" type="checkbox" name="tag_id[]" value="{{$tag->id}}"
           {{ $post->tags->contains($tag) ? 'checked' : ''}}>
           {{ $tag->name}}
       </label>
       @endforeach




       <div class="form-group">
           <input class="btn btn-success" type="submit" value="Aggiorna">
       </div>







     </form>


 </div>

@endsection
