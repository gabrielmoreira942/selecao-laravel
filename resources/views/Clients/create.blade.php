@extends('Clients.layout')
@section('ClientReg')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Cadastro de clientes</h1>
            <a href="{{route('client.index')}}" class="btn btn-primary">Voltar para a listagem</a>
        </div>
    </div>

    @include('messages')

    <form action="{{route('client.store')}}" method="post" id="form">
        @csrf
        <div class="row mt-5">

        @include('Clients.partials.form')

        </div>

        <div class="row">
            <div class="col-md">
                <hr>
                <button type="submit" class="btn btn-success">Concluir</button>
            </div>
        </div>

    </form>

@endsection
