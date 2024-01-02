@extends('layouts.temp') {{-- Aplicando um layout base na página --}}

@section('title', 'Register') {{-- Setando o título da página --}}

@section('content') {{-- Inserindo o conteúdo único dessa página na base do layout --}}
    <h1>Register</h1>
    <hr>
    <livewire:user-create-form /> {{-- Formulário de cadastro em formato de componente livewire --}}
@endsection

