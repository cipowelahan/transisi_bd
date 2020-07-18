@extends('layout-admin')

@section('content')
<h3>Tambah Data Employe</h3>
<form action="{{route('employees.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Nama</label>
        <input class="form-control" type="text" name="nama" autocomplete="off" value="{{old('nama')}}">
        @error('nama')
            <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" type="text" name="email" autocomplete="off" value="{{old('email')}}">
        @error('email')
            <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Company</label>
        <select class="form-control" name="company_id">
            @forelse($companies as $company)
            <option value="{{$company->id}}">{{$company->nama}}</option>
            @empty
            <option value="">Belum Ada Company</option>
            @endforelse
        </select>
    </div>
    <button class="btn btn-success" type="submit">Tambah</button>
</form>
@endsection