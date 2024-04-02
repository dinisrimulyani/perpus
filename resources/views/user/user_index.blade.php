@extends('layouts.master')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-ig-8">
                <div class="card border-0 shadow-ig">
                <div class="card-body">
                <div class="mb-4">
                            <a href="{{ route ('users.create') }}" class="btn btn-primary">
                                + Tambah Pengguna
                            </a>
                        </div>
                     <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                <tr bgcolor='gray' align=center>
                                    <th><font color="black">Id</th>
                                    <th><font color="black">Nama</th>
                                    <th><font color="black">Email</th>
                                    <th><font color="black">Role</th>
                                    <th><font color="black">Aksi</th>
                                </tr>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $u)
                                    <tr>
                                        
                                        <td>{{ $u->id}}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td> 
                                    <td>

                                    @foreach ($u->roles as $role)
                                    {{$role->name}}
                                    @endforeach
                                    </td>
                                    <td>
                                    <form action="{{ route('users.delete', $u->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button> 
                                            <a class="btn btn-primary" href="{{ route('users.edit', $u->id) }}">
                                                <i class="bi bi-pencil-square"></i> </a>
                                        </td>
                                    </tr>
                              </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection