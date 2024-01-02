@extends('layouts.temp') {{-- Aplicando um layout base na página --}}

@section('title', 'Profile') {{-- Setando o título da página --}}

@section('content') {{-- Inserindo o conteúdo único dessa página na base do layout --}}
    <h1>Profile</h1>
    <a href="">Minhas tarefas</a> {{-- Link para as minhas tarefas --}}
    <hr>

    <div>
        {{-- Imagem de perfil --}}
        <img src="{{ asset('storage/'.auth()->user()->profile_image) }}" alt="profile_image" style="width: 100px;">

        {{-- Nome e data de criação da conta --}}
        <h2>{{ auth()->user()->name }}</h2>
        <span>{{ auth()->user()->created_at }}</span>

        {{-- Status em texto --}}
        <ul>
            <li>Level: {{ auth()->user()->attributes[0]->current_level }}</li>
            <li>Dinheiro: {{ auth()->user()->attributes[0]->current_money }}</li>
            <li>Exp: {{ auth()->user()->attributes[0]->current_exp }}/{{ auth()->user()->attributes[0]->exp_next_level }}</li>
        </ul>
    </div>

    <br><br> {{-- Espaço --}}

    {{-- Tabs sem CSS --}}
    <div>
        <button onclick="openTab(event, 'tab1')">Tarefa concluídas</button>
        <button onclick="openTab(event, 'tab2')">Tab 2</button>
        <button onclick="openTab(event, 'tab3')">Tab 3</button>
    </div>

    <div id="tab1" class="tabcontent">
        <h3>Tarefas concluídas</h3>
        <p>Este é o conteúdo da Tab 1.</p>
    </div>

    <div id="tab2" class="tabcontent" style="display: none">
        <h3>SOON</h3>
        <p>Este é o conteúdo da Tab 2.</p>
    </div>

    <div id="tab3" class="tabcontent" style="display: none">
        <h3>SOON</h3>
        <p>Este é o conteúdo da Tab 3.</p>
    </div>

    {{-- Script das tabs --}}
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;

            tabcontent = document.getElementsByClassName("tabcontent");

            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            tablinks = document.getElementsByTagName("button");

            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            document.getElementById(tabName).style.display = "block";

            evt.currentTarget.className += " active";
        }
    </script>


@endsection

