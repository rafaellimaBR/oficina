@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['servico.atualizar'],'method'=>'post']) !!}

        @include('admin.servico.includes.formulario')


    {!! Form::close() !!}









@endsection