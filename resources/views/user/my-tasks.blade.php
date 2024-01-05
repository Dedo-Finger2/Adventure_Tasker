@extends('layouts.temp') {{-- Aplicando um layout base na página --}}

@section('title', 'My Tasks') {{-- Setando o título da página --}}

@section('content') {{-- Inserindo o conteúdo único dessa página na base do layout --}}
    <h1>My Tasks</h1>
    <hr>

    {{-- Botão responsável por abrir o modal de criação de tarefas --}}
    <button id="openCreateTaskModal">Criar tarefa</button>

    {{-- Modal que vai mostrar o componente de criação detarefas --}}
    <dialog id="createTaskModal">
        <livewire:user-create-task-form />
        {{-- Botão que fecha o modal --}}
        <button id="closeCloseModalButton">Fechar</button>
    </dialog>

    <hr>
    <livewire:my-tasks-list />

    {{-- Script com a funcionalidade do modal --}}
    <script>
        var modal = document.getElementById('createTaskModal');
        var closeModalButton = document.getElementById('closeCloseModalButton');
        var openModalButton = document.getElementById('openCreateTaskModal');

        // Para abrir o modal, você pode usar o método show()
        openModalButton.onclick = function() {
            modal.show()
        }

        // Para fechar o modal, você pode usar o método close()
        closeModalButton.onclick = function() {
            modal.close();
        }
    </script>
@endsection
