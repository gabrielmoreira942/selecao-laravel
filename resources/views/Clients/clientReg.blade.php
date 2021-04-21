@extends('Clients.layout')
@section('ClientReg')


<div class="row">
    <div class="col-md d-flex justify-content-between align-items-center">
        <h1>Listagem de clientes</h1>
        <a href="{{route('client.create')}}" class="btn btn-success">Cadastrar cliente</a>
    </div>
</div>

<table id="tabela" class="table table-hover table-striped mt-5">
    {{-- table-bordered border-dark --}}
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">CPF</th>
          <th scope="col">RG</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">Telefone</th>
          <th scope="col">Celular</th>
          <th scope="col">UF</th>
          <th scope="col">Func.Responsável</th>
        </tr>
      </thead>
       <tbody>
        @foreach ($clients as $client)
    <tr>
      <td>{{$client->id}}</td>
      <td>{{$client->name}}</td>
      <td>{{$client->email}}</td>
      <td>{{$client->CPF}}</td>
      <td>{{$client->RG}}</td>
      <td>{{$client->birth_date->format('d/m/Y')}}</td>
      <td>{{$client->number}}</td>
      <td>{{$client->telephone}}</td>
      <td>{{$client->UF}}</td>
      <td>{{$client->user->name}}</td>
    </tr>
    @endforeach
  </tbody>

  </table>

    <div class="mt-5">
        {{$clients->links()}}

    </div>

@endsection

