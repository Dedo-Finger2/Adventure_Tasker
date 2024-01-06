<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- Bootstrap style --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- Bootstrap scripts --}}
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script defer src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="height: 100vh;">
    @auth()
        @include('components.navbar')
        @yield('content')
        @include('components.footer')
    @endauth

    @guest()
        @yield('content')
    @endguest

    <script>
        window.addEventListener('alert', (event) => {
            let data = event.detail;

            Swal.fire({
                position: data.position,
                icon: data.icon,
                title: data.title,
                text: data.text,
                showConfirmButton: data.showConfirmButton,
                timer: data.timer,
            });
        });
    </script>
</body>
</html>


{{--

Formulário, precisa do submit.prevent para evitar que haja como um formuláiro normal
    <form wire:submit.prevent="auth">

        <div>
            <label for="email">E-mail:</label>
            <input type="email" name="email" wire:model="email">
            @error('email') <span>{{ $message }}</span> @enderror
        </div>


        <div>
            <label for="password">Senha:</label>
            <input type="password" name="password" wire:model="password">
            @error('password') <span>{{ $message }}</span> @enderror
        </div>

        <button type="submit">Login</button>
        <a href="{{ route('user.create') }}">Fazer cadastro</a>

 --}}
