<div class="row mt-5">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nome do Usuário</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ex.: João da Silva" minlength="3" value="{{$user->name}}" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
        </div>
    </div>
</div>


<div class="col-md-4">
    <div class="mb-3">
        <label for="Senha" class="form-label">Nova senha</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
</div>
</div>

<div class="col-md-4">
<div class="mb-3">
    <label for="Senha" class="form-label">Confirme sua senha</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
</div>
</div>
</div>

<div class="row">
    <div class="col-md">
        <hr>
        <button type="submit" class="btn btn-success">Concluir</button>
    </div>
</div>
