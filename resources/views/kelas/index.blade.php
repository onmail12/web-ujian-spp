@extends('layout')
@section('main')

@if (session('alert'))
<div class="alert my-2 {{session('alert')[0]}} alert-dismissible fade show w-50" role="alert">
    <strong>{{session('alert')[1]}}</strong> {{session('alert')[2]}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (($kelases->count() == 0))
<h2 class="display-5 text-center my-3">Data kelas Tidak Ditemukan!</h2>
<a class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">
    <i class="bi bi-person-plus px-2"></i>Tambah kelas</a>
@else
<div class="d-sm-flex align-items-center justify-content-between ">
    <h1 class="h3">List Data kelas</h1>
</div>

<a class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">
    <i class="bi bi-person-plus px-2"></i>Tambah kelas</a>

<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Tambah Data kelas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="px-2" action="{{route('kelas.store')}}" method="POST">
                    @csrf
                    <div class="col form-group my-3">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type="text" class="form-control" name="nama_kelas" placeholder="Enter Nama Kelas" required>
                    </div>
                    <div class="col form-group my-3">
                        <label for="kompetensi_keahlian">Kompetensi Keahlain</label>
                        <input type="text" class="form-control" name="kompetensi_keahlian" placeholder="Enter Kompetensi Keahlian" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"><i class="bi bi-person-plus px-2"></i>Tambah
                    Kelas</button>
            </div>
        </div>
        </form>
    </div>
</div>

<table id="dataTable" class="table table-hover table-bordered text-nowrap mb-5">
    <thead class="table-light text-center">
        <th>No</th>
        <th>Nama Kelas</th>
        <th>Kompetensi Keahlian</th>
        <th style="width:100px; text-align:center;" colspan=2>Aksi</th>
    </thead>

    @foreach ($kelases as $kelas)
    <tbody>
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td class="text-center">{{ $kelas->nama_kelas }}</td>
            <td class="text-center">{{ $kelas->kompetensi_keahlian }}</td>
            <td class="text-center">
                <form action="{{ route('kelas.edit', $kelas) }}" method="get">
                    <button type="submit" class="btn btn-primary bi bi-pencil-square">
                </form>
            </td>

            <td class="text-center">
                <form action="{{ route('kelas.destroy', $kelas) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>

        </tr>
    </tbody>

    @endforeach
</table>
@endif
@endsection