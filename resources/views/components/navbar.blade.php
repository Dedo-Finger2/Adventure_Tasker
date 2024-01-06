{{-- TODO: Adicionar os status do usuário na navbar --}}
<header class="p-3 bg-dark border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
            <img src="https://github.com/Dedo-Finger2/Adventure_Tasker/blob/beta-02-styled/adventure-tasker8.jpeg?raw=true" class="img-fluid rounded-3 me-2" style="width: 50px;" alt="">
            <span class="text-white me-5 fw-bold fs-5">Adventure Tasker</span>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            {{-- TODO: Modal de criação de nova tarefa --}}
            <li ><a href="{{ route('home') }}" class="nav-link px-2 text-white">Home</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Criar nova tarefa</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Criar novo item próprio</a></li>
        </ul>

        <div class="dropdown text-end">
            <a href="#" class="d-block text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('storage/'.auth()->user()->profile_image) }}" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="{{ route('user.tasks') }}">Minhas tarefas</a></li>
            <li><a class="dropdown-item" href="{{ route('user.profile') }}">Perfil</a></li>
            <li><a class="dropdown-item" href="#">Inventário</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Log-out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
{{-- <nav>
    <a href="{{ route('home') }}">Home</a> -
    <a href="{{ route('login') }}">Login</a> -
    <a href="{{ route('user.create') }}">Register</a> -
    @auth
        <span>{{ auth()->user()->name }}</span> -
        <livewire:user-status-navbar />
        <a href="{{ route('user.profile') }}">Profile</a> -
        <a href="{{ route('store.stores') }}">Stores</a> -
        <form action="{{ route('logout') }}" method="POST"> @csrf <button type="submit">Logout</button></form> ---
    @endauth
    <a href="{{ route('priority.create') }}">Create priority</a> -
    <a href="{{ route('difficulty.create') }}">Create difficulty</a> -
    <a href="{{ route('item.create') }}">Create item</a>
</nav> --}}
