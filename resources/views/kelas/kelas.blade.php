@extends('main')

@section('title','List kelas')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>List kelas</h4>
    </div>
    <div class="card-body">
        <a href="{{ route('formkelas.kelas') }}" class="btn btn-success float-right mb-2">Tambah</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Semester</th>
                    <th>Ruang</th>
                    <th>Sesi</th>
                    <th colspan=2>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jurusan }}</td>
                    <td>{{ $item->semester }}</td>
                    <td>{{ $item->ruang }}</td>
                    <td>{{ $item->sesi }}</td>
                    <td><a href="{{ route("rubahkelas",[$item->id]) }}" class="btn btn-warning btn-block">Rubah</a></td>
                    <td><a href="{{ route("hapuskelas",[$item->id]) }}" class="btn btn-danger btn-block">Hapus</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection