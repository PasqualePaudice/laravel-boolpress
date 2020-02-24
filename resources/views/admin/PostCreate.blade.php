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
           <input class="btn btn-success" type="submit" value="Crea">
       </div>





     </form>


 </div>

@endsection
