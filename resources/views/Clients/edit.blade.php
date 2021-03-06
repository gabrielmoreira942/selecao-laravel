@extends('Clients.layout')
@section('ClientReg')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Alterar dados</h1>
            <a href="{{route('client.index')}}" class="btn btn-primary">Voltar para a listagem</a>
        </div>
    </div>

    @include('messages')

    <form action="{{route('client.update', $client->id)}}" method="post" id="form">
        @csrf
        @method('put')
        <div class="row mt-5">

            @include('Clients.partials.form')

            {{-- <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome do cliente</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ex.: João da Silva" minlength="3" value="{{$client->name}}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="UF" class="form-label">UF</label>
                    <select name="uf" id="uf" class="form-select" required>
                        <option value="">Selecione o Estado</option>
                        <option>SP</option>
                        <option>BA</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="CPF" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="CPF" name="cpf" minlength="14" maxlength="14" value="{{$client->cpf}}" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="RG" class="form-label">RG</label>
                    <input type="text" class="form-control" id="RG" name="rg" minlength="13" maxlength="13" value="{{$client->rg}}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{(isset($client) ? $client->birth_date->format('Y-m-d'): '')}}" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="number" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="number" name="number" maxlength="11" value="{{$client->number}}" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="telephone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{$client->telephone}}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$client->email}}" required>
                </div>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-md">
                <hr>
                <button type="submit" class="btn btn-success">Concluir</button>
            </div>
        </div>
    </form>

@endsection
