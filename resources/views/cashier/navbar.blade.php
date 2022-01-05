<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 position-fixed"
            style="background-color: rgb(255, 208, 0); z-index:1;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">De Island</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="/cashier" class="nav-link px-0 align-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill-rule="evenodd"
                                    d="M8.954 17H2.75A1.75 1.75 0 011 15.25V3.75C1 2.784 1.784 2 2.75 2h18.5c.966 0 1.75.784 1.75 1.75v11.5A1.75 1.75 0 0121.25 17h-6.204c.171 1.375.805 2.652 1.769 3.757A.75.75 0 0116.25 22h-8.5a.75.75 0 01-.565-1.243c.964-1.105 1.598-2.382 1.769-3.757zM21.5 3.75v11.5a.25.25 0 01-.25.25H2.75a.25.25 0 01-.25-.25V3.75a.25.25 0 01.25-.25h18.5a.25.25 0 01.25.25zM13.537 17c.125 1.266.564 2.445 1.223 3.5H9.24c.659-1.055 1.097-2.234 1.223-3.5h3.074z">
                                </path>
                            </svg>&nbsp;<span class="ms-1 d-none d-sm-inline link-dark fw-bold">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path
                                    d="M3.5 3.75a.25.25 0 01.25-.25h13.5a.25.25 0 01.25.25v10a.75.75 0 001.5 0v-10A1.75 1.75 0 0017.25 2H3.75A1.75 1.75 0 002 3.75v16.5c0 .966.784 1.75 1.75 1.75h7a.75.75 0 000-1.5h-7a.25.25 0 01-.25-.25V3.75z">
                                </path>
                                <path
                                    d="M6.25 7a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm-.75 4.75a.75.75 0 01.75-.75h4.5a.75.75 0 010 1.5h-4.5a.75.75 0 01-.75-.75zm16.28 4.53a.75.75 0 10-1.06-1.06l-4.97 4.97-1.97-1.97a.75.75 0 10-1.06 1.06l2.5 2.5a.75.75 0 001.06 0l5.5-5.5z">
                                </path>
                            </svg>&nbsp;<span class="ms-1 d-none d-sm-inline link-dark fw-bold">Transaction</span>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('cashier-menu') }} " class="nav-link px-0 align-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path
                                    d="M3.604 3.089A.75.75 0 014 3.75V8.5h.75a.75.75 0 010 1.5h-3a.75.75 0 110-1.5h.75V5.151l-.334.223a.75.75 0 01-.832-1.248l1.5-1a.75.75 0 01.77-.037zM8.75 5.5a.75.75 0 000 1.5h11.5a.75.75 0 000-1.5H8.75zm0 6a.75.75 0 000 1.5h11.5a.75.75 0 000-1.5H8.75zm0 6a.75.75 0 000 1.5h11.5a.75.75 0 000-1.5H8.75zM5.5 15.75c0-.704-.271-1.286-.72-1.686a2.302 2.302 0 00-1.53-.564c-.535 0-1.094.178-1.53.565-.449.399-.72.982-.72 1.685a.75.75 0 001.5 0c0-.296.104-.464.217-.564A.805.805 0 013.25 15c.215 0 .406.072.533.185.113.101.217.268.217.565 0 .332-.069.48-.21.657-.092.113-.216.24-.403.419l-.147.14c-.152.144-.33.313-.52.504l-1.5 1.5a.75.75 0 00-.22.53v.25c0 .414.336.75.75.75H5A.75.75 0 005 19H3.31l.47-.47c.176-.176.333-.324.48-.465l.165-.156a5.98 5.98 0 00.536-.566c.358-.447.539-.925.539-1.593z">
                                </path>
                            </svg>&nbsp;<span class="ms-1 d-none d-sm-inline link-dark fw-bold">Menu</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (empty($image))
                            <img src="{{ asset($default_img = '/storage/cashier-images/default-avatar.png') }}"
                                alt="{{ $name }}" width="30" height="30" class="rounded-circle">
                        @else
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $name }}" width="30"
                                height="30" class="rounded-circle">
                        @endif
                        <span class="d-none d-sm-inline mx-2 lh-1"><i class="h-5 text-disabled">Kasir</i><br>
                            @php
                                if (count(explode(' ', $name)) > 1) {
                                    if (strlen(explode(' ', $name)[0]) > 1) {
                                        echo explode(' ', $name)[0] . ' ' . str_split(explode(' ', $name)[1])[0];
                                    } elseif (strlen(explode(' ', $name)[0]) == 1) {
                                        echo explode(' ', $name)[0] . ' ' . explode(' ', $name)[1];
                                    }
                                } else {
                                    echo $name;
                                }
                                
                            @endphp
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href=" {{ route('cashier-profile') }} ">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href=" {{ route('cashier-logout') }} ">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3" style="margin-left: 10vw;">
            @yield('container-kasir')
        </div>
    </div>
</div>