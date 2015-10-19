@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['marca.cadastrar'],'method'=>'post']) !!}

        @include('admin.marca.includes.formulario')


    {!! Form::close() !!}









@endsection