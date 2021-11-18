@extends('main')

@section('title','Form matakuliah')

@section('content')
<form action="{{ isset($matakuliah)
                    ?route('matakuliah.update',[$matakuliah->id])
                    :route('matakuliah.simpan') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control @error("nama") is-invalid @enderror"  name="nama"
            value="{{ old ("nama", isset($matakuliah)?$matakuliah->nama:'') }}">
            @error("nama")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
    </div>
    <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <select name="jurusan" class="form-control">
            <option value="ti" {{ isset($matakuliah) && $matakuliah->jurusan=="ti"?"selected":'' }}>
                Teknik Informatika</option>
            <option value="si" {{ isset($matakuliah) && $matakuliah->jurusan=="si"?"selected":'' }}>
                Sistem Informasi</option>
        </select>
    </div>
    <div class="form-group">
        <label for="semester">Semester</label>
        <select name="semester" class="form-control">
        @for ($i = 1; $i <= 8; $i++)
            <option value="{{ $i }}" {{ isset($matakuliah) && $matakuliah->semester==$i?"selected":'' }}>
                {{ $i }}</option>
        @endfor
        </select>
    </div>
    <input type="submit" value="Simpan" class="btn btn-success">
</form>
@endsection