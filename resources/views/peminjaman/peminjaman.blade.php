@extends('layouts.master')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <font color="black"><h4><div class="card-header">Data Peminjaman</font></div></h4>
                        <div class="card-body">
                        <div class="mb-4">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="mb-4 d-flex justify-content-between">
                            <a href="{{ route('peminjaman.tambah') }}" class="btn btn-primary">
                                + Tambah Data Peminjaman
                            <a href="{{route ('print') }}" class="btn btn-primary">
                            <i class="fa fa-download"></i> Exspor PDF</a>
                          </div>


                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <tr bgcolor='gray' align=center>
                                    <th class="px-4 py-2"><font color="black">Nama Peminjam</font></th>
                                    <th class="px-4 py-2"><font color="black">Buku yang Dipinjam</font></th>
                                    <th class="px-4 py-2"><font color="black">Tanggal Peminjaman</font></th>
                                    <th class="px-4 py-2"><font color="black">Tanggal Pengembalian</font></th>
                                    <th class="px-4 py-2"><font color="black">Status</font></th>
                                    <th class="px-4 py-2"><font color="black">Aksi</font></th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($peminjaman as $p)
                                    <tr>
                                        <td class="px-4 py-2"><font color="black">{{ $p->user->name }}</font></td>
                                        <td class="px-4 py-2"><font color="black">{{ $p->buku->judul }}</font></td>
                                        <td class="px-4 py-2"><font color="black">{{ $p->tanggal_peminjaman }}</font></td>
                                        <td class="px-4 py-2"><font color="black">{{ $p->tanggal_pengembalian }}</font></td>
                                        <td class="px-4 py-2"><font color="black">{{ $p->status }}</font></td>
                                        <td class="px-4 py-2">
                                            @if($p->status === 'Dipinjam')
                                                <form action="{{ route('peminjaman.kembalikan', $p->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Kembalikan</button>
                                                </form>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-2 text-center">Tidak ada data buku.</td>
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