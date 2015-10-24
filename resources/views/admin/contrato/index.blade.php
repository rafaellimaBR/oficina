@extends('admin.layout.lte.template')

@section('conteudo')
{{--{!! dd($contratos) !!}--}}
    <div class="row">
        <div class="col-xs-12">
            <div class="botoes">
                <a href="{!! route('contrato.novo') !!}" class="btn btn-success"><i class="fa fa-plus"> </i> Nova Ordem de Serviço</a>
                <a href="{!! route('contrato.novoorcamento') !!}" class="btn btn-warning"><i class="fa fa-plus"> </i> Novo Orçamento</a>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-xs-12">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">Titulo Pagina</h3>
                <div class="row">
                    {!! Form::open(['route'=>['contrato.pesquisa'],'method'=>'post']) !!}
                    <div class="form-group col-xs-4">
                        {!! Form::label('cliente','Cliente') !!}
                        {!! Form::select('cliente',[0=>'Todos']+$clientes, 0, ['class'=>'form-control select2']) !!}

                    </div>
                    <div class="form-group col-xs-3">
                        {!! Form::label('veiculo','Veiculo') !!}
                        {!! Form::select('veiculo',[0=>'Todos']+$veiculos, 0, ['class'=>'form-control select2 ']) !!}

                    </div>
                    <div class="form-group col-xs-2">
                        {!! Form::label('stauts','Status') !!}
                        {!! Form::select('stauts',[0=>'Todos']+$status, 0 , ['class'=>'form-control select2 ']) !!}

                    </div>

                    <div class="form-group col-xs-1 pull-right">

                        {!! Form::label('pesquisa','Pesquisar') !!}
                        <button type="submit" class="btn btn-success form-control"><i class="fa fa-search"> </i></button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="width:3%">ID</th>
                        <th style="width:25%">Nome</th>
                        <th style="width:10%">Veiculo</th>
                        <th style="width:12%">Modelo</th>
                        <th style="width:12%">Situação</th>
                        <th>Entrada em</th>
                        <th>Valor</th>
                        <th style="width:10%"></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contratos as $r)
                    <tr>
                        <td><b>{!! $r->id !!}</b></td>
                        <td>{!! $r->cliente->nome !!}</td>
                        <td><span class="uppercase">{!! $r->veiculo->id !!}</span></td>
                        <td>{!! $r->veiculo->modelo->nome !!}</td>
                        <td><span style="background: {!! $r->status->last()->cor !!}; color: #ffffff; padding: 3px;border-radius: 5px; font-weight: bolder">{!! $r->status->last()->nome !!}</span></td>
                        <td>{!! date_format($r->created_at,'d/m/Y')." às ".date_format($r->created_at,'H:i') !!}</td>
                        <td>R$ {!! $r->maoobra->sum('valor') + $r->pedidos->sum('valor_total')!!}</td>
                        <td>
                            <a href="#" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{!! route('contrato.editar',['id'=>$r->id]) !!}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-xs btn-danger excluir" data-toggle="modal" data-target="#form-excluir" excluir="{!! $r->id !!}"><i class="fa fa-remove "></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th >ID</th>
                        <th >Nome</th>
                        <th >Veiculo</th>
                        <th >Modelo</th>
                        <th>Situação</th>
                        <th>Entrada em</th>
                        <th>Valor</th>
                        <th ></th>
                    </tr>
                    </tfoot>
                </table>
                @include('admin.contrato.includes.excluir')
                {!! $contratos->render() !!}
            </div><!-- /.box-body -->
        </div><!-- /.box -->


    </div><!-- /.col -->
    </div><!-- /.row -->

    {{--@include('admin.marca.includes.excluir')--}}
@endsection