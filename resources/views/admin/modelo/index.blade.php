@extends('admin.layout.lte.template')

@section('conteudo')
{{--{!! dd($modelos) !!}--}}
    <div class="row">
        <div class="col-xs-12">
            <div class="botoes">
                <a href="{!! route('modelo.novo') !!}" class="btn btn-success"><i class="fa fa-plus"> </i> Novo Registro</a>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-xs-12">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">Titulo Pagina</h3>
                <div class="row">
                    {!! Form::open(['route'=>['modelo.pesquisa'],'method'=>'post']) !!}
                    <div class="form-group col-xs-3">

                        {!! Form::label('nome','Nome') !!}
                        {!! Form::text('nome','',['class'=>'form-control',]) !!}

                    </div>
                    <div class="form-group col-xs-4">

                        {!! Form::label('marca','Marcas') !!}
                        {!! Form::select('marca',[0=>'Todas as marcas'] + $marcas, 0, ['class'=>'form-control']) !!}
                        {!! ($errors->has('marca')? "<p class='msg-alerta'>".$errors->first('marca')."</p>":"") !!}
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
                        <th style="width:30%">Nome</th>
                        <th style="width:30%">Marca</th>
                        <th>Criado em</th>
                        <th style="width:13%"></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($modelos as $r)
                    <tr>
                        <td>{!! $r->id !!}</td>
                        <td>{!! $r->nome !!}</td>
                        <td>{!! $r->marca->nome !!}</td>
                        <td>{!! date_format($r->created_at,'d/m/Y')." às ".date_format($r->created_at,'H:i') !!}</td>
                        <td>
                            <a href="#" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{!! route('modelo.editar',['id'=>$r->id]) !!}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-xs btn-danger excluir" data-toggle="modal" data-target="#form-excluir" excluir="{!! $r->id !!}"><i class="fa fa-remove "></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Criado em</th>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
                @include('admin.modelo.includes.excluir')
                {!! $modelos->render() !!}
            </div><!-- /.box-body -->
        </div><!-- /.box -->


    </div><!-- /.col -->
    </div><!-- /.row -->

    {{--@include('admin.modelo.includes.excluir')--}}
@endsection