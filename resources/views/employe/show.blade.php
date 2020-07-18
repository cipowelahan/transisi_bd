@extends('layout-admin')

@section('content')
<form method="post" action="{{route('employees.destroy', $employe->id)}}">
    @csrf
    @method('DELETE')
    <a href="{{route('employees.edit', $employe->id)}}"><button class="btn btn-warning" type="button">Ubah Data</button></a>
    <button class="btn btn-danger" type="submit">Hapus Data</button>
</form>

<hr>

<h3>Data Employe</h3>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Nama</strong></label>
    <div class="col-sm-8">
        <input class="form-control-plaintext" type="text" value="{{$employe->nama}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Email</strong></label>
    <div class="col-sm-8">
        <input class="form-control-plaintext" type="text" value="{{$employe->email}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Company</strong></label>
    <div class="col-sm-8">
        <input class="form-control-plaintext" type="text" value="{{$employe->company->nama}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Dibuat Pada</strong></label>
    <div class="col-sm-8">
        <input class="form-control-plaintext" type="text" value="{{$employe->created_at}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"><strong>Diubah Pada</strong></label>
    <div class="col-sm-8">
        <input class="form-control-plaintext" type="text" value="{{$employe->updated_at}}" readonly>
    </div>
</div>
@endsection