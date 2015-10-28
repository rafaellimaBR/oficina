$(document).ready(function(){

    var URL = $('#url').val();

    $('.cep').mask('00000-000');
    $('.placa').mask('SSS0000');
    $('.fone').mask('000000000');
    $('.fone2').mask('(00)000000000',{placeholder:"(__) 000000000"});
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

                    }else{
                        $('#div-pesquisar-telefone').hide('fast');
                        $('#div-add-telefone').show('fast');
                        $('#div-novo-telefone').show('fast');
                        $('#div-cadastrado-telefone').show('fast');

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

    $('.cliente-ajax').select2({
        //placeholder: 'Search for a category',
        ajax: {
            type: 'POST',
            url: URL+"/admin/cliente/pesquisarCliente",
            dataType: 'json',
            beforeSend: function (xhr) {
                var token = $("input[name='_token']" ).val();

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            quietMillis: 400,
            delay:400,
            data: function (term, page) {
                return {
                    q: term.term, //search term
                     // page size
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },

        },
        templateResult: function (data) {
            var html    =   $('<div class="select2-user-result"><h5>'+data.text+'</h5>' +
                '<h6>Registro: <b>'+data.registro+'</b></h6>'+

                '</div>'


            );

            return html;
        },
        templateSelection:function (data) {
            var html    =   $('<div class="select2-user-result"><b>Cliente: </b>'+data.text+'</div><br>'


            );

            return html;
        },

    });

    $('.veiculo-ajax').select2({
        //placeholder: 'Search for a category',
        ajax: {
            type: 'POST',
            url: URL+"/admin/veiculo/pesquisarPlaca",
            dataType: 'json',
            beforeSend: function (xhr) {
                var token = $("input[name='_token']" ).val();

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            quietMillis: 400,
            delay:400,
            data: function (term, page) {
                return {
                    q: term.term, //search term
                    // page size
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },

        },
        templateResult: function (data) {
            var html    =   $('<div class="select2-user-result"><h5 class="uppercase">'+data.id+'</h5>' +
                '<h6>Cor: <b>'+data.cor+'</b> - Modelo: <b>'+data.modelo+'</b> - Marca: <b>'+data.marca+'</b></h6>'+

                '</div>'


            );

            return html;
        },
        templateSelection:function (data) {
            var html    =   $('<div class="select2-user-result"><b>Veículo: </b><span class="uppercase">'+data.text+'</span></div><br>'


            );

            return html;
        },

    });

    $('.peca-ajax').select2({
        //placeholder: 'Search for a category',
        ajax: {
            type: 'POST',
            url: URL+"/admin/estoque/peca/pesquisaAjax",
            dataType: 'json',
            beforeSend: function (xhr) {
                var token = $("input[name='_token']" ).val();

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            quietMillis: 400,
            delay:400,
            data: function (term, page) {
                return {
                    q: term.term, //search term
                    // page size
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },

        },
        templateResult: function (data) {
            var html    =   $('<div class="select2-user-result"><h5 class="uppercase">'+data.nome+'</h5>' +
                '<h6>Marca: <b>'+data.marca+'</b> - Valor: <b>'+data.valor+'</b> - Disponíveis: <b>'+data.qnt+'</b></h6>'+

                '</div>'


            );

            return html;
        },
        templateSelection:function (data) {
            var html    =   $('<div class="select2-user-result"><b>Peça: </b><span class="uppercase">'+data.text+'</span></div><br>'


            );

            return html;
        },

    });
    $('.peca-ajax').change(function(){
       var peca =   $('.peca-ajax').val();
        if(peca != 0){
            $.get(URL+'/admin/estoque/getPeca/'+peca,function(resultado){
                $('#img-load').show('fast');
                $("#valor-peca").val(resultado.valor);
                $("#disp-peca").val(resultado.qnt);


            }).done(function() {

                $('#peca-campos').show('fast');
                $('#img-load').hide();
            }).fail(function() {
                $("#valor-peca").val('0.00');
                $('#peca-campos').hide('fast');
                $('#img-load').hide();
            })  .always(function() {

                $('#img-load').hide();

            });


        }else{

        }
    });
    $('#botao-add-peca').click(function(){
        var peca    =   $('.peca-ajax').val();
        var qnt     =   $('#qnt-peca').val();
        var valor   =   $('#valor-peca').val();
        var contrato    =   $("input[name='id']" ).val();

        var dados   =   {
            'contrato'  :   contrato,
            'peca'      :   peca,
            'qnt'       :   qnt,
            'valor'     :   valor
        }

        if(peca != 0 || qnt != 0){
            $.ajax({
                url: URL+'/admin/contrato/addPeca',
                type:"POST",
                beforeSend: function (xhr) {
                    var token = $("input[name='_token']" ).val();

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: dados,
                success:function(data){

                    $('.tabela-pecas').html(data.html);

                },error:function(){
                    alert("error!!!!");
                }
            }); //end of ajax
        }
        return false;


    });

    $('.servico-ajax').change(function(){
        var servico  =   $('.servico-ajax').val();

        if(servico != 0){

            $.get(URL+'/admin/servico/getServico/'+servico,function(resultado){
                $('#img-load').show('fast');
                $("#valor-servico").val(resultado.valor);

            }).done(function() {

                $('#servico-campos').show('fast');
                $('#img-load').hide();
            }).fail(function() {
                $("#valor-servico").val('0.00');
                $('.servico-campos').hide('fast');
                $('#img-load').hide();
            })  .always(function() {

                $('#img-load').hide();

            });
        }else{
            $("#valor-servico").val('0.00');
            $('#servico-campos').hide('fast');
        }


    });
    $('#botao-add-servico').click(function(){
        var contrato    =   $("input[name='id']" ).val();
        var servico     =   $('#servico').val();
        var valor       =   $('#valor-servico').val();
        var dados = {
            'contrato'      :   contrato,
            'servico'       :   servico,
            'valor'         :   valor
        }


       if(servico != 0){
           $.ajax({
               url: URL+'/admin/contrato/addServico',
               type:"POST",
               beforeSend: function (xhr) {
                   var token = $("input[name='_token']" ).val();

                   if (token) {
                       return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                   }
               },
               data: dados,
               success:function(data){

                   $("#valor-servico").val('0.00');
                   $('#servico-campos').hide('fast');
                   $('.tabela-servicos').html(data.html);







               },error:function(){
                   alert("error!!!!");
               }
           }); //end of ajax
       }else{
           $('#servico-campos').hide('fast');
           alert("Selecione um servico.");
       }

        return false;
    });



    $('.maskData').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        timePicker24Hour: true,
        timePicker: true,
        showWeekNumbers:true,
        locale: {
            format: 'DD/MM/YYYY HH:mm:ss',
            applyLabel: 'Pronto',
            cancelLabel: 'Cancelar',
            daysOfWeek: ['Do', 'Se', 'Te', 'Qu', 'Qi', 'Se','Sa'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],

        },

    });
});