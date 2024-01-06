<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- Flowbite CSS --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    {{-- Flowbite css --}}
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</head>
<body>
    @auth()
        @include('components.navbar')
        @yield('content')
        @include('components.footer')
    @endauth

    @guest()
        @yield('content')
    @endguest

</body>
</html>
