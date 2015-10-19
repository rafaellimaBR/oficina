$(document).ready(function(){

    var URL = $('#url').val();

    $('.cep').mask('00000-000');
    $('.placa').mask('SSS0000');
    $('.fone').mask('000000000');
    $('.valor').mask("#.##0.00", {reverse: true,placeholder: "0.00"});
    $('.ddd').mask('(00)',{placeholder: "(__)"});

    $('.excluir').click(function(){

        var id = $(this).attr('excluir');

        $('#id').val(id);

    });

    $('#botao-pesquisar-telefone').click(function (){
        if($('#campo-numero-telefone').val() == ''){
            alert('Digite o numero');
            $('#campo-numero-telefone').focus();
        }else{
            var numero = $('#campo-numero-telefone').val();
            $.get(URL+'/admin/telefone/numero/'+numero,function(data,status){
                if(status == "success"){
                    if(data.telefone){
                        $('#div-pesquisar-telefone').hide('fast');
                        $('#div-add-telefone').show('fast');
                        $('#div-cadastrado-telefone').show('fast');
                        $('#campo-numero-telefone').attr("disabled", true);
                    }else{
                        $('#div-pesquisar-telefone').hide('fast');
                        $('#div-add-telefone').show('fast');
                        $('#div-novo-telefone').show('fast');
                        $('#div-cadastrado-telefone').show('fast');
                        $('#campo-numero-telefone').attr("disabled", true);
                    }
                }else{
                    alert('Erro!');
                }
            });
        }
    });
    $('#botao-voltar-telefone').click(function(){
        $('#div-pesquisar-telefone').show('fast');
        $('#div-add-telefone').hide('fast');
        $('#div-novo-telefone').hide('fast');
        $('#div-cadastrado-telefone').hide('fast');
        $('#campo-numero-telefone').attr("disabled", false);
        $('#campo-numero-telefone').val('');
    })
    $('#botao-add-telefone').click(function(){
        var dados   =   {
            numero      :   $('#campo-numero-telefone').val(),
            ddd         :   $('#ddd-telefone').val(),
            dis         :   $('#dis-telefone').val(),
            tipo        :   $('#tipo-telefone').val(),
            operadora   :   $('#operadora-telefone').val(),
            cliente_id  :   $('#cliente_id').val()
        }


        if( $('#campo-numero-telefone').val() == null){
            alert('Preencha os campos DDD');
            $('#campo-numero-telefone').focus();
        }else{
            $.ajax({
                    url: URL+'/admin/cliente/adctelefone',
                    type:"POST",
                    beforeSend: function (xhr) {
                        var token = $('#token').val();

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: dados,
                    success:function(data){

                        $('#tabela-contatos').html(data.html);
                        $('#div-pesquisar-telefone').show('fast');
                        $('#div-add-telefone').hide('fast');
                        $('#div-novo-telefone').hide('fast');
                        $('#div-cadastrado-telefone').hide('fast');
                        $('#campo-numero-telefone').attr("disabled", false);
                        $('#campo-numero-telefone').val('');
                    },error:function(){
                        alert("error!!!!");
                    }
                }); //end of ajax
        }
    });

    $('.marcas-ajax').change(function(){
        var marca   =   $('#marca').val();
        $.get(URL+'/admin/marca/'+marca+'/modelos', function(data){

            var options = '<option value="0">Escolha um modelo</option>';
            $.each(data, function (key, val) {
                options += '<option value="' + val.id + '">' + val.nome + '</option>';
            });

            $('.modelos-ajax').html(options).show();
        });
    });
    var data = [{ id: 0, text: 'enhancement' }, { id: 1, text: 'bug' }, { id: 2, text: 'duplicate' }, { id: 3, text: 'invalid' }, { id: 4, text: 'wontfix' }];
    $('.select2').select2();
});