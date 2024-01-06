@extends('layouts.temp') {{-- Aplicando um layout base na página --}}

@section('title', 'Login') {{-- Setando o título da página --}}

@section('content') {{-- Inserindo o conteúdo único dessa página na base do layout --}}
    <livewire:login-form />
@endsection

