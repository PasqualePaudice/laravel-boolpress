@extends('layouts.admin')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row ">
                    <h1 class="col-sm-6">Tutti i post</h1>
                    <div class="col-sm-6 ">
                        <a class="float-right btn btn-success" href="{{ route('admin.posts.create') }}">CREA NUOVA RICETTA</a>
                    </div>
                </div>


                <ul class="col-sm-12 list-inline">
                    <div class="row ">
                        <li class="text-center col-2 list-inline-item">
                            <h2>Id</h2>
                        </li>
                        <li class="text-center col-2 list-inline-item">
                           <h2>Titolo</h2>
                        </li>
                        <li class="text-center col-3 list-inline-item">
                            <h2>Autore</h2>
                        </li>
                        <li class="text-center col-4 list-inline-item">
                            <h2>Azioni</h2>
                        </li>
                    </div>


                    @forelse ($posts as $post)
                        <div class="row p-3 border-bottom border-info">
                            <li class="text-center col-2 list-inline-item">
                                {{$post->id}}
                            </li>
                           <li class="text-center col-2 list-inline-item">
                               {{$post->title }}
                           </li>
                           <li class="text-center col-3 list-inline-item">
                               {{$post->author}}
                           </li>
                           <li class="text-center col-4 list-inline-item">
                               <a href="{{ route('admin.posts.edit',['post' =>$post]) }} " class="btn btn-primary">Modifica</a>
                               <a href="{{ route('admin.posts.show',['post' =>$post]) }} " class="btn btn-warning">Visualizza</a>
                               <a href="#" class=" btn btn-danger">Cancella</a>
                           </li>
                        </div>


                    @empty

                        <p>non ci sono post</p>

                    @endforelse
                </ul>
            </div>

        </div>

    </div>
@endsection
