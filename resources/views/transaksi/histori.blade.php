@extends('layout')
@section('main')

@if ($pembayarans->isEmpty())
<h3 class="section-title text-center">Tidak ada histori pembayaran</h3>
@else

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">List Data Histori Pembayaran</h1>
</div>


<table id="dataTable" class="table table-hover table-bordered mb-5">
    <thead class="table-light text-center">
        <th>No</th>
        <th>Nama Siswa</th>
        <th>NISN</th>
        <th>Nama Petugas</th>
        <th>Tanggal Bayar</th>
        <th>Tahun Spp</th>
        <th>Jumlah Bayar</th>
        <th>Keterangan</th>

    </thead>
    @php $i = 0; @endphp
    @foreach ($pembayarans as $pembayaran)
    @php $i++; @endphp
    <tbody class="">
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $pembayaran->siswa->nama }}</td>
            <td>{{ $pembayaran->siswa->nisn }}</td>
            <td>{{ $pembayaran->petugas->nama_petugas }}</td>
            <td>{{ $pembayaran->tgl_bayar }}</td>
            <td>{{ $pembayaran->spp->tahun }}</td>
            <td>{{ $pembayaran->jumlah_bayar }}</td>
            <td>{{ $pembayaran->keterangan }}</td>

        </tr>
    </tbody>

    @endforeach
</table>
@endif
@endsection