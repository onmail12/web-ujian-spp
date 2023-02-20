@extends('layout')
@section('main')
<h2 class="display-5">Edit Data Kelas</h2>
<div class="border rounded-4 bg-secondary" style="--bs-bg-opacity: 0.01;">
    <form class="m-4" action="{{ route('kelas.update', $kelas) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group form-floating my-4">
            <input type="text" class="form-control" value="{{$kelas->nama_kelas}}" name="nama_kelas" placeholder="Enter nama_kelas"
                required>
            <label for="nama_kelas">Nama Kelas</label>

        </div>
        <div class="form-group form-floating my-4">
            <input type="text" class="form-control" value="{{$kelas->kompetensi_keahlian}}" name="kompetensi_keahlian" placeholder="Enter kompetensi_keahlian" required>
            <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection