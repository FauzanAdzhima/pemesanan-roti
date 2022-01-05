@extends('layouts.app')

@section('container')
    <div class="card col-md-12" style="height:90vh; border-radius:0;">
        <table style="height:100%">
            <tbody>
                <tr>
                    <td class="align-middle">
                        <div class="container text-center">
                            <h2 style="font-size: 4em">
                                <p class="text-dark">Data Kasir</p>
                            </h2>
                        </div>

                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card border-0 shadow rounded">
                                        <div class="card-body">

                                            <form action="{{ route('admin.update', $cashier->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text"
                                                                class="form-control @error('nama') is-invalid @enderror"
                                                                name="nama" value="{{ $cashier->nama }}" required>

                                                            @error('nama')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="nik">NIK</label>
                                                            <input type="text" class="form-control" name="nik"
                                                                value="{{ $cashier->nik }}">

                                                            @error('nik')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ $cashier->email }}">

                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="status">Status Pegawai Kasir</label>
                                                    <select name="status" class="form-control">
                                                        <option value="Aktif"
                                                            {{ $cashier->status == 'Aktif' ? 'selected' : '' }}>Aktif
                                                        </option>
                                                        <option value="Nonaktif"
                                                            {{ $cashier->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="d-flex justify-content-center align-items-center mt-3">
                                                    <button type="submit"
                                                        class="btn btn-md btn-primary col-md-3">Save</button>
                                                    <div class="col-1"></div>
                                                    <a href="{{ route('admin.index') }}" type="button"
                                                        class="btn btn-secondary col-md-3">Back</a>
                                                </div>

                                            </form>
                                        </div>
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