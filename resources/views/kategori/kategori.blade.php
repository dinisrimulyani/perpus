@extends('layouts.master')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                        <font color="black"><h4><div class="card-header">Data Kategori</font></div></h4>

                    <div class="card-body">
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
                                    <i class="fa fa-trash"></i>
                                    </button>
                                    <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-primary">
                                    <i class="fa fa-edit">Edit</i>
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
                        <div class="mb-4">
                            <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                                + Tambah Data Kategori
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection