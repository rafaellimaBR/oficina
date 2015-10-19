@extends('admin.layout.lte.template')

@section('conteudo')

    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-car"></i> <span class="uppercase">{!! $veiculo->id !!}</span>
                    <small class="pull-right"> {!! date_format(\Carbon\Carbon::now(), 'd/m/Y') !!}</small>
                </h2>
            </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">

                Veículo
                <address>
                    <strong>{!! $veiculo->modelo->nome !!}</strong><br>

                    Marca : {!! $veiculo->modelo->marca->nome !!}<br>
                    Ano Modelo : {!! $veiculo->ano_modelo !!}<br>
                    Ano Fabricação : {!! $veiculo->ano_fabricacao !!}<br>
                    Cor : {!! $veiculo->cor !!}<br>
                    Combustível : {!! $veiculo->combustivel !!}<br>
                    Localidade : {!! $veiculo->cidade.'/'.$veiculo->estado !!}<br>
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Proprietário
                <address>
                    <strong>{!! $veiculo->cliente->nome !!}</strong><br>
                    {!! $veiculo->cliente->logradouro.', '.$veiculo->cliente->numero!!}<br>
                    {!! $veiculo->cliente->bairro.' - '.$veiculo->cliente->cidade.'/'.$veiculo->cliente->estado !!}<br>
                    Cep: {!! $veiculo->cliente->cep !!}<br>
                    Email: {!! $veiculo->cliente->email!!}<br>

                    @foreach($veiculo->cliente->contatos as $contato)
                        {!! $contato->telefone->ddd.' '.$contato->telefone->id !!}<br>
                    @endforeach

                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b >Placa: <span class="uppercase">{!! $veiculo->id !!}</span></b><br>
                <br>
                <b>Registrado:</b> {!! date_format($veiculo->created_at, 'd/m/Y') !!}<br>
                <b>Modificado:</b>  {!! date_format($veiculo->updated_at, 'd/m/Y') !!}<br>

            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->




        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="{!! route('veiculo.index') !!}" class="btn btn-default"><i class="fa   fa-mail-reply"> </i> Voltar</a>
                <a class="btn btn-default pull-right"  href="javascript:window.print()"><i class="fa fa-print"></i> Imprimir</a>

                <button style="margin-right: 5px;" class="btn btn-primary pull-right"><i class="fa fa-download"></i> Gerar PDF</button>
            </div>
        </div>
    </section>

@endsection