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

//Opção selecionada em att de clientes.
const uf = document.querySelector('#uf');
if(uf)
    uf.value = "{{$client->uf ?? '' }}";
