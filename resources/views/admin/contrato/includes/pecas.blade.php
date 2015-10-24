<table class="table table-bordered table-hover">
    <thead>
        <th>Peça</th>
        <th>Qnt</th>
        <th>Valor</th>
        <th>Total</th>
        @if($contrato->status->last()->id != unserialize(\App\Configuracao::find(1)->contrato)['finalizado'] and $contrato->status->last()->id != unserialize(\App\Configuracao::find(1)->contrato)['cancelado'])
        <th></th>
        @endif
    </thead>
    <tbody>
    @foreach($contrato->pedidos as $r)
        <tr>
            <td>{!! $r->peca->descricao !!}</td>
            <td>{!! $r->qnt !!}</td>
            <td>{!! $r->valor !!}</td>
            <td>{!! $r->valor_total !!}</td>
            @if($contrato->status->last()->id != unserialize(\App\Configuracao::find(1)->contrato)['finalizado'] and $contrato->status->last()->id != unserialize(\App\Configuracao::find(1)->contrato)['cancelado'])
            <td><a href="#" class="btn btn-xs btn-danger excluir-peca" pedido="{!! $r->id !!}" contrato="{!! $contrato->id !!}" peca="{!! $r->peca->id !!}"><i class="fa fa-remove "></i></a></td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
<h4>Valor: <b>R$ {!! $contrato->pedidos->sum('valor_total') !!}</b></h4>



<script type="text/javascript">

    $('.excluir-peca').click(function(){
        var peca     =   $(this).attr('peca');
        var contrato    =   $(this).attr('contrato');
        var pedido      =   $(this).attr('pedido');

        var dados   =   {
            'peca'      :   peca,
            'contrato'  :   contrato,
            'pedido'    :   pedido
        }

        $.ajax({
            url: $("input[name='URL']" ).val()+'/admin/contrato/rmPeca',
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

    });


</script>