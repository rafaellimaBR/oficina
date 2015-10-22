@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['contrato.cadastrar'],'method'=>'post']) !!}

        {!! Form::hidden('tipo-registro','orcamento') !!}
        @include('admin.contrato.includes.formulario')


    {!! Form::close() !!}









@endsection