<nav class="navbar navbar-expand-lg navbar-light bg-warning bg-gradient">
    <div class="container">
        <a class="navbar-brand" href="/">De Island Bakery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav px-4 text-decoration-underline">
                <div class="col-md-6" style="margin:0 10vw 0 0;"></div>
                <a class="nav-link fw-bold {{ ($page === 'Home') ? 'active' : '' }}" href="/">Home</a>
                <div class="" style="margin:0 0 0 0;"></div>
                <a class="nav-link fw-bold {{ ($page === 'Kontak Kami') ? 'active' : '' }}" href="/about">Kontak</a>
                <div class="col-md-6" style="margin:0 0 0 10vw;"></div>                                  
                <a class="nav-link fw-bold {{ ($page === 'Login') ? 'active' : '' }}" href="/login">Login</a>
            </div>        
    </div>
</nav>