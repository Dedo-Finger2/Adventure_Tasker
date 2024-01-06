@extends('layouts.temp') {{-- Aplicando um layout base na página --}}

@section('title', 'Profile') {{-- Setando o título da página --}}

@section('content') {{-- Inserindo o conteúdo único dessa página na base do layout --}}
    <body class="bg-secondary-subtle bg-gradient" style="height: 100vh;">

        <div class="container bg-white mt-5 mb-5 rounded-3 p-5">
            <div class="row">

                <div class="col-md-6">
                    <img src="{{ asset('storage/'.auth()->user()->profile_image) }}" class="img-fluid w-50 rounded-3 shadow-sm border border-primary border-1" alt="">

                    <h2 class="mt-3">{{ auth()->user()->name }}</h2>
                    <p class="">{{ auth()->user()->created_at }}</p>

                    <p class="fs-5"><span class="badge text-bg-primary">Level: {{ auth()->user()->attributes[0]->current_level }}/{{ auth()->user()->attributes[0]->max_level }}</span></p>
                    <p class="fs-5"><span class="badge text-bg-warning">Moedas: ${{ auth()->user()->attributes[0]->current_money }}</span></p>
                    <p class="fs-5"><span class="badge text-bg-info">Exp: {{ auth()->user()->attributes[0]->current_exp }}/{{ auth()->user()->attributes[0]->exp_next_level }}</span></p>

                    {{-- TODO: Implementar edição do usuário --}}
                    <button class="btn btn-outline-primary shadow w-50 mt-4">Editar</button>

                </div>

                <div class="col-md-6">

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Tarefas concluídas</button>
                        </li>

                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Tarefas excluídas</button>
                        </li>

                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            {{-- TODO: Alterar lá as coisas, o estilo de lá o CSS --}}
                            <livewire:user-completed-tasks-list />
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            {{-- TODO: Adicionar as tarefas deletadas --}}
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </body>
@endsection

