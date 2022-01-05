<nav class="navbar navbar-expand-lg navbar-light bg-warning bg-gradient">
    <div class="container">
        <a class="navbar-brand" href="/admin">De Island Bakery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav px-4">
                <div class="col-md-11" style="margin:0 28vw 0 0"></div>
                <a class="nav-link fw-bold {{ $page === 'Admin Profile' ? 'active' : '' }}"
                    href="{{ route('admin-profile') }}">Profil</a>
                <div class="col-md-1"></div>
                <a class="nav-link fw-bold" href="{{ route('admin-logout') }}">Logout</a>
            </div>
        </div>
</nav>