@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['grupo.atualizar'],'method'=>'post']) !!}

        @include('admin.grupo.includes.formulario')


    {!! Form::close() !!}









@endsection