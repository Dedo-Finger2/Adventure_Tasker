@extends('layouts.temp') {{-- Aplicando um layout base na página --}}

@section('title', 'Create Priority') {{-- Setando o título da página --}}

@section('content') {{-- Inserindo o conteúdo único dessa página na base do layout --}}
    <h1>Create Priority</h1>
    <hr>
    <livewire:create-priority-form /> {{-- Formulário de cadastro em formato de componente livewire --}}
@endsection

