@extends('layouts.app')

@section('container')
    <div class="card col-md-12 text-light"
        style="background-blend-mode:color; background-image:url('img/main-bg.jpg'); background-color:rgba(0, 0, 0, 0.6); background-repeat:no-repeat; background-size:cover; background-position:center; height:90vh; border-radius:0;">
        <table style="height:100%">
            <tbody>
                <tr>
                    <td class="align-middle">
                        <div class="container text-center">
                            <h2 style="font-size: 6em">
                                <p>De Island</p>
                                <p>Bakery & Cake</p>
                            </h2>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="progress" style="border-radius: 0; height:2vh;">
        <div class="progress-bar bg-dark" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
            aria-valuemax="100"></div>
    </div>

    <ul class="nav nav-tabs nav-fill fw-bold border-bottom border-top mb-3">
        <li class="nav-item">
            <a class="nav-link link-dark" href="/roti">Roti</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="/cake">Cake</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="/makanan">Makanan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="/minuman">Minuman</a>
        </li>
    </ul>

    <div class="d-flex justify-content-center mb-2">
        <div class="col-md-1" style="width: 40vw;">
            <input type="text" class="form-control rounded-pill" placeholder="Cari Menu . . .">
        </div>
    </div>

    <p class="text-center fw-bold ">
        Menu Pilihan
    </p>

    <div class="card rounded mb-3 border-0 border-bottom">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center justify-items-center">
                    @forelse ($menu as $menus)
                        @if ($menus->status == 'Tersedia')
                            @if ($menus->terjual >= 50)
                                <div class="card mx-4 mb-3 text-center border-dark" style="width: 19rem;">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <img src="{{ asset($default_img = '/storage/menu-images/default-food.jpg') }}"
                                                alt="{{ $menus->nama }}" class="img-thumbnail"
                                                style="width: 6em; height: 6em;">
                                        </h5>
                                        <h6 class="card-subtitle my-2 text-center">
                                            {{ $menus->nama }}
                                        </h6>
                                        <p class="card-text text-center">
                                            <span class="fw-bold">{{ $menus->category->nama }}</span><br />
                                            Harga : <span class="fw-bold">{{ $menus->harga }}</span>
                                        </p>
                                        <div class="container-fluid">
                                            <div class="row d-flex justify-items-center">
                                                <div class="col">
                                                    <a href="{{ $mode === 'tamu' ? '/login' : route('add-cart', $menus->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            width="24" height="24">
                                                            <path
                                                                d="M12.75 7.75a.75.75 0 00-1.5 0v3.5h-3.5a.75.75 0 000 1.5h3.5v3.5a.75.75 0 001.5 0v-3.5h3.5a.75.75 0 000-1.5h-3.5v-3.5z">
                                                            </path>
                                                            <path fill-rule="evenodd"
                                                                d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <p class="text-left ms-3 fw-bold ">
        Roti
    </p>

    <div class="card rounded mb-3 border-0 border-bottom">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center justify-items-center">
                    @forelse ($menu as $menus)
                        @if ($menus->status == 'Tersedia')
                            @if ($menus->category_id == '1')
                                <div class="card mx-4 mb-3 text-center border-dark" style="width: 19rem;">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <img src="{{ asset($default_img = '/storage/menu-images/default-food.jpg') }}"
                                                alt="{{ $menus->nama }}" class="img-thumbnail"
                                                style="width: 6em; height: 6em;">
                                        </h5>
                                        <h6 class="card-subtitle my-2 text-center">
                                            {{ $menus->nama }}
                                        </h6>
                                        <p class="card-text text-center">
                                            <span class="fw-bold">{{ $menus->category->nama }}</span><br />
                                            Harga : <span class="fw-bold">{{ $menus->harga }}</span>
                                        </p>
                                        <div class="container-fluid">
                                            <div class="row d-flex justify-items-center">
                                                <div class="col">
                                                    <a href="{{ $mode === 'tamu' ? '/login' : route('add-cart', $menus->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            width="24" height="24">
                                                            <path
                                                                d="M12.75 7.75a.75.75 0 00-1.5 0v3.5h-3.5a.75.75 0 000 1.5h3.5v3.5a.75.75 0 001.5 0v-3.5h3.5a.75.75 0 000-1.5h-3.5v-3.5z">
                                                            </path>
                                                            <path fill-rule="evenodd"
                                                                d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <p class="text-left ms-3 fw-bold ">
        Cake
    </p>

    <div class="card rounded mb-3 border-0 border-bottom">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center justify-items-center">
                    @forelse ($menu as $menus)
                        @if ($menus->status == 'Tersedia')
                            @if ($menus->category_id == '2')
                                <div class="card mx-4 mb-3 text-center border-dark" style="width: 19rem;">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <img src="{{ asset($default_img = '/storage/menu-images/default-food.jpg') }}"
                                                alt="{{ $menus->nama }}" class="img-thumbnail"
                                                style="width: 6em; height: 6em;">
                                        </h5>
                                        <h6 class="card-subtitle my-2 text-center">
                                            {{ $menus->nama }}
                                        </h6>
                                        <p class="card-text text-center">
                                            <span class="fw-bold">{{ $menus->category->nama }}</span><br />
                                            Harga : <span class="fw-bold">{{ $menus->harga }}</span>
                                        </p>
                                        <div class="container-fluid">
                                            <div class="row d-flex justify-items-center">
                                                <div class="col">
                                                    <a href="{{ $mode === 'tamu' ? '/login' : route('add-cart', $menus->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            width="24" height="24">
                                                            <path
                                                                d="M12.75 7.75a.75.75 0 00-1.5 0v3.5h-3.5a.75.75 0 000 1.5h3.5v3.5a.75.75 0 001.5 0v-3.5h3.5a.75.75 0 000-1.5h-3.5v-3.5z">
                                                            </path>
                                                            <path fill-rule="evenodd"
                                                                d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <p class="text-left ms-3 fw-bold ">
        Makanan
    </p>

    <div class="card rounded mb-3 border-0 border-bottom">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center justify-items-center">
                    @forelse ($menu as $menus)
                        @if ($menus->status == 'Tersedia')
                            @if ($menus->category_id == '3')
                                <div class="card mx-4 mb-3 text-center border-dark" style="width: 19rem;">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <img src="{{ asset($default_img = '/storage/menu-images/default-food.jpg') }}"
                                                alt="{{ $menus->nama }}" class="img-thumbnail"
                                                style="width: 6em; height: 6em;">
                                        </h5>
                                        <h6 class="card-subtitle my-2 text-center">
                                            {{ $menus->nama }}
                                        </h6>
                                        <p class="card-text text-center">
                                            <span class="fw-bold">{{ $menus->category->nama }}</span><br />
                                            Harga : <span class="fw-bold">{{ $menus->harga }}</span>
                                        </p>
                                        <div class="container-fluid">
                                            <div class="row d-flex justify-items-center">
                                                <div class="col">
                                                    <a href="{{ $mode === 'tamu' ? '/login' : route('add-cart', $menus->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            width="24" height="24">
                                                            <path
                                                                d="M12.75 7.75a.75.75 0 00-1.5 0v3.5h-3.5a.75.75 0 000 1.5h3.5v3.5a.75.75 0 001.5 0v-3.5h3.5a.75.75 0 000-1.5h-3.5v-3.5z">
                                                            </path>
                                                            <path fill-rule="evenodd"
                                                                d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <p class="text-left ms-3 fw-bold ">
        Minuman
    </p>

    <div class="card rounded mb-3 border-0 border-bottom">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center justify-items-center">
                    @forelse ($menu as $menus)
                        @if ($menus->status == 'Tersedia')
                            @if ($menus->category_id == '4')
                                <div class="card mx-4 mb-3 text-center border-dark" style="width: 19rem;">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <img src="{{ asset($default_img = '/storage/menu-images/default-food.jpg') }}"
                                                alt="{{ $menus->nama }}" class="img-thumbnail"
                                                style="width: 6em; height: 6em;">
                                        </h5>
                                        <h6 class="card-subtitle my-2 text-center">
                                            {{ $menus->nama }}
                                        </h6>
                                        <p class="card-text text-center">
                                            <span class="fw-bold">{{ $menus->category->nama }}</span><br />
                                            Harga : <span class="fw-bold">{{ $menus->harga }}</span>
                                        </p>
                                        <div class="container-fluid">
                                            <div class="row d-flex justify-items-center">
                                                <div class="col">
                                                    <a href="{{ $mode === 'tamu' ? '/login' : route('add-cart', $menus->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            width="24" height="24">
                                                            <path
                                                                d="M12.75 7.75a.75.75 0 00-1.5 0v3.5h-3.5a.75.75 0 000 1.5h3.5v3.5a.75.75 0 001.5 0v-3.5h3.5a.75.75 0 000-1.5h-3.5v-3.5z">
                                                            </path>
                                                            <path fill-rule="evenodd"
                                                                d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection