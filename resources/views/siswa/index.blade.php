@extends('layout')
@section('main')

@if (session('alert'))
<div class="alert my-2 {{session('alert')[0]}} alert-dismissible fade show w-50" role="alert">
    <strong>{{session('alert')[1]}}</strong> {{session('alert')[2]}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (($siswas->count() == 0))
<h2 class="display-5 text-center my-3">Data Siswa Tidak Ditemukan!</h2>
<a class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">
    <i class="bi bi-person-plus px-2"></i>Tambah Siswa</a>
@else
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 my-3">List Data Siswa</h1>
</div>

<a class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">
    <i class="bi bi-person-plus px-2"></i>Tambah Siswa</a>

<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Tambah Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="px-2" action="{{route('siswa.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col form-group my-2">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" name="nisn" placeholder="Enter NISN" required>
                        </div>
                        <div class="col form-group my-2">
                            <label for="nis">NIS</label>
                            <input type="text" class="form-control" name="nis" placeholder="Enter NIS" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group my-2">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Enter Nama" required>
                        </div>

                        <div class="col form-group my-2">
                            <label for="id_kelas">Kelas</label>
                            <select class="form-select" name="id_kelas">
                                <option value="1">Pilih Kelas</option>
                                @foreach ($kelases as $kelas)
                                <option value="{{$kelas->id_kelas}}">{{$kelas->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group my-2">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" rows="2" name="alamat" placeholder="Enter Alamat"
                            required></textarea>
                    </div>

                    <div class="row">
                        <div class="col form-group my-2">
                            <label for="no_telp">No.Telp</label>
                            <input type="text" class="form-control" name="no_telp" placeholder="Enter No. Telpon"
                                required>
                        </div>


                        <div class="col form-group my-2">
                            <label for="id_spp">Spp Tahun</label>
                            <select class="form-select" name="id_spp">
                                <option value="1">Pilih Spp</option>
                                @foreach ($spps as $spp)
                                <option value="{{$spp->id_spp}}">{{$spp->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"><i class="bi bi-person-plus px-2"></i>Tambah
                    Siswa</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- <table id="dataTable" class="table table-hover table-bordered text-nowrap mb-5">
    <thead class="table-light text-center">
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th style="width:100px; text-align:center;" colspan=2>Aksi</th>
        </tr>
    </thead>
    @foreach ($siswas as $siswa)
    <tbody>
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td class="text-center">{{ $siswa->nisn }}</td>
            <td class="text-center">{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama }}</td>
            <td class="text-center">{{ $siswa->kelas->nama_kelas }}</td>

            <td class="text-center">
                <form action="{{ route('siswa.edit', $siswa) }}" method="get">
                    <button type="submit" class="btn btn-primary bi bi-pencil-square">
                </form>
            </td>

            <td class="text-center">
                <form action="{{ route('siswa.destroy', $siswa) }}" method="post">
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
</table> --}}
<table id="table_id" class="display">
    <thead>
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswas as $siswa)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $siswa->nisn }}</td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->kelas->nama_kelas }}</td>
            <td class="text-center">
                <form action="{{ route('siswa.edit', $siswa) }}" method="get">
                    <button type="submit" class="btn btn-primary bi bi-pencil-square">
                </form>
            </td>
            <td class="text-center">
                <form action="{{ route('siswa.destroy', $siswa) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection