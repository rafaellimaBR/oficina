@extends('admin.layout.lte.template')

@section('conteudo')
{{--{!! dd($veiculos) !!}--}}
    <div class="row">
        <div class="col-xs-12">
            <div class="botoes">
                <a href="{!! route('veiculo.novo') !!}" class="btn btn-success"><i class="fa fa-plus"> </i> Novo Registro</a>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-xs-12">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">Titulo Pagina</h3>
                <div class="row">
                    {!! Form::open(['route'=>['veiculo.pesquisa'],'method'=>'post']) !!}
                    <div class="form-group col-xs-2">

                        {!! Form::label('placa','Placa') !!}
                        {!! Form::text('placa','',['class'=>'form-control',]) !!}

                    </div>
                    <div class="form-group col-xs-3">

                        {!! Form::label('modelo','Modelos') !!}
                        {!! Form::select('modelo',[0=>'Todos os modelos.']+$modelos, 0, ['class'=>'form-control select2']) !!}
                        {!! ($errors->has('modelo')? "<p class='msg-alerta'>".$errors->first('modelo')."</p>":"") !!}
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
                        <th style="width:11%">Placa</th>
                        <th style="width:15%">Modelo</th>
                        <th style="width:15%">Marca</th>
                        <th style="width:30%">Proprietário</th>
                        <th>Criado em</th>
                        <th style="width:13%"></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($veiculos as $r)
                    <tr>
                        <td><span class="uppercase">{!! $r->id !!}</span> </td>
                        <td>{!! $r->modelo->nome !!}</td>
                        <td>{!! $r->modelo->marca->nome!!}</td>
                        <td>{!! $r->cliente->nome!!}</td>
                        <td>{!! date_format($r->created_at,'d/m/Y')." às ".date_format($r->created_at,'H:i') !!}</td>
                        <td>
                            <a href="{!! route('veiculo.detalhes',['id'=>$r->id]) !!}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{!! route('veiculo.editar',['id'=>$r->id]) !!}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-xs btn-danger excluir" data-toggle="modal" data-target="#form-excluir" excluir="{!! $r->id !!}"><i class="fa fa-remove "></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Placa</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Propriedade</th>
                        <th>Criado em</th>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
                @include('admin.veiculo.includes.excluir')
                {!! $veiculos->render() !!}
            </div><!-- /.box-body -->
        </div><!-- /.box -->


    </div><!-- /.col -->
    </div><!-- /.row -->

    {{--@include('admin.veiculo.includes.excluir')--}}
@endsection