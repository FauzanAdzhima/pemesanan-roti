@extends('layouts.app')

@section('container')
<div class="container col-md-12 d-flex align-items-center justify-content-center my-5" style="height: 70vh;">
    <table style="height: 100px;">
        <tbody>
            <tr>                
                <td class="align-middle">
                    <!-- Notifikasi menggunakan flash session data -->
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card" style="width: 30em;">
                        <div class="card-header d-flex justify-content-center pt-3">
                            <p class="fw-bold fs-3">
                                Register Customer
                            </p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/register-customer">
                                @csrf

                                <div class="row align-items-center mb-2">
                                    <div class="col">
                                       <div class="form-floating">
                                            <input type="text" class="form-control @error('nama_input') is-invalid @enderror" id="nama_input" aria-describedby="namaAlert" name="nama" placeholder="nama" value="{{ old('nama') }}">
                                            <label for="nama_input" class="form-label" required>Nama</label>
                                            <div id="namaAlert" class="form-text">
                                                @error('nama')
                                                   <p class="text-danger"> {{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="email" class="form-control @error('email_input') is-invalid @enderror" id="email_input" aria-describedby="emailAlert" name="email" placeholder="email" value="{{ old('email') }}">
                                            <label for="email_input" class="form-label" required>Email</label>
                                            <div id="emailAlert" class="form-text">
                                                @error('email')
                                                   <p class="text-danger"> {{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('kontak_input') is-invalid @enderror" id="kontak_input" aria-describedby="kontakAlert" name="kontak" placeholder="kontak" value="{{ old('kontak') }}">
                                    <label for="kontak_input" class="form-label" required>Kontak</label>
                                    <div id="kontakAlert" class="form-text">
                                        @error('kontak')
                                            <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group form-floating mb-2">
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Leave a comment here" id="alamat" style="height: 100px" name="alamat" value="{{ old('alamat') }}"></textarea>
                                    <label for="alamat">Alamat (Opsional)</label>
        
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="password">Password Baru</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                                    
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="password_confirmation">Ulangi Password Baru</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                            @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>                                                                

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                                
                                <div class="d-flex justify-content-center mt-2">
                                    Sudah punya akun? &nbsp; <a href="/login" class="link-primary">login</a>
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