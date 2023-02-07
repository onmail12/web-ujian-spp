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

<table id="dataTable" class="table table-hover table-bordered text-nowrap mb-5">
    <thead class="table-light text-center">
        <th>No</th>
        <th>NISN</th>
        <th>NIS</th>
        <th>Nama</th>
        {{-- <th>Alamat</th> --}}
        <th>Kelas</th>
        <th style="width:100px; text-align:center;" colspan=2>Aksi</th>
    </thead>
    @php $i = 0; @endphp
    @foreach ($siswas as $siswa)
    @php $i++; @endphp
    <tbody>
        <tr>
            <td class="text-center">{{ $i }}</td>
            <td class="text-center">{{ $siswa->nisn }}</td>
            <td class="text-center">{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama }}</td>
            {{-- <td>{{ $siswa->alamat }}</td> --}}
            <td class="text-center">{{ $siswa->kelas->nama_kelas }}</td>

            {{-- <td class="text-center"><a class="btn btn-primary p-2"
                    href="{{ route('edit_siswa', $siswa->nisn) }}"><i class="bi bi-pencil-square"></i></a>
            <td class="text-center"><a class="btn btn-danger p-2" href="{{ route('delete_siswa', $siswa->nisn) }}"><i
                        class="bi bi-trash"></i></a></td> --}}

            <td class="text-center">
                <form action="{{ route('siswa.update', $siswa) }}" method="get">

                    <button type="submit" class="btn btn-primary bi bi-pencil-square" href="#">
                </form>
            </td>
            {{-- <td class="text-center">
                <form action="{{ route('siswa.delete') }}" method="post"></form>
                <input type="hidden" name="nisn" value={{ $siswa->nisn }}>
                <button class="btn btn-primary" href="#"><i class="bi bi-pencil-square"></i></button>
            </td> --}}
            <td class="text-center"><a class="btn btn-danger " href="#"><i class="bi bi-trash"></i></a></td>
        </tr>
    </tbody>

    @endforeach
</table>
@endif
@endsection