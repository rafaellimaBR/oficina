@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['cliente.atualizar'],'method'=>'post']) !!}

        @include('admin.cliente.includes.formulario')


    {!! Form::close() !!}









@endsection