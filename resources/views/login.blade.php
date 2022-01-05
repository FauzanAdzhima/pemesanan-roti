@extends('layouts.app')

@section('container')
    <div class="container col-md-12 d-flex align-items-center justify-content-center my-5" style="height: 70vh;">
        <table style="height: 100px;">
            <tbody>
                <tr>
                    <td class="align-middle">
                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card" style="width: 30vw;">
                            <div class="card-header d-flex justify-content-center pt-3">
                                <p class="fw-bold fs-3">
                                    Login User
                                </p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/login-user">
                                    @csrf

                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control @error('email_input') is-invalid @enderror"
                                            id="email_input" aria-describedby="emailAlert" name="email" placeholder="email"
                                            value="{{ old('email') }}">
                                        <label for="email_input" class="form-label" required>Email</label>
                                        <div id="emailAlert" class="form-text">
                                            @error('email')
                                                <p class="text-danger"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password_input"
                                            aria-describedby="passAlert" name="password" placeholder="password" required>
                                        <label for="password_input" class="form-label">Password</label>
                                        <div id="passAlert" class="form-text"></div>
                                    </div>
                                    <div class="mb-3 form-check d-flex align-items-center justify-content-center">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                            name="remember">&nbsp;
                                        <label class="form-check-label" for="exampleCheck1">Biarkan saya tetap masuk</label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        Atau &nbsp; <a href="/register" class="link-primary">buat akun baru</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection