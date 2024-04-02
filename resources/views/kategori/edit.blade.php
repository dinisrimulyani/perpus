@extends('layouts.master')

@section('content')
<div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card border-0 shadow-ig">
                <div class="card-body">
                <h3 class="card-title mb-4">Edit Kategori Buku</h3>

                     <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">nama kategori</label>
                                <input type="text" value="{{$kategori->nama_kategori}}" name="nama_kategori" class="form-control"
                                    id="judul" aria-describedby="emailHelp">
                            </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection