@extends('layouts.temp') {{-- Aplicando um layout base na página --}}

@section('title', 'My Tasks') {{-- Setando o título da página --}}

@section('content') {{-- Inserindo o conteúdo único dessa página na base do layout --}}
    <h1>My Tasks</h1>
    <hr>
    <livewire:my-tasks-list />
@endsection


