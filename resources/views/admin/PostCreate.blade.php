@extends('layouts.admin')

@section('content')

 <div class="container">
    <form class="" action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titolo</label>
            <input id="title" name="title" class="form-control" type="text" required>
        </div>

        <div class="form-group">

            <label for="author">Autore</label>
            <input id="author" name="author" class="form-control" type="text" required>

        </div>

        <div class="form-group">
            <label for="content">TextArea</label>
            <textarea id="content" name="content" class="form-control"  rows="8" required></textarea>
       </div>
        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="file" id="image" name="image" class="form-control"  rows="8" required></input>
       </div>

        <div class="form-group">

            <select class="form-control" name="category_id">
                <option value="">Seleziona Categoria</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>

                @endforeach
            </select>
       </div>
       @if ($tags->count())


           <p>Aggiungi i tag:</p>


           @foreach ($tags as $tag)
            <label for="tag_{{$tag->id}}">
               <input id="tag_{{$tag->id}}" type="checkbox" name="tag_id[]" value="{{$tag->id}}">
               {{ $tag->name}}
           </label>
           @endforeach

       @endif



       <div class="form-group">
           <input class="btn btn-success" type="submit" value="Crea">
       </div>





     </form>


 </div>

@endsection
