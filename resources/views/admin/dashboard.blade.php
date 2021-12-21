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

                    <div class="container text-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Kasir
                        </button>
                    </div>                    

                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                
                                <!-- Notifikasi menggunakan flash session data -->
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
                                        {{-- <a href="{{ route('admin') }}" class="btn btn-md btn-success mb-3 float-right">New
                                            Post</a> --}}
                
                                        <table class="table table-bordered mt-1">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Foto</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">NIK</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Tanggal Terdaftar</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($cashier as $kasir)
                                                <tr>
                                                    <td class="text-center">
                                                        @if ($kasir->image)
                                                        {{-- @php
                                                            $image = explode('/', $kasir['image']);
                                                            $image_path = $image[1].'/'.$image[2];                   
                                                        @endphp --}}
                                                            <img src="{{ asset('storage/' . $kasir->image) }}" alt="{{ $kasir->nama }}" class="img-thumbnail" style="width: 7vw; height: 18vh;">
                                                        @else
                                                        <img src="{{ asset($default_img='/storage/cashier-images/default-avatar.png') }}" alt="{{ $kasir->nama }}" class="img-thumbnail" style="width: 7vw; height: 18vh;">
                                                        @endif
                                                    </td>
                                                    <td class="text-center align-middle">{{ $kasir->nama }}</td>
                                                    <td class="text-center align-middle">{{ $kasir->nik }}</td>
                                                    <td class="text-center align-middle">{{ $kasir->email }}</td>
                                                    <td class="text-center align-middle">{{ $kasir->status }}</td>                                               <td class="text-center align-middle">{{ $kasir->created_at->format('d-m-Y') }}</td>
                                                    <td class="text-center align-middle">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('admin.destroy', $kasir->id) }}" method="POST" class="d-flex justify-content-center justify-items-center">
                                                            <a href="{{ route('admin.edit', $kasir->id) }}"
                                                                class="btn btn-sm btn-primary mx">Detail</a>
                                                            <div class="mx-2"></div>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty                                                
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                        
                    
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
                                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="nama" required>
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
                                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" placeholder="nik" required>
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
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" required>
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
                                                        <input class="form-control" type="file" @error('image') is-invalid @enderror name="image" id="image">
                                                                
                                                        @error('image')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>                                        

                                            <div class="form-group form-floating mb-3">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="password" required>
                                                <label for="password">Password</label>
                                                
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="d-flex justify-content-center align-items-center mt-3">    
                                                <button type="submit" class="btn btn-md btn-primary col-md-3">Save</button>
                                                <div class="col-1"></div>
                                                <button type="button" class="btn btn-secondary col-md-3" data-bs-dismiss="modal">Close</button> 
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer"></div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection