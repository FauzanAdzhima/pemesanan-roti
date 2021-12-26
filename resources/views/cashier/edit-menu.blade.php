@extends('layouts.app')

@section('container-kasir')
<div class="container text-center">
    <h2 style="font-size: 4em">
        <p class="text-dark">Detail Menu</p>
    </h2>
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
                            <div class="card mb-3 text-center border-dark" style="width: 30rem;">
                                <div class="card-body">
                                    <form action="{{ route('update-menu', $menu->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row align-items-center mb-3">
                                            <div class="col">                                                
                                                <p>
                                                    <span class="fw-bold">Waktu Ditambahkan</span><br>
                                                    {{ $menu->created_at }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <span class="fw-bold">Terakhir Diperbarui</span>
                                                <p>{{ $menu->updated_at }}</p>
                                            </div>
                                        </div>
                                        
                                        <div class="row align-items-center mb-3">
                                            <div class="col">
                                                <div class="form-group form-floating">
                                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $menu->nama }}" required>
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
                                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="kategori">
                                                            <option value="1" {{ ($menu->category_id) == '1' ? 'selected' : '' }}>Roti</option>
                                                            <option value="2" {{ ($menu->category_id) == '2' ? 'selected' : '' }}>Cake</option>
                                                            <option value="3" {{ ($menu->category_id) == '3' ? 'selected' : '' }}>Makanan</option>
                                                            <option value="4" {{ ($menu->category_id) == '4' ? 'selected' : '' }}>Minuman</option>
                                                        </select>
                                                        <label for="floatingSelect">Kategori</label>
                                                    </div>                                                
                                            </div>
                                        </div>

                                        <div class="form-group form-floating mb-3">
                                            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ $menu->harga }}" required>
                                            <label for="harga">Harga</label>
                                            
                                            @error('harga')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group form-floating mb-2">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="deskripsi">{{ $menu->deskripsi }}</textarea>
                                            <label for="floatingTextarea2">Deskripsi</label>
                                        </div>                                                                                

                                        <div class="row align-items-center mb-3">
                                            <div class="col">
                                                <p class="d-flex justify-items-left mb-0">Status</p>
                                                <div class="form-group d-flex justify-items-left">
                                                    <div class="input-group">
                                                        <button class="btn {{ ($menu->status) === 'Tersedia' ? 'btn-outline-primary' : 'btn-secondary text-white' }} rounded-pill px-5" type="button" id="status-button" onclick="statusToggle()" style="min-width: 15vw;">{{ $menu->status }}</button>
                                                        <input type="hidden" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" id="status" name="status" value="{{ $menu->status }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <p class="d-flex justify-items-left mb-0">Terjual</p>
                                                <div class="form-group d-flex justify-items-left">
                                                    <div class="input-group">
                                                        <button class="btn btn-outline-danger rounded-start" type="button" id="terjual-button" onclick="counterResetToggle()">Reset</button>
                                                        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" id="terjual" name="terjual" value="{{ $menu->terjual }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
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
                                            @if ($menu->image)
                                                <img src="{{ asset('storage/' . $menu->image) }}" class="img-fluid img-preview" style="width: 50%; height: auto;">
                                            @else                                                
                                                <img class="img-fluid img-preview" style="width: 50%; height: auto;">
                                            @endif
                                        </div>

                                        <div class="d-flex justify-content-center align-items-center mt-3">    
                                            <button type="submit" class="btn btn-md btn-primary col-md-3">Save</button>
                                            <div class="col-1"></div>
                                            <a href="{{ route('cashier-menu') }}" type="button" class="btn btn-secondary col-md-3">Back</a> 
                                        </div>

                                        <script>
                                            function statusToggle() {
                                                var x = document.getElementById("status-button");
                                                if (x.innerHTML === 'Tidak Tersedia') {
                                                    x.innerHTML = 'Tersedia';
                                                    document.getElementById("status").value = 'Tersedia';
                                                    x.setAttribute('class', 'btn btn-outline-primary rounded-pill');
                                                } else {
                                                    x.innerHTML = "Tidak Tersedia";
                                                    document.getElementById("status").value = 'Tidak Tersedia';
                                                    x.setAttribute('class', 'btn btn-secondary rounded-pill text-white');
                                                }                                                
                                            }

                                            function counterResetToggle() {
                                                var x = document.getElementById("terjual-button");
                                                if (x.innerHTML === '0') {                                                    
                                                    document.getElementById("terjual").value = '{{ $menu->terjual }}'
                                                    x.setAttribute('class', 'btn btn-outline-danger rounded-start')
                                                } else {
                                                    document.getElementById("terjual").value = '0'
                                                    x.setAttribute('class', 'btn btn-danger rounded-start');
                                                }
                                            }

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

                                    </form>                                    
                                </div>
                            </div>                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection