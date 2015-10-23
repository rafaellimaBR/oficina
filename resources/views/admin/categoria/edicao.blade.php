@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['categoria.atualizar'],'method'=>'post']) !!}

        @include('admin.categoria.includes.formulario')


    {!! Form::close() !!}









@endsection