@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['marca.atualizar'],'method'=>'post']) !!}

        @include('admin.marca.includes.formulario')


    {!! Form::close() !!}









@endsection