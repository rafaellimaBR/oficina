@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['modelo.atualizar'],'method'=>'post']) !!}

        @include('admin.modelo.includes.formulario')


    {!! Form::close() !!}









@endsection