@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['contrato.cadastrar'],'method'=>'post']) !!}

        @include('admin.contrato.includes.formulario')


    {!! Form::close() !!}









@endsection