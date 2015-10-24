@extends('admin.layout.lte.template')

@section('conteudo')
{{--{!! dd($usuarios) !!}--}}
    <div class="row">
        <div class="col-xs-12">
            <div class="botoes">
                <a href="{!! route('usuario.novo') !!}" class="btn btn-success"><i class="fa fa-plus"> </i> Novo Registro</a>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-xs-12">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">Titulo Pagina</h3>
                {!! Form::open(['route'=>['usuario.pesquisa'],'method'=>'post']) !!}
                <div class="row">



                </div>

                {!! Form::close() !!}
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="width:5%">ID</th>
                        <th style="width:30%">Nome</th>
                        <th  style="width:30%"> Grupo</th>
                        <th style="width:10%"></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $r)
                    <tr>
                        <td>{!! $r->id !!}</td>
                        <td>{!! $r->nome !!}</td>
                        <td>{!! $r->grupo->nome !!}</td>
                        <td>
                            <a href="#" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{!! route('usuario.editar',['id'=>$r->id]) !!}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-xs btn-danger excluir" data-toggle="modal" data-target="#form-excluir" excluir="{!! $r->id !!}"><i class="fa fa-remove "></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th >ID</th>
                        <th >Nome</th>
                        <th >Grupo</th>
                        <th ></th>
                    </tr>
                    </tfoot>
                </table>
                @include('admin.usuario.includes.excluir')
                {!! $usuarios->render() !!}
            </div><!-- /.box-body -->
        </div><!-- /.box -->


    </div><!-- /.col -->
    </div><!-- /.row -->

    {{--@include('admin.usuario.includes.excluir')--}}
@endsection