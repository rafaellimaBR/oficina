@extends('admin.layout.lte.template')

@section('conteudo')
    <div class="row">
        <div class="col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs no-print">
                    <li class="active"><a data-toggle="tab" href="#dados" aria-expanded="false">Dados</a></li>
                        <li class=""><a data-toggle="tab" href="#servicos" aria-expanded="true">Servicos</a></li>
                        <li class=""><a data-toggle="tab" href="#pecas" aria-expanded="false">Peças</a></li>
                        <li class=""><a data-toggle="tab" href="#historico" aria-expanded="false">Histórico</a></li>

                </ul>
                <div class="tab-content">
                    <div id="dados" class="tab-pane active">

                        <section class="invoice">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2 class="page-header">
                                        <i class="fa fa-wrench"></i> <span class="uppercase">{!! $contrato->id !!}</span>
                                        <small class="pull-right"> {!! date_format(\Carbon\Carbon::now(), 'd/m/Y') !!}</small>
                                    </h2>
                                </div><!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Cliente
                                    <address>
                                        <strong>{!! $contrato->cliente->nome !!}</strong><br>
                                        {!! $contrato->cliente->logradouro.', '.$contrato->cliente->numero!!}<br>
                                        {!! $contrato->cliente->bairro.' - '.$contrato->cliente->cidade.'/'.$contrato->cliente->estado !!}<br>
                                        Cep: {!! $contrato->cliente->cep !!}<br>
                                        Email: {!! $contrato->cliente->email!!}<br>

                                        @foreach($contrato->cliente->contatos as $contato)
                                            {!! $contato->telefone->ddd.' '.$contato->telefone->id !!}<br>
                                        @endforeach

                                    </address>
                                </div><!-- /.col -->
                                <div class="col-sm-4 invoice-col">

                                    Veículo
                                    <address>
                                        <strong>{!! $contrato->veiculo->modelo->nome !!}</strong><br>

                                        Marca : {!! $contrato->veiculo->modelo->marca->nome !!}<br>
                                        Ano Modelo : {!! $contrato->veiculo->ano_modelo !!}<br>
                                        Ano Fabricação : {!! $contrato->veiculo->ano_fabricacao !!}<br>
                                        Cor : {!! $contrato->veiculo->cor !!}<br>
                                        Combustível : {!! $contrato->veiculo->combustivel !!}<br>
                                        Localidade : {!! $contrato->veiculo->cidade.'/'.$contrato->veiculo->estado !!}<br>
                                        Proprietário : {!! $contrato->veiculo->cliente->nome !!}
                                    </address>
                                </div><!-- /.col -->

                                <div class="col-sm-4 invoice-col">
                                    <b >Placa: <span class="uppercase">{!! $contrato->id !!}</span></b><br>
                                    <br>
                                    <b>Registrado:</b> {!! date_format($contrato->created_at, 'd/m/Y') !!}<br>
                                    <b>Modificado:</b>  {!! date_format($contrato->updated_at, 'd/m/Y') !!}<br>

                                </div><!-- /.col -->
                            </div><!-- /.row -->


                        </section>



                    </div><!-- /.tab-pane -->
                    <div id="servicos" class="tab-pane ">
                        <section class="invoice">
                            <h3>Seriços</h3>
                            <div class="row">
                                <table class="table table-responsive table-hover table-bordered">
                                    <thead>
                                        <th>ID</th>
                                        <th>Descrição</th>
                                        <th>Valor</th>
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
                        </section>
                    </div><!-- /.tab-pane -->
                    <div id="pecas" class="tab-pane">
                        <section class="invoice">
                            <h3>Peças</h3>
                            <div class="row">
                                <table class="table table-responsive table-hover table-bordered">
                                    <thead>
                                    <th>ID</th>
                                    <th>Descrição</th>
                                    <th>Qnt</th>
                                    <th>Valor</th>
                                    <th>Total</th>
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
                        </section>
                    </div><!-- /.tab-pane -->
                    <div id="historico" class="tab-pane">
                        <section class="invoice">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- The time line -->
                                    <ul class="timeline">
                                        @foreach($contrato->historicos as $r)
                                            <li class="time-label">
                                              <span style="background: {!! $r->status->cor !!}; color: #ffffff; font-weight: bolder">
                                                {!! $r->status->nome !!}
                                              </span>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> {!! $r->data !!}</span>

                                                    <h3 class="timeline-header"><a href="#">{!! $r->status->nome !!}</a> {!! $r->status->obs !!}</h3>

                                                    <div class="timeline-body">
                                                        {!! $r->obs !!}
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                            <li>
                                                <i class="fa fa-clock-o bg-gray"></i>
                                            </li>

                                    </ul>
                                </div>
                                <!-- /.col -->
                            </div>
                        </section>
                    </div><!-- /.tab-pane -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <a href="{!! route('contrato.index') !!}" class="btn btn-default"><i class="fa   fa-mail-reply"> </i> Voltar</a>
                            <a class="btn btn-default pull-right"  href="javascript:window.print()"><i class="fa fa-print"></i> Imprimir</a>


                            <a href="{!! route('contrato.download',['id'=>$contrato->id]) !!}" style="margin-right: 5px;" class="btn btn-primary pull-right"><i class="fa fa-download"></i> Download</a>
                        </div>
                    </div>
                </div><!-- /.tab-content -->

            </div>


        </div>
    </div>



@endsection