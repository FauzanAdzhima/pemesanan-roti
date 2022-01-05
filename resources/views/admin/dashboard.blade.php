@extends('layouts.app')

@section('container')
    <div class="card col-md-12" style="height:90vh; border-radius:0;">
        <table class="table table-borderless" style="height:100%">
            <tbody>
                <tr>
                    <td class="align-middle">
                        <div class="container text-center">
                            <h2 style="font-size: 4em">
                                <p class="text-dark">Data Kasir</p>
                            </h2>
                        </div>

                        <div class="container text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah Kasir
                            </button>
                        </div>

                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-md-12">

                                    <!-- Notifikasi menggunakan flash session data -->
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

                                    <div class="card shadow rounded mb-3">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="row d-flex justify-content-center justify-items-center">
                                                    @forelse ($cashier as $kasir)
                                                        <div class="card mx-4 mb-3 text-center border-dark"
                                                            style="width: 19rem;">
                                                            <div class="card-body">
                                                                <h5 class="card-title text-center">
                                                                    @if ($kasir->image)
                                                                        <img src="{{ asset('storage/' . $kasir->image) }}"
                                                                            alt="{{ $kasir->nama }}"
                                                                            class="img-thumbnail"
                                                                            style="width: 6em; height: 8em;">
                                                                    @else
                                                                        <img src="{{ asset($default_img = '/storage/cashier-images/default-avatar.png') }}"
                                                                            alt="{{ $kasir->nama }}"
                                                                            class="img-thumbnail"
                                                                            style="width: 6em; height: 8em;">
                                                                    @endif
                                                                </h5>
                                                                <h6 class="card-subtitle my-2 text-muted text-center">
                                                                    {{ $kasir->nama }}
                                                                </h6>
                                                                <p class="card-text text-center">NIK<br>
                                                                    <span class="fw-bold">{{ $kasir->nik }}</span>
                                                                </p>
                                                                <div class="container-fluid">
                                                                    <div class="row d-flex-justify-items-center">
                                                                        <div class="col">
                                                                            <p class="text-center">Date created<br>
                                                                                <span
                                                                                    class="fw-bold">{{ $kasir->created_at->format('d-m-Y') }}</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p class="text-center">Last updated<br>
                                                                                <span
                                                                                    class="fw-bold">{{ $kasir->updated_at->format('d-m-Y') }}</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                    action="{{ route('admin.destroy', $kasir->id) }}"
                                                                    method="POST">
                                                                    <div class="container-fluid">
                                                                        <div class="row d-flex justify-items-center">
                                                                            <div class="col">
                                                                                <a href="{{ route('admin.edit', $kasir->id) }}"
                                                                                    class="btn btn-sm btn-primary">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        viewBox="0 0 24 24" width="24"
                                                                                        height="24">
                                                                                        <path fill-rule="evenodd"
                                                                                            d="M17.263 2.177a1.75 1.75 0 012.474 0l2.586 2.586a1.75 1.75 0 010 2.474L19.53 10.03l-.012.013L8.69 20.378a1.75 1.75 0 01-.699.409l-5.523 1.68a.75.75 0 01-.935-.935l1.673-5.5a1.75 1.75 0 01.466-.756L14.476 4.963l2.787-2.786zm-2.275 4.371l-10.28 9.813a.25.25 0 00-.067.108l-1.264 4.154 4.177-1.271a.25.25 0 00.1-.059l10.273-9.806-2.94-2.939zM19 8.44l2.263-2.262a.25.25 0 000-.354l-2.586-2.586a.25.25 0 00-.354 0L16.061 5.5 19 8.44z">
                                                                                        </path>
                                                                                    </svg>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-sm btn-danger">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        viewBox="0 0 24 24" width="24"
                                                                                        height="24">
                                                                                        <path fill-rule="evenodd"
                                                                                            d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z">
                                                                                        </path>
                                                                                        <path
                                                                                            d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z">
                                                                                        </path>
                                                                                        <path
                                                                                            d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z">
                                                                                        </path>
                                                                                    </svg>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kasir</h5>
                    </div>
                    <div class="modal-body">

                        <div class="card border-0 shadow rounded">
                            <div class="card-body">

                                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row align-items-center mb-3">
                                        <div class="col">
                                            <div class="form-group form-floating">
                                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                    name="nama" value="{{ old('nama') }}" placeholder="nama" required>
                                                <label for="nama">Nama</label>

                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group form-floating">
                                                <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                                    name="nik" value="{{ old('nik') }}" placeholder="nik" required>
                                                <label for="nik">NIK</label>

                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-floating mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="email" required>
                                        <label for="email">Email</label>

                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row align-items-center justify-content-center mb-3">
                                        <div class="col-1 text-left" style="width: 4vw;">
                                            <label for="image">Foto</label>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <input class="form-control" type="file" @error('image') is-invalid
                                                    @enderror name="image" id="image">

                                                @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center align-items-center mt-3">
                                        <button type="submit" class="btn btn-md btn-primary col-md-3">Save</button>
                                        <div class="col-1"></div>
                                        <button type="button" class="btn btn-secondary col-md-3"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>

                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
    </div>
@endsection