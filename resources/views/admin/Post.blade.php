@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Tutti i post</h1>

                <ul class="col-sm-12 list-inline">
                    <div class="row ">
                        <li class="col list-inline-item">
                            <h2>Id</h2>
                        </li>
                        <li class="col list-inline-item">
                           <h2>Titolo</h2>
                        </li>
                        <li class="col list-inline-item">
                            <h2>Autore</h2>
                        </li>
                        <li class="col list-inline-item">
                            <h2>Azioni</h2>
                        </li>
                    </div>


                    @forelse ($posts as $post)
                        <div class="row">
                            <li class="col list-inline-item">
                                {{$post->id}}
                            </li>
                           <li class="col list-inline-item">
                               {{$post->title }}
                           </li>
                           <li class="col list-inline-item">
                               {{$post->author}}
                           </li>
                           <li class="col list-inline-item">
                               <a href="{{ route('admin.posts.edit',['post' =>$post]) }} " class="btn btn-primary">Modifica</a>
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
