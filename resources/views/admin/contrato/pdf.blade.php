<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

</head>
<body>
<style type="text/css">
    *{
        padding: 0;
        margin: 0;
        font-family: "Georgia", Times, serif;
        font-size: 13px;
    }

    .borda{
        border-top: 1px solid #625e5c;
        padding: 0 10px 0 10px;
        margin: 5px 0 0 0 ;
    }
    .borda .titulo{
        border-bottom: 1px solid #625e5c ;
        padding: 2px;
        font-size: 14px;
    }
    #cabecalho{
        padding: 20px;
    }
    .centralizar{
        text-align: center;
    }
    .nome-empresa{
        font-size: 20px;
        font-weight: bolder;
        padding: 10px;
    }
    .dados-empresa{
        font-size: 12px;
        font-weight: 100;
        padding: 5px;
    }
    .conteudo{
        padding: 2px 10px 2px 10px;
    }
    .conteudo h6{
        font-weight: 100;
    }
    table{
        width: 100%;
    }
    table thead th{
        font-size: 13px;
        font-weight: bolder;
        text-align: left;
    }


</style>
<div id="cabecalho">
    <div class="centralizar">

        <span class="nome-empresa">{!! \App\Configuracao::find(1)->nome_empresa !!}</span>
        <p class="dados-empresa">
            {!! \App\Configuracao::find(1)->endereco.', '.\App\Configuracao::find(1)->numero !!}<br>
            {!! \App\Configuracao::find(1)->cep.' - '.\App\Configuracao::find(1)->bairro.' - '.\App\Configuracao::find(1)->cidade.' - '.\App\Configuracao::find(1)->bairro !!}<br>
            {!! \App\Configuracao::find(1)->telefone1.' - '.\App\Configuracao::find(1)->telefone2.' - '.\App\Configuracao::find(1)->telefone3 !!}<br>
            {!! \App\Configuracao::find(1)->email !!}
        </p>
    </div>
</div>
<div id="conteudo">
    <div id="cliente" class="borda">
        <h5 class="titulo">Dados Cliente</h5>
        <div class="conteudo">
            <h6><b>Nome :</b>{!! $contrato->cliente->nome !!}</h6>
            <h6><b>Endereço :</b>{!! $contrato->cliente->logradouro .', '.$contrato->cliente->numero.' - '.$contrato->cliente->bairro.' - '.$contrato->cliente->cidade.' - '.$contrato->cliente->estado!!}</h6>
            <h6><b>Email :</b>{!! $contrato->cliente->email !!}</h6>
            <h6><b>Contatos :</b>
            @foreach($contrato->cliente->contatos as $contatos)
            {!! $contatos->telefone->ddd.' '.$contatos->telefone->id ." "!!}
            @endforeach
            </h6>
        </div>
    </div>
    <div id="veiculo"  class="borda">
        <h5 class="titulo">Dados Veículo</h5>
        <div class="conteudo">
            <h6><b>Placa :</b>{!! $contrato->veiculo->id    !!}</h6>
            <h6><b>Mod/Fab :</b>{!! $contrato->veiculo->ano_modelo." / ".$contrato->veiculo->ano_fabricacao    !!}</h6>
            <h6><b>Modelo :</b>{!! $contrato->veiculo->modelo->nome !!}</h6>
            <h6><b>Marca :</b>{!! $contrato->veiculo->modelo->marca->nome!!}</h6>

        </div>
    </div>
    @if($contrato->maoobra->count() >   0)
        <div id="servico"  class="borda">
            <h5 class="titulo">Serviços</h5>
            <div class="conteudo">
                <table>
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>nome</th>
                        <th>valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contrato->maoobra as $r)
                        <tr>
                            <td>{!! $r->id !!}</td>
                            <td>{!! $r->servico->nome !!}</td>
                            <td>{!! $r->valor !!}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    @endif
    @if($contrato->pedidos->count() > 0)
        <div id="div peca"  class="borda">
            <h5 class="titulo">Peças</h5>
            <div class="conteudo">
                <table>
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>nome</th>
                        <th>qnt</th>
                        <th>valor</th>
                        <th>total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contrato->pedidos as $r)
                        <tr>
                            <td>{!! $r->id !!}</td>
                            <td>{!! $r->peca->descricao !!}</td>
                            <td>{!! $r->qnt !!}</td>
                            <td>{!! $r->valor !!}</td>
                            <td>{!! $r->valor_total !!}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    @endif

</div>
<div id="rodape" class="borda">
    <h5 class="titulo">Dados</h5>
    <div class="conteudo">
        <h6><b>ID :</b>{!! $contrato->id   !!}</h6>
        <h6><b>Total Peças : R$ </b>{!! $contrato->pedidos->sum('valor_total') !!}</h6>
        <h6><b>Total Serviços : R$ </b>{!! $contrato->maoobra->sum('valor')!!}</h6>
        <h2><b>Total :</b> R$ {!! $contrato->maoobra->sum('valor') + $contrato->pedidos->sum('valor_total')!!}</h2>

    </div>
</div>

</body>
</html>