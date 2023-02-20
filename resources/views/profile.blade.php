@extends('layout')
@section('main')

<div class="header">
    <h4 class="title">Edit Profile</h4>
</div>
<div class="content">
    <form action="{{ route('profile.update') }}" method="post">
        @csrf
        <div class="row">
            {{-- <div class="col">
                <div class="form-group">
                    <label>NISN</label>
                    <input type="text" class="form-control" name="nisn" placeholder="Enter NISN"
                        value="{{ $siswa->nisn }}">
                </div>
            </div> --}}
            <div class="col">
                <div class="form-group">
                    <label>NIS</label>
                    <input type="text" class="form-control" name="nis" placeholder="Enter NIS"
                        value="{{ $siswa->nis }}">
                </div>
            </div>
            {{-- <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" placeholder="Email">
                </div>
            </div> --}}
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Enter Nama"
                        value="{{ $siswa->nama }}">
                </div>
            </div>
            <div class="col">
                <label>Kelas</label>
                <select class="form-select" name="id_kelas">
                    @foreach ($kelases as $kelas)
                    <option value="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>No.Telp</label>
                    <input type="text" class="form-control" name="no_telp" placeholder="Enter No.Telp"
                        value="{{ $siswa->no_telp }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea rows="5" class="form-control" placeholder="Enter alamat"
                name="alamat">{{ $siswa->alamat }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection