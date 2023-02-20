@extends('layout')
@section('main')

@if (session('alert'))
<div class="alert my-2 {{session('alert')[0]}} alert-dismissible fade show w-50" role="alert">
    <strong>{{session('alert')[1]}}</strong> {{session('alert')[2]}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (($siswas->count() == 0))
<h2 class="display-5 text-center my-3">Semua Siswa Lunas!</h2>
@else

<h2 class="display-5 text-center">List Data Pembayaran</h2>
<table id="dataTable" class="table table-hover table-bordered text-nowrap mb-5">
    <thead class="table-light text-center">
        <th>No</th>
        <th>NISN</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Nominal</th>
        <th style="width:100px; text-align:center;">Aksi</th>

    </thead>
    @php $i = 0; @endphp
    @foreach ($siswas as $siswa)
    @php $i++; @endphp
    <tbody class="">
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $siswa->nisn }}</td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->kelas->nama_kelas }}</td>
            <td>{{ $siswa->spp->nominal }}</td>

            <td class="text-center">
                <button type="button" class="btn btn-primary p-2" data-bs-toggle="modal"
                    data-bs-target="#addPembayaranModal">Bayar</button>
            </td>

            <div class="modal fade" id="addPembayaranModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addPembayaranModalLabel">Tambah Data Pembayaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('pembayaran.store', $siswa) }}" method="post">
                                @csrf
                                <div class="form-group my-2">
                                    <label for="jumlah_bayar">Jumlah Bayar</label>
                                    <input type="text" class="form-control" name="jumlah_bayar"
                                        placeholder="Contoh: 900.000" required autofocus>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success"><i
                                    class="bi bi-person-plus px-2"></i>Konfirmasi</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </tr>
    </tbody>

    @endforeach
</table>
@endif
@endsection