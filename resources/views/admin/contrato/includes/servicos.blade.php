<table class="table table-bordered table-hover">
    <thead>
        <th>Servico</th>
        <th>Valor</th>
        <th></th>
    </thead>
    <tbody>
    @foreach($contrato->maoobra as $r)
        <tr>
            <td>{!! $r->servico->nome !!}</td>
            <td>{!! $r->valor !!}</td>
            <td><a href="#" class="btn btn-xs btn-danger excluir-servico" contrato="{!! $contrato->id !!}" servico="{!! $r->servico->id !!}"><i class="fa fa-remove "></i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<h4>Valor: <b>R$ {!! $contrato->maoobra->sum('valor') !!}</b></h4>



<script type="text/javascript">

    $('.excluir-servico').click(function(){
        var servico     =   $(this).attr('servico');
        var contrato    =   $(this).attr('contrato');

        var dados   =   {
            'servico'   :   servico,
            'contrato'  :   contrato
        }

        $.ajax({
            url: $("input[name='URL']" ).val()+'/admin/contrato/remServico',
            type:"POST",
            beforeSend: function (xhr) {
                var token = $("input[name='_token']" ).val();

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: dados,
            success:function(data){

                console.log(data);
                $('.tabela-servicos').html(data.html);

            },error:function(){
                alert("error!!!!");
            }
        }); //end of ajax

    });


</script>