@extends('layouts.master')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-13">
            <div class="card border-0 shadow-ig">
                <div class="card-body">
                <h3 class="card-title text-center">List Buku</h3>  

                <div class="card-body">          
                <div class="mb-4">
                            <a href="{{ route ('buku.create') }}" class="btn btn-primary">
                                + Tambah Data Buku
                            </a>
                    </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <tr bgcolor='gray' align=center>
                                    <th><font color="black">Foto Buku</font></th>
                                    <th><font color="black">Judul</th>
                                    <th><font color="black">Sinopsis/Deskripsi</font></th>
                                    <th><font color="black">Penulis</font></th>
                                    <th><font color="black">Penerbit</font></th>
                                    <th><font color="black">Tahun Terbit</font></th>
                                    <th><font color="black">Aksi</font></th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($buku as $b)
                                    <tr>
                                    <td>
                                    <img src="{{ asset('storage/' .$b->foto) }}" alt="Foto Buku" width="100">
                                    </td>
                                        
                                        <td><font color="black">{{ $b->judul }}</font></td>
                                        <td><font color="black">{{ $b->sinopsis }}</font></td>
                                        <td><font color="black">{{ $b->penulis }}</font></td>
                                        <td><font color="black">{{ $b->penerbit }}</font></td>
                                        <td><font color="black">{{ $b->tahun_terbit }}</font></td>
                                    <td>
                                    <form action="{{route('buku.hapus', $b->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                    </button>
                                    </form>
                                    <a class="btn btn-primary" href="{{ route('buku.edit', $b->id) }}">
                                    <i class="bi bi-pencil-square">Edit</i>
                                    </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data buku.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection