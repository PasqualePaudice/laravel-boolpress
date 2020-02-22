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
           <input class="btn btn-success" type="submit" value="Aggiorna">
       </div>





     </form>


 </div>

@endsection
