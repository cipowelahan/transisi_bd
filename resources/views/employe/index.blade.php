@extends('layout-admin')

@section('content')
<a href="{{route('employees.create')}}">
    <button class="btn btn-success">Tambah Data</button>
</a>

<form class="form-inline float-right" method="GET" action="{{route('employees.index')}}">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>

<hr>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Company</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($employees as $employe)
        <tr>
            <td>{{$employe->id}}</td>
            <td>{{$employe->nama}}</td>
            <td>{{$employe->email}}</td>
            <td>{{$employe->company->nama}}</td>
            <td>
                <form method="post" action="{{route('employees.destroy', $employe->id)}}">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('employees.show', $employe->id)}}"><button class="btn btn-primary" type="button">Lihat</button></a>
                    <a href="{{route('employees.edit', $employe->id)}}"><button class="btn btn-warning" type="button">Ubah</button></a>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Data Kosong</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="float-right">
    {{ $employees->appends(['search' => request()->get('search')])->links() }}
</div>
@endsection