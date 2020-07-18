@extends('layout-admin')

@section('content')
<a href="{{route('companies.edit', $company->id)}}">
    <button class="btn btn-warning">Edit Data</button>
</a>

<a href="{{route('companies.destroy', $company->id)}}">
    <button class="btn btn-danger">Hapus Data</button>
</a>

<hr>

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
@endsection