@extends('layouts.temp') {{-- Aplicando um layout base na página --}}

@section('title', 'Login') {{-- Setando o título da página --}}

@section('content') {{-- Inserindo o conteúdo único dessa página na base do layout --}}
    <h1>Login</h1>
    <hr>
    <livewire:login-form />
@endsection

