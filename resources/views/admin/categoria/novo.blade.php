@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['categoria.cadastrar'],'method'=>'post']) !!}

        @include('admin.categoria.includes.formulario')


    {!! Form::close() !!}









@endsection