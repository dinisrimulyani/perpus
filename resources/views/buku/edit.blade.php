@extends('layouts.master')

@section('content')
<div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-13">
            <div class="card border-0 shadow-ig">
                <div class="card-body">
                <h3 class="card-title text-center">Edit Data Buku</h3> 
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                       <form action="{{ route('buku.update', $buku->id) }}" method="post" enctype="multipart/form-data">
                       @csrf
                           @method('PUT')
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto Buku:</label>
                                <input type="file" name="foto" accept="image/*" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul:</label>
                                <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}" required>
                                </div>

                                <div class="mb-3">
                                <label for="sinopsis" class="form-label">Sinopsis:</label>
                                <textarea name="sinopsis" class="form-control"  required>{{ $buku->sinopsis }}"</textarea>
                            </div>

                                <div class="mb-3">
                                <label for="penulis" class="form-label">Penulis:</label>
                                <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="penerbit" class="form-label">Penerbit:</label>
                                <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
                                <select name="tahun_terbit" class="form-select custom-select" required>
                            </div>
                                    @php
                                        $currentYear = date('Y');
                                        $startYear = 1900; 
                                    @endphp
                                    @for($year = $currentYear; $year >= $startYear; $year--)
                                        <option value="{{ $year }}" {{ $buku->tahun_terbit == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori:</label>
                                <select name="kategori_id" class="form-select custom-select" required>
                                    @foreach($kategori as $k)
                                        <option value="{{ $k->id }}" {{ $buku->kategori->contains('id', $k->id) ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                           
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
@endsection

