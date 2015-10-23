@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['peca.atualizar'],'method'=>'post']) !!}

        @include('admin.peca.includes.formulario')


    {!! Form::close() !!}









@endsection