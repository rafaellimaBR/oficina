@extends('admin.layout.lte.template')

@section('conteudo')
{{--{!! dd($pecas) !!}--}}
    <div class="row">
        <div class="col-xs-12">
            <div class="botoes">
                <a href="{!! route('peca.novo') !!}" class="btn btn-success"><i class="fa fa-plus"> </i> Novo Registro</a>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-xs-12">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">Titulo Pagina</h3>
                {!! Form::open(['route'=>['peca.pesquisa'],'method'=>'post']) !!}
                <div class="row">

                    <div class="form-group col-xs-4">

                        {!! Form::label('descricao','Descricao') !!}
                        {!! Form::text('descricao','',['class'=>'form-control',]) !!}

                    </div>
                    <div class="form-group col-xs-2">

                        {!! Form::label('referencia','Referencia') !!}
                        {!! Form::text('referencia','',['class'=>'form-control',]) !!}

                    </div>
                    <div class="form-group col-xs-2">

                        {!! Form::label('codigo','Cod. Original') !!}
                        {!! Form::text('codigo','',['class'=>'form-control',]) !!}

                    </div>
                    <div class="form-group col-xs-2">

                        {!! Form::label('marca','Marca') !!}
                        {!! Form::text('marca','',['class'=>'form-control',]) !!}

                    </div>
                    <div class="form-group col-xs-2">

                        {!! Form::label('categoria','Categoria') !!}
                        {!! Form::select('categoria',[0=>'Todas categorias']+$categorias, 0, ['class'=>'form-control select2']) !!}

                    </div>


                </div>
                <div class="row">
                    <div class="form-group col-xs-10">

                        {!! Form::label('aplicacao','Aplicação') !!}
                        {!! Form::text('aplicacao','',['class'=>'form-control',]) !!}

                    </div>
                    <div class="form-group col-xs-1">

                        {!! Form::label('qnt','Por qnt') !!}
                        {!! Form::select('qnt',[0=>'Todas','10'=>'<10','5'=>'<5','2'=>'<2'], 0, ['class'=>'form-control select2']) !!}

                    </div>
                    <div class="form-group col-xs-1">

                        {!! Form::label('pesquisa','Pesquisar') !!}
                        <button type="submit" class="btn btn-success form-control"><i class="fa fa-search"> </i></button>
                    </div>

                </div>
                {!! Form::close() !!}
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="width:3%">ID</th>
                        <th style="width:20%">Descrição</th>
                        <th style="width:42%">Aplicação</th>
                        <th style="width:10%">Marca</th>
                        <th style="width:10%">Valor</th>
                        <th style="width:5%">Qnt</th>
                        <th style="width:13%"></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pecas as $r)
                    <tr>
                        <td>{!! $r->id !!}</td>
                        <td>{!! $r->descricao !!}</td>
                        <td>{!! $r->aplicacao !!}</td>
                        <td>{!! $r->marca !!}</td>
                        <td>{!! $r->valor.' / '.$r->unidade !!}</td>
                        <td>{!! $r->qnt !!}</td>
                        <td>
                            <a href="#" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{!! route('peca.editar',['id'=>$r->id]) !!}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-xs btn-danger excluir" data-toggle="modal" data-target="#form-excluir" excluir="{!! $r->id !!}"><i class="fa fa-remove "></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th >ID</th>
                        <th >Descrição</th>
                        <th >Aplicação</th>
                        <th >Marca</th>
                        <th >Valor</th>
                        <th >Qnt</th>
                        <th ></th>
                    </tr>
                    </tfoot>
                </table>
                @include('admin.peca.includes.excluir')
                {!! $pecas->render() !!}
            </div><!-- /.box-body -->
        </div><!-- /.box -->


    </div><!-- /.col -->
    </div><!-- /.row -->

    {{--@include('admin.peca.includes.excluir')--}}
@endsection