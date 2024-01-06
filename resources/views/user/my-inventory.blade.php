@extends('layouts.temp') {{-- Aplicando um layout base na página --}}

@section('title', 'My Iventory') {{-- Setando o título da página --}}

@section('content') {{-- Inserindo o conteúdo único dessa página na base do layout --}}
    <h1>My Iventory</h1>
    <hr>
    <livewire:user-items-list />
@endsection

