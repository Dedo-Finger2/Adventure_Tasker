<nav>
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
</nav>
<hr>
