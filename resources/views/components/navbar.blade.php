<nav>
    <a href="{{ route('home') }}">Home</a> -
    <a href="{{ route('login') }}">Login</a> -
    <a href="{{ route('user.create') }}">Register</a> -
    @auth
        <span>{{ auth()->user()->name }}</span> -
        <livewire:user-status-navbar />
        <a href="{{ route('logout') }}">Logout</a>
    @endauth
</nav>
<hr>
