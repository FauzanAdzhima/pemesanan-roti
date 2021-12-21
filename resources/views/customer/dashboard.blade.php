@extends('layouts.app')

@section('container')
    <div class="card col-md-12 text-light" style="background-blend-mode:color; background-image:url('img/main-bg.jpg'); background-color:rgba(0, 0, 0, 0.6); background-repeat:no-repeat; background-size:cover; background-position:center; height:90vh; border-radius:0;">
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
        <div class="progress-bar bg-dark" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
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

@endsection