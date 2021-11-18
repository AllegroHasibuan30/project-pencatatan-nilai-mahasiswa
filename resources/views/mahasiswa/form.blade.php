@extends('main')

@section('title',"Form Mahasiswa")
@section('content')
{{--@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif--}}
    <form action="{{ isset($data)
                    ?route('update.mahasiswa',[$data->nim])
                    :route('simpan.mahasiswa') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" class="form-control @error("nim") is-invalid @enderror" name="nim"
            value="{{ old("nim", isset($data)?$data->nim:'')  }}">
            @error("nim")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama"
            value="{{ old ("nama", isset($data)?$data->nama:'' )}}">
            @error("nama")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control @error("alamat") is-invalid @enderror" name="alamat"
            value="{{ old ("alamat", isset($data)?$data->alamat:'') }}">
            @error("alamat")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
    </div>
    <div class="form-group">
        <label for="telepon">Telepon</label>
        <input type="text" class="form-control @error("telepon") is-invalid @enderror" name="telepon"
            value="{{ old ("telepon", isset($data)?$data->telepon:'') }}">
            @error("telepon")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
    </div>
    <input type="submit" value="simpan" class="btn btn-success">
</form>
    
@endsection
