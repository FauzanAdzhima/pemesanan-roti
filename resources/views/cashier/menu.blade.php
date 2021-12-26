@extends('layouts.app')

@section('container-kasir')
<div class="container text-center">
    <h2 style="font-size: 4em">
        <p class="text-dark">Daftar Menu</p>
    </h2>
</div>

<div class="container text-center">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Menu
    </button>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">            

            <!-- Notifikasi menggunakan flash session data -->
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-left: 5vw;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-left: 5vw;">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card rounded mb-3 border-0">
                <div class="card-body">
                    <div class="container-fluid">                                                   
                        <div class="row d-flex justify-content-center justify-items-center">                                                       
                            @forelse ($menu as $menus)
                            <div class="card mx-4 mb-3 text-center border-dark" style="width: 19rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        @if ($menus->image)
                                            <img src="{{ asset('storage/' . $menus->image) }}" alt="{{ $menus->nama }}" class="img-thumbnail" style="width: 6em; height: 6em;">
                                        @else
                                            <img src="{{ asset($default_img='/storage/menu-images/default-food.jpg') }}" alt="{{ $menus->nama }}" class="img-thumbnail" style="width: 6em; height: 6em;">
                                        @endif
                                    </h5>
                                    <h6 class="card-subtitle my-2 text-muted text-center">
                                        {{ $menus->nama }}
                                    </h6>
                                    <p class="card-text text-center">
                                        <span class="fw-bold">{{ $menus->category->nama }}</span><br/>
                                        Harga : <span class="fw-bold">{{ $menus->harga }}</span>
                                    </p>
                                    <div class="row d-flex-justify-items-center">
                                        <div class="col">
                                            <p class="text-center">Terjual : 
                                                <span class="fw-bold">{{ $menus->terjual }}</span>
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="text-center">
                                                <span class="{{ $menus->status == 'Tersedia' ? 'fw-bold' : 'text-disabled' }}">{{ $menus->status }}</span>
                                            </p>
                                        </div>
                                    </div>                                   
                                    
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('menu-destroy', $menus->id) }}" method="POST">
                                        <div class="container-fluid">
                                            <div class="row d-flex justify-items-center">
                                                <div class="col">
                                                    <a href="{{ route('edit-menu', $menus->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M17.263 2.177a1.75 1.75 0 012.474 0l2.586 2.586a1.75 1.75 0 010 2.474L19.53 10.03l-.012.013L8.69 20.378a1.75 1.75 0 01-.699.409l-5.523 1.68a.75.75 0 01-.935-.935l1.673-5.5a1.75 1.75 0 01.466-.756L14.476 4.963l2.787-2.786zm-2.275 4.371l-10.28 9.813a.25.25 0 00-.067.108l-1.264 4.154 4.177-1.271a.25.25 0 00.1-.059l10.273-9.806-2.94-2.939zM19 8.44l2.263-2.262a.25.25 0 000-.354l-2.586-2.586a.25.25 0 00-.354 0L16.061 5.5 19 8.44z"></path></svg>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>                                
        </div>
        <div class="modal-body">                            

            <div class="card border-0 shadow rounded">
                <div class="card-body">

                    <form action="{{ route('save-menu') }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" placeholder="harga" required>
                                    <label for="harga">Harga</label>
                                            
                                    @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="kategori">
                                <option value="1">Roti</option>
                                <option value="2">Cake</option>
                                <option value="3">Makanan</option>
                                <option value="4">Minuman</option>
                            </select>
                            <label for="floatingSelect">Kategori (Opsional)</label>
                        </div>

                        <div class="form-group form-floating mb-3">
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Leave a comment here" id="deskripsi" style="height: 100px" name="deskripsi" alue="{{ old('deskripsi') }}"></textarea>
                            <label for="deskripsi">Deskripsi</label>

                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>                        
                        
                        <div class="input-group mb-2">
                            <input class="form-control" type="file" @error('image') is-invalid @enderror name="image" id="image"  onchange="previewImage()">
                            <label class="input-group-text" for="image">Pilih Foto</label>
                                    
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="row align-items-center justify-content-center mt-3">
                            <img class="img-fluid img-preview" style="width: 50%; height: auto;">                            
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

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection