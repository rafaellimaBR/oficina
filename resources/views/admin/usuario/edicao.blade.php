@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['usuario.atualizar'],'method'=>'post']) !!}

        @include('admin.usuario.includes.formulario')


    {!! Form::close() !!}









@endsection