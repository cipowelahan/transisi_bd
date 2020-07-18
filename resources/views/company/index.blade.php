@extends('layout-admin')

@section('content')
<a href="{{route('companies.create')}}">
    <button class="btn btn-success">Tambah Data</button>
</a>

<form class="form-inline float-right" method="GET" action="{{route('companies.index')}}">
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
            <th>Website</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($companies as $company)
        <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->nama}}</td>
            <td>{{$company->email}}</td>
            <td>{{$company->website}}</td>
            <td>
                <form method="post" action="{{route('companies.destroy', $company->id)}}">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('companies.show', $company->id)}}"><button class="btn btn-primary" type="button">Lihat</button></a>
                    <a href="{{route('companies.edit', $company->id)}}"><button class="btn btn-warning" type="button">Ubah</button></a>
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
    {{ $companies->appends(['search' => request()->get('search')])->links() }}
</div>
@endsection