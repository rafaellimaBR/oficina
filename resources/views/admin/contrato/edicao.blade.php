@extends('admin.layout.lte.template')

@section('conteudo')
    {!! $contrato->historicos->last()->status->nome !!}

    {!! Form::open(['route'=>['contrato.atualizar'],'method'=>'post']) !!}

        @include('admin.contrato.includes.formulario')


    {!! Form::close() !!}



    @include('admin.contrato.includes.cancelar',['contrato_id'=>$contrato->id])
    @include('admin.contrato.includes.finalizar',['contrato_id'=>$contrato->id])
    @include('admin.contrato.includes.autorizar',['contrato_id'=>$contrato->id])



@endsection