@extends('main')

@section('title','List Mahasiswa')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>List Mahasiswa</h4>
    </div>
    <div class="card-body">
        <a href="{{ route("form.mahasiswa") }} " class="btn btn-success float-right mb-2">Tambah</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="15%">NIM</th>
                    <th width="15%">Nama</th>
                    <th width="15%">Alamat</th>
                    <th width="15%">Telepon</th>
                    <th width="25%" colspan=2>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->telepon }}</td>
                    
                    <td><a href="{{ route("rubah.mahasiswa",[$item->nim]) }}" class="btn btn-warning btn-block">Rubah</a></td>
                    <td><a href="{{ route("hapus.mahasiswa",[$item->nim]) }}" class="btn btn-danger btn-block">Hapus</a></td>
                </tr>
               @endforeach
            </tbody>
            <tfoot>
               
            </tfoot>
        </table>
    </div>
</div>
@endsection
