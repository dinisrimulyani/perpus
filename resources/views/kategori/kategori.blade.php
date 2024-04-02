@extends('layouts.master')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <div class="card border-0 shadow-ig">
               <div class="card-body">
                <h3 class="card-title text-center">Data Kategori</h3>  

                <div class="card">          
                <div class="mb-4">
                            <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                                + Tambah Data Kategori
                            </a>
                    </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <tr bgcolor='gray' align=center>
                                    <th class="px-4 py-2"><font color="black">Nama Kategori</font></th>
                                    <th class="px-4 py-2"><font color="black">Aksi</font></th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kategori as $k)
                                    <tr>
                                        <td class="px-4 py-2"><font color="black">{{ $k->nama_kategori }}</font></td>
                                        <td>
                                        <form action="{{route('kategori.hapus', $k->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                    </button>
                                    <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-primary">
                                    <i class="bi bi-edit">Edit</i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-2 text-center">Tidak ada data kategori.</td>
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