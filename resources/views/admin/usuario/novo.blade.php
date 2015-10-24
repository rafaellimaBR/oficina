@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['usuario.cadastrar'],'method'=>'post']) !!}

        @include('admin.usuario.includes.formulario')


    {!! Form::close() !!}









@endsection