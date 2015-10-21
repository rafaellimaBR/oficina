<table class="table table-bordered table-hover">
    <thead>
        <th>Peça</th>
        <th>Qnt</th>
        <th>Valor</th>
        <th>Total</th>
        <th></th>
    </thead>
    <tbody>
    @foreach($contrato->pedidos as $r)
        <tr>
            <td>{!! $r->peca->descricao !!}</td>
            <td>{!! $r->qnt !!}</td>
            <td>{!! $r->valor !!}</td>
            <td>{!! $r->qnt * $r->valor !!}</td>
            <td><a href="#" class="btn btn-xs btn-danger excluir-peca" contrato="{!! $contrato->id !!}" peca="{!! $r->peca->id !!}"><i class="fa fa-remove "></i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<h4>Valor: <b>R$ {!! $contrato->pedidos->sum('valor') !!}</b></h4>



<script type="text/javascript">

    $('.excluir-peca').click(function(){
        var peca     =   $(this).attr('peca');
        var contrato    =   $(this).attr('contrato');

        var dados   =   {
            'peca'      :   peca,
            'contrato'  :   contrato
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