@extends('layouts.app')

@section('container')
<div class="card col-md-12" style="height:90vh; border-radius:0;">
    <table style="height:100%">
        <tbody>
            <tr>
                <td class="align-middle">
                    <div class="container text-center">
                        <h2 style="font-size: 4em">
                            <p class="text-dark">Admin Profile</p>                            
                        </h2>
                    </div>                

                    <div class="container mt-5">
                        <div class="row d-flex justify-items-center justify-content-center">
                            <div class="col-md-5">
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                
                                @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                <div class="card border-0 shadow rounded">
                                    <div class="card-body">

                                        <form action="{{ route('admin-update', $admin->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <div class="row align-items-center mb-3">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="nama">Nama</label>
                                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $admin->nama }}" required>
                                                                
                                                        @error('nama')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="nohp">Nomor HP</label>
                                                        <input type="text" class="form-control" name="nohp" value="{{ $admin->nohp }}">
                                                                
                                                        @error('nohp')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" value="{{ $admin->email }}">
                                                
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>                                                                                

                                            <div class="form-group">
                                                <div class="d-flex inline justify-content-between">
                                                    <label for="password">Password</label>
                                                    <a href="{{ route('admin-profile-pass') }}" class="text-decoration-none">Ubah Password</a>
                                                </div>
                                                <input type="password" class="form-control" name="password" aria-describedby="password_hint"> 
                                                <div id="password_hint" class="form-text">
                                                    <p class="text-disabled">
                                                        Kosongkan password jika tidak ingin mengubah data
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-center align-items-center mt-3">    
                                                <button type="submit" class="btn btn-md btn-primary col-md-3">Save</button>
                                                <div class="col-1"></div>
                                                <a href="{{ route('admin.index') }}" type="button" class="btn btn-secondary col-md-3">Back</a> 
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection