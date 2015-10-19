@extends('admin.layout.lte.template')

@section('conteudo')

    {!! Form::open(['route'=>['veiculo.atualizar'],'method'=>'post']) !!}

        @include('admin.veiculo.includes.formulario')


    {!! Form::close() !!}









@endsection