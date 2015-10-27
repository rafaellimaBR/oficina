@extends('admin.layout.lte.template')

@section('conteudo')

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-person-stalker"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Clientes</span>
                    <span class="info-box-number">{!! \App\Cliente::all()->count() !!}<small></small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-model-s"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Veículos</span>
                    <span class="info-box-number">{!! \App\Veiculo::all()->count() !!}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-gear-a"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Peças</span>
                    <span class="info-box-number">{!! \App\Peca::all()->count() !!}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-settings"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Servicos</span>
                    <span class="info-box-number">{!! \App\Servico::all()->count() !!}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Últimas Ordens</h3>

                    <div class="box-tools pull-right">
                        <button data-widget="collapse" class="btn btn-box-tool" type="button"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Veiculo</th>
                                <th>Modelo</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th>Valor</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Contrato::all() as $key => $r)
                                @if($key <= 5)
                                    <tr>
                                        <td><a href="{!! route('contrato.editar',['id'=>$r->id]) !!}">{!! $r->id !!}</a></td>
                                        <td>{!! $r->cliente->nome !!}</td>
                                        <td>{!! $r->veiculo->id !!}</td>
                                        <td>{!! $r->veiculo->modelo->nome !!}</td>
                                        <td>{!! $r->data_entrada !!}</td>
                                        <td ><span style="background: {!! $r->status->last()->cor !!}; color: #ffffff; padding: 3px;border-radius: 5px; font-weight: bolder">{!! $r->status->last()->nome !!}</span> </td>

                                        <td>R$ {!! $r->pedidos->sum('valor_total') + $r->maoobra->sum('valor') !!}</td>
                                    </tr>
                                @endif

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a class="btn btn-sm btn-info btn-flat pull-left" href="{!! route('contrato.novoorcamento') !!}">Novo Orçamento</a>
                    <a class="btn btn-sm btn-default btn-flat pull-right" href="{!! route('contrato.index') !!}">Todos</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Estoque Em Baixa</h3>

                    <div class="box-tools pull-right">
                        <button data-widget="collapse" class="btn btn-box-tool" type="button"><i class="fa fa-minus"></i>
                        </button>

                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descrição</th>
                                <th>Aplicação</th>
                                <th>Valor</th>
                                <th>Qnt</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Peca::PesquisarPorQnt(5)->get() as $key => $r)
                                @if($key <= 5)
                                    <tr>
                                        <td>{!! $r->id !!}</td>
                                        <td>{!! $r->descricao !!}</td>
                                        <td>{!! $r->aplicacao !!}</td>
                                        <td>{!! $r->valor !!}</td>
                                        <td>
                                            @if($r->qnt >= 4)
                                                <span class="bg-orange" style="padding: 3px; border-radius: 20px;">{!! $r->qnt !!}</span>
                                            @elseif($r->qnt >= 2 and $r->qnt < 4)
                                                <span class="bg-red">{!! $r->qnt !!}</span>
                                            @else
                                                <span class="bg-black">{!! $r->qnt !!}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endif

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a class="uppercase" href="{!! route('peca.index') !!}">Ver todas peças</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>
@endsection