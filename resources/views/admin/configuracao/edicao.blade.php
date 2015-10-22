@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['configuracao.atualizar'],'method'=>'POST', 'files'=>true]) !!}

        @include('admin.configuracao.includes.formulario')


    {!! Form::close() !!}









@endsection