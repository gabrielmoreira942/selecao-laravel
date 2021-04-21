
    @extends('Clients.layout')
    @section('ClientReg')

        <div class="row">
            <div class="col-md d-flex justify-content-between align-items-center">
                <h1>Cadastro de clientes</h1>
                <a href="{{route('client.index')}}" class="btn btn-primary">Voltar para a listagem</a>
            </div>
        </div>

        <!--

        <div class="alert alert-success mt-5">
            <strong>Aviso!</strong><br>
            Produto cadastrado com sucesso!
        </div>

        <div class="alert alert-danger mt-5">
            <strong>Aviso!</strong><br>
            Ocorreu um erro ao tentar realizar esta operação!
        </div>

        <div class="alert alert-danger mt-5">
            <strong>Aviso!</strong><br>
            Alguns dados informados aparentam ter problemas: <br>
            <ul class="mt-2 mb-0">
                <li>O campo nome é obrigatório!</li>
                <li>O campo preço é obrigatório!</li>
                <li>O campo fornecedor é obrigatório!</li>
            </ul>
        </div>

        -->

        <form action="{{route('client.store')}}" method="post" id="form">
            @csrf
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome do cliente</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ex.: Macarrão parafuso" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="price" class="form-label">UF</label>
                        <select name="UF" id="UF" class="form-select" required>
                            <option value="">Selecione o Estado</option>
                            <option>SP</option>
                            <option>BA</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="CPF" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="CPF" name="CPF" minlength="11" maxlength="14" required>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="RG" class="form-label">RG</label>
                        <input type="text" class="form-control" id="RG" name="RG" minlength="3" maxlength="14">
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" class="form-control" id="number" name="number" maxlength="11">
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md">
                    <hr>
                    <button type="submit" class="btn btn-success">Registrar produto</button>
                </div>
            </div>

        </form>

        <script>

            $(document).ready(() => {
                $('#CPF').mask('000.000.000-00', {reverse: false}); //mascarar o CPF, reverse false para seguir ordem normal (reverse true vai mascarar de trás pra frente)
                $('#number').mask('(00) 00000-0000', {reverse: false});
                $('#telephone').mask('(00) 0000-0000', {reverse: false});
                $('#RG').mask('00.000.000-00', {reverse: false});


                $('#UF').change(function(e){ //evento ao alterar o estado (UF)
                    if($(e.target).val() == 'SP'){
                        $('#RG').attr('required', true); //adiciona o required no campo do RG
                    } else {
                        $('#RG').attr('required', false); //torna o required no campo RG como falso
                    }
                });



                $('#form').submit(function(e){
                    if($('#UF').val() == 'BA'){ //se o UF for bahia, fazer esse teste de idade antes de prosseguir
                        hoje = new Date(); //pega a data de hoje e coloca como objeto Date
                        nascimento = $('#birth_date').val(); //pega a data preenchida no campo birth date no formado d/m/Y
                        nascimento = nascimento.split('/').reverse().join('-'); //separa a data por / (barra), criando um array, inverte as chaves e junta dnv com - (hífen) para deixar a data no formato padrão
                        nascimento = new Date(nascimento); //cria o objeto Date com a data de nascimento
                        idade = Math.floor(
                            Math.ceil(
                                Math.abs(nascimento.getTime() - hoje.getTime()) //math.abs transforma td numero em positivo
                                / (1000 * 3600 * 24) //calculo de time em dias
                            ) / 365.25 //arredonda os dias e divide no numero de dias que tem o ano com o 0.25 para tentar compensar os anos bisextos
                        ); //arredonda a idade

                        if(idade < 18){ //testa se é menor de idade
                            alert('Você precisa ter mais que 18 anos'); //alerta o usuário que a idade é menor que a permitida
                            e.preventDefault(); //evita o envio do formulário
                        }
                    }
                    return true; //permite o envio normalmente
                });
            });

        </script>
    @endsection
