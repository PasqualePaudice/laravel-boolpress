@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">

                <div class="card-header row">
                    TUTTI I POST
                    
                </div>
                <div class="row  p-3">
                    <div class="col">
                        You are logged in!
                    </div>
                    <div class="col-2 float-right">
                        <a class="btn btn-success" href="{{ route('admin.posts.index') }}">POSTS</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
