@extends('layouts.admin');

@section('content')
    <div class="container">
        <div class="row">
            <h1>Contattaci</h1>
        </div>

        <div class="container">
                <form class="" action="{{ route('contatti.store')}}" method="post">
                    @csrf

                    <div class=" form-group">
                        <label for="name">Nome</label>
                        <input class="form-control " type="text" name="name" placeholder="Inserisci nome">
                    </div>
                    <div class=" form-group">
                        <label for="email">Email</label>
                        <input class="form-control " type="email" name="email" placeholder="Inserisci Email">
                    </div>
                    <div class="form-group">
                        <label for="subject">Oggetto</label>
                        <input class="form-control " type="text" name="subject" placeholder="Inserisci Oggetto">
                    </div>
                    <div class="form-group">
                        <label for="message">Messaggio</label>
                        <textarea class="form-control "  name="message" placeholder="Inserisci messaggio" rows="8"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="" value="Invia messaggio">
                    </div>


                </form>
        </div>



    </div>
@endsection
