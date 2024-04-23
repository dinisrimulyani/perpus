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
        <th><font color="black">Nama Peminjam</font></th>
        <th><font color="black">Buku yang Dipinjam</font></th>
        <th><font color="black">Tanggal Peminjaman</font></th>
        <th><font color="black">Tanggal Seharusnya Kembali</font></th>
        <th><font color="black">Tanggal Pengembalian</font></th>
        <th><font color="black">Status</font></th>
        <th><font color="black">Aksi</font></th>
    </tr>
</thead>
<tbody>
    @forelse($peminjaman as $p)
        <tr>
        <td class="px-4 py-2">{{ $p->user->name }}</td>
            <td class="px-4 py-2">{{ $p->buku->judul }}</td>
            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($p->tanggal_peminjaman)->format('d-M-Y') }}</td>
            <td class="px-4 py-2">{{ $p->tanggal_pengembalian ? \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('d-M-Y') : 'Belum Dikembalikan' }}</td>
            <td class="px-4 py-2">{{ $p->sekarang ? \Carbon\Carbon::parse($p->sekarang)->format('d-M-Y') : '' }}</td>
            <td class="px-4 py-2">

                @if($p->status === 'Dipinjam')
                    <span class="badge bg-warning">{{ $p->status }}</span>
                @elseif($p->status === 'Dikembalikan')
                    <span class="badge bg-primary">{{ $p->status }}</span>
                @elseif($p->status === 'Denda')
                    <span class="badge bg-danger">Terlambat</span>
                @endif
            </td>
            <td class="px-4 py-2">
                @if($p->status === 'Dipinjam')
                    <form id="form_{{ $p->id }}" action="{{ route('peminjaman.kembalikan', $p->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Kembalikan
                        </button>
                    </form>
                @elseif ($p->status === 'Denda')
                    <a href="{{route('peminjaman.denda', $p->id)}}" class="btn btn-danger">
                        Bayar Denda
                    </a>
                @else ($p->status === 'Dikembalikan')
                    -
                @endif
         </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="px-4 py-2 text-center">Tidak ada data buku.</td>
        </tr>
    @endforelse
</tbody>
</table>
    </div>
@endsection