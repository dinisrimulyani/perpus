@extends('layouts.master')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 shadow-ig">
               <div class="card-body">
                <h3 class="card-title text-center">Data Peminjaman</h3>  
                
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
                            <i class="bi bi-filetype-pdf"></i> Exspor PDF</a>
                          </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <tr bgcolor='gray' align=center>
                                    <th class="px-4 py-2"><font color="black">Nama Peminjam</font></th>
                                    <th class="px-4 py-2"><font color="black">Buku yang Dipinjam</font></th>
                                    <th class="px-4 py-2"><font color="black">Tanggal Peminjaman</font></th>
                                    <th class="px-4 py-2"><font color="black">Tanggal Pengembalian</font></th>
                                    <th class="px-4 py-2"><font color="black">Tanggal Sekarang</font></th>
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
                                        <td class="px-4 py-2"><font color="black">{{ $p->tanggal_pengembalian ?? 'Belum Dikembalikan'}}</font></td>
                                        <td class="px-4 py-2"><font color="black">{{ $p->sekarang }}</font></td>
                                        <td class="px-4 py-2">
                                            @if($p->status === 'Dipinjam')
                                            <span class="badge bg-warning">{{ $p->status}}</span>
                                            @elseif($p->status === 'Dikembalikan')
                                            <span class="badge bg-primary">{{ $p->status}}</span>
                                            @elseif($p->status === 'Denda')
                                            <span class="badge bg-danger">{{ $p->status}}</span>
                                            @endif
                                            </td>
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
    </div>
@endsection