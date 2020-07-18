@extends('layout-admin')

@section('content')
<form method="post" action="{{route('companies.destroy', $company->id)}}">
    @csrf
    @method('DELETE')
    <a href="{{route('companies.edit', $company->id)}}"><button class="btn btn-warning" type="button">Ubah Data</button></a>
    <button class="btn btn-danger" type="submit">Hapus Data</button>
</form>

<hr>
<h3>Data Company</h3>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Logo</strong></label>
    <div class="col-sm-8">
        <img class="img-thumbnail" src="{{asset('storage/'.$company->logo)}}">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Nama</strong></label>
    <div class="col-sm-8">
        <input class="form-control-plaintext" type="text" value="{{$company->nama}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Email</strong></label>
    <div class="col-sm-8">
        <input class="form-control-plaintext" type="text" value="{{$company->email}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Website</strong></label>
    <div class="col-sm-8">
        <input class="form-control-plaintext" type="text" value="{{$company->website}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Dibuat Pada</strong></label>
    <div class="col-sm-8">
        <input class="form-control-plaintext" type="text" value="{{$company->created_at}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Diubah Pada</strong></label>
    <div class="col-sm-8">
        <input class="form-control-plaintext" type="text" value="{{$company->updated_at}}" readonly>
    </div>
</div>

<hr>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($company->employees as $employe)
        <tr>
            <td>{{$employe->id}}</td>
            <td>{{$employe->nama}}</td>
            <td>{{$employe->email}}</td>
            <td>
                <a href="{{route('employees.show', $employe->id)}}"><button class="btn btn-primary" type="button">Lihat</button></a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">Data Kosong</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection