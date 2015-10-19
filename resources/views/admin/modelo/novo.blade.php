@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['modelo.cadastrar'],'method'=>'post']) !!}

        @include('admin.modelo.includes.formulario')


    {!! Form::close() !!}









@endsection