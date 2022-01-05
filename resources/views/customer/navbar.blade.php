<nav class="navbar navbar-expand-lg navbar-light bg-warning bg-gradient">
    <div class="container">
        <a class="navbar-brand" href="{{ $mode === 'tamu' ? '/' : '/customer' }}">De Island Bakery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav px-4">
                <div class="" style="min-width: 20em;"></div>
                <a class="nav-link fw-bold {{ $page === 'Home' ? 'active' : '' }}"
                    href="{{ $mode === 'tamu' ? '/' : '/customer' }}">Home</a>
                <div class="" style="min-width: 1rem;"></div>
                <a class="nav-link fw-bold {{ $page === 'Kontak Kami' ? 'active' : '' }}" href="/about">Kontak</a>
                @if ($mode === 'tamu')
                    <div class="" style="min-width: 25em;"></div>
                    <a class="nav-link fw-bold {{ $page === 'Login' ? 'active' : '' }}" href="/login">Login</a>
                @else
                    <div class="" style="min-width: 20em;"></div>
                    <a class="nav-link fw-bold" href="{{ route('customer-logout') }}">Cart</a>
                    <div class="" style="min-width: 1rem;"></div>
                    <a class="nav-link fw-bold {{ $page === 'Profil Pelanggan' ? 'active' : '' }}"
                        href="{{ route('customer-profile') }}">Profil</a>
                    <div class="" style="min-width: 1rem;"></div>
                    <a class="nav-link fw-bold" href="{{ route('customer-logout') }}">Logout</a>
                @endif
            </div>
</nav>