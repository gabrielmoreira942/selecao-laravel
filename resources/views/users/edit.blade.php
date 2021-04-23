@include('Clients.layout')

<div class="container">

    <div class="row mt-2">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Alterar dados</h1>
            {{-- <a href="{{route('client.index')}}" class="btn btn-primary">Voltar para a listagem</a> --}}
        </div>
    </div>


    @include('messages')

    <form action="{{route('user.update')}}" method="post" id="form">
        @csrf
        @method('put')
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Seu nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ex.: João da Silva" minlength="3" value="{{ $user->name }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Seu e-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="password" class="form-label">Nova senha</label>
                    <input type="password" class="form-control" id="password" name="password" value="">
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirme sua senha</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <hr>
                <button type="submit" class="btn btn-success">Alterar</button>
            </div>
        </div>
    </form>

    <div class="row mt-5">

        <div class="col-md">

            <hr>

            <p>Se você deseja excluir sua conta, clique no botão abaixo</p>

            <form action="{{ route('user.destroy') }}" method="POST">
                @csrf
                @method('delete')

                <button type="button" class="btn btn-danger" onclick="confirm('Você tem certeza que deseja excluir a sua conta? Essa operação não poderá ser desfeita!') ? this.closest('form').submit() : ''; event.preventDefault();">Excluir conta</button>
            </form>

        </div>

    </div>

</div>
