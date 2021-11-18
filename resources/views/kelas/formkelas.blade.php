@extends('main')

@section('title','Form Kelas')

@section('content')
<form action="{{ isset($kelas)
                    ?route('kelas.update',[$kelas->id])
                    :route('kelas.simpan') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama"
            value="{{ old ("nama", isset($kelas)?$kelas->nama:'') }}">
            @error("nama")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
    </div>
    <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <select name="jurusan" class="form-control">
            <option value="ti" {{ isset($kelas) && $kelas->jurusan=="ti"?"selected":'' }}>
                Teknik Informatika</option>
            <option value="si" {{ isset($kelas) && $kelas->jurusan=="si"?"selected":'' }}>
                Sistem Informasi</option>
        </select>
    </div>
    <div class="form-group">
        <label for="semester">Semester</label>
        <select name="semester" class="form-control">
        @for ($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}" {{ isset($kelas) && $kelas->semester==$i?"selected":'' }}>
                {{ $i }}</option>
        @endfor
        </select>
    </div>
    <div class="form-group">
        <label for="ruang">Ruang</label>
        <input type="text" class="form-control @error("ruang") is-invalid @enderror" name="ruang"
            value="{{ old ("ruang", isset($kelas)?$kelas->ruang:'') }}">
            @error("ruang")
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="sesi">Sesi</label>
        <select name="sesi" class="form-control">
            <option value="p" {{ isset($kelas) && $kelas->sesi=="p"?"selected":'' }}>
                Pagi</option>
            <option value="s" {{ isset($kelas) && $kelas->sesi=="s"?"selected":'' }}>
                Sore</option>
        </select>
    </div>
    <input type="submit" value="Simpan" class="btn btn-success">
</form>
@endsection