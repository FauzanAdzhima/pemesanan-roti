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
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="card border-0 shadow rounded">
                                        <div class="card-body">

                                            <form action="{{ route('admin-pass-update', $admin->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="row align-items-center mb-3">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="new_pass">Password Baru</label>
                                                            <input type="password"
                                                                class="form-control @error('new_pass') is-invalid @enderror"
                                                                name="new_pass">

                                                            @error('new_pass')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="new_pass_confirmation">Ulangi Password Baru</label>
                                                            <input type="password" class="form-control"
                                                                name="new_pass_confirmation">
                                                            @error('new_pass_confirmation')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="d-flex inline justify-content-between">
                                                        <label for="password">Password Lama</label>
                                                    </div>
                                                    <input type="password" class="form-control" name="password">

                                                </div>

                                                <div class="d-flex justify-content-center align-items-center mt-3">
                                                    <button type="submit"
                                                        class="btn btn-md btn-primary col-md-3">Save</button>
                                                    <div class="col-1"></div>
                                                    <a href="{{ route('admin.index') }}" type="button"
                                                        class="btn btn-secondary col-md-3">Back</a>
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