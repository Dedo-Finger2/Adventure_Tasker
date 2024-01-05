@extends('layouts.temp') {{-- Aplicando um layout base na página --}}

@section('title', 'Stores') {{-- Setando o título da página --}}

@section('content') {{-- Inserindo o conteúdo único dessa página na base do layout --}}
    <h1>Stores</h1>
    <hr>
    <a href="{{ route('') }}"></a>
@endsection

