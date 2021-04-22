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
          <th scope="col" width="150"></th>
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
      <td>{{$client->telephone}}</td>
      <td>{{$client->number}}</td>
      <td>{{$client->UF}}</td>
      <td>{{$client->user->name}}</td>
      <td scope="col">

      {{-- href="{{route('client.edit', $client->id)}}" --}}

      {{-- onclick="deleteInDatabase('{{route('client.destroy', $client->id)}}')" --}}
      <a class="btn btn-primary btn-sm" href="{{route('client.edit', $client->id)}}">Editar</a>
      <a class="btn btn-danger btn-sm" >Excluir</a>
    </td>


    </tr>
    @endforeach
  </tbody>

  </table>

    <div class="mt-5">
        {{$clients->links()}}

    </div>

@endsection

