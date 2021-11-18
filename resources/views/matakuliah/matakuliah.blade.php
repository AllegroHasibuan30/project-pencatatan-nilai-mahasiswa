@extends('main')

@section('title','List Matakuliah')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Mata Kuliah</h4>
    </div>
    <div class="card-body">
        <a href="{{ route("formmata.matakuliah") }} " class="btn btn-success float-right mb-2">Tambah</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    
                    <th width="15%">Nama</th>
                    <th width="15%">Jurusan</th>
                    <th width="15%">Semester</th>
                    <th width="25%" colspan=2>Action</th>
                </tr>
            </thead>
            <tbody>
               
                    @foreach ($matakuliah as $item)
                <tr>
                        
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->namajurusan }}</td>
                        <td>{{ $item->namasemester }}</td>
                    
                    <td><a href="{{ route("rubahmatkul",[$item->id]) }}" class="btn btn-warning btn-block">Rubah</a></td>
                    <td><a href="{{ route("hapusmatkul",[$item->id]) }}" class="btn btn-danger btn-block">Hapus</a></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
               
            </tfoot>
        </table>
    </div>
</div>
@endsection
