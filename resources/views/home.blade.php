@extends('layouts.temp')

@section('title', 'Home')

@section('content')

<style>
    @keyframes float {
        0% {
            transform: translatey(0px);
        }
        50% {
            transform: translatey(-15px);
        }
        100% {
            transform: translatey(0px);
        }
    }

    .img-floating {
        animation: float 3s ease-in-out infinite;
    }

    .text-purple {
        color: purple;
    }

    .text-yellow {
        color: orange;
    }

</style>

{{-- Hero --}}
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="https://github.com/Dedo-Finger2/Adventure_Tasker/blob/beta-02-styled/adventure-tasker8.jpeg?raw=true" class="d-block mx-lg-auto img-fluid rounded-5 shadow-lg img-floating" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Sua aventura no mundo da produtividade!</h1>
        <p class="lead">Com o Adventure Tasker, você vai se sentir mais motivado, produtivo e satisfeito com suas tarefas. Você poderá superar desafios de uma forma mais amigável, ganhar moedas, experiência e conquistas, e se divertir muito no processo!</p>
      </div>
    </div>
  </div>

  {{-- Jumbotrom --}}
  <div class="p-5 text-center bg-light">
    <div class="container py-5">
      <h1 class="text-body-emphasis">Full-width jumbotron</h1>
      <p class="col-lg-8 mx-auto lead">
        This takes the basic jumbotron above and makes its background edge-to-edge with a <code>.container</code> inside to align content. Similar to above, it's been recreated with built-in grid and utility classes.
      </p>
    </div>
  </div>

  {{-- 3 colunas --}}
  {{-- TODO: Fazer algo nesse espaço aqui --}}
  <div class="container">
    <div class="row text-center">
        <div class="col-md-4 mt-3 mb-3 bg-dark text-white">
            <h1>1</h1>
        </div>
        <div class="col-md-4 mt-3 mb-3 bg-dark text-white">
            <h1>2</h1>
        </div>
        <div class="col-md-4 mt-3 mb-3 bg-dark text-white">
            <h1>3</h1>
        </div>
    </div>


    {{-- Features --}}
    <hr class="featurette-divider">

    <div class="row featurette mt-5 mb-5">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">Acomule <span class="text-yellow fw-bold">Moedas!</span></h2>
        <p class="lead">Sempre que você completa uma tarefa você ganha moedas! E com elas você será capaz de comprar itens, power-ups para dar um boost
            nos seus ganhos e também upgrades que vão deixar sua jornada mais fácil e recompensadora!</p>
      </div>
      <div class="col-md-5">
        <img src="https://th.bing.com/th/id/OIG.qNNDYdWpJt8GvPZE3Sk1?w=1024&h=1024&rs=1&pid=ImgDetMain" class="img-fluid rounded-5 shadow" alt="">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette mt-5 mb-5">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">Atinja <span class="text-yellow fw-bold">Objetivos</span> e <span class="text-purple fw-bold">Consquistas!</span></h2>
        <p class="lead">Vá completando suas tarefas e ganhe consquistas ao decorrer da sua jornada, conlecione todas elas e veja seu progresso, sua jornada e história sendo contadas por elas no seu <span class="text-yellow fw-bold">inventário de conquistas!</span></p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="https://th.bing.com/th/id/OIG.DSbdSn1gz36tJrsabDZf?w=1024&h=1024&rs=1&pid=ImgDetMain" class="img-fluid rounded-5 shadow" alt="">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette mt-5 mb-5">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">Seja Produtivo Enquanto <span class="text-purple fw-bold">Se Diverte </span> e é <span class="text-yellow fw-bold">Recompensado</span></h2>
        <p class="lead">Crie tarefas, dê um prazo, define se são recorrentes ou não, o tempo de recorrência, a dificuldade e prioridade. Você pode até mesmo adicionar subtarefas às tarefas que já possui! Complete suas tarefas chatas e ganhe algo em troca imediatamente, motivação total!</p>
      </div>
      <div class="col-md-5">
        <img src="https://th.bing.com/th/id/OIG.VE8Ew3JADiqF_8RKDATB?pid=ImgGn" class="img-fluid rounded-5 shadow" alt="">
      </div>
    </div>

    <hr class="featurette-divider">

  </div>
@endsection

