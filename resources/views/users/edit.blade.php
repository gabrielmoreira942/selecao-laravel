
    @extends('Clients.layout')
    @section('ClientReg')

        <div class="row">
            <div class="col-md d-flex justify-content-between align-items-center">
                <h1>Alterar dados</h1>
                <a href="{{route('client.index')}}" class="btn btn-primary">Voltar para a listagem</a>
            </div>
        </div>

        @include('messages')
        <form action="{{route('user.update')}}" method="post" id="form">
            @csrf
            @method('put')
        @include('users.formEdit')

        </form>



                {{-- Config do formulário --}}
             {{-- <script>
                    const UF = document.querySelector('#UF');
                   if(UF)
                  UF.value = "{{$client->UF ?? '' }}";
             </script> --}}
    @endsection
