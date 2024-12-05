<!-- resources/views/partials/navigation.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <x-application-logo class="d-inline-block align-top" style="height: 40px;" />
        </a>

        <!-- Toggle Button for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Other navigation links can be added here -->
        </div>

        <!-- Authentication Links -->
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Log in') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @endauth
        </ul>
    </div>
</nav>
