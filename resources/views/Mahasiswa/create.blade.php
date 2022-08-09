@extends('../layouts/mainapp')

@section('title', 'Mahasiswa')
{{-- @section('pagetitle', 'Create Data Mahasiswa ' . $mahasiswa->nama_mhs) --}}
@section('pagetitle', 'Create Data Mahasiswa ')

@section('container')

    <form action="{{ url('mahasiswa') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nim" class="form-label">NIM Mahasiswa</label>
            <input type="number" class="form-control" id="nim" name="nim">
            @error('nim')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama_mhs">
            @error('nama_mhs')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Mahasiswa</label>
            <input type="email" class="form-control" id="email" name="email">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="umur" class="form-label">Umur Mahasiswa</label>
            <input type="number" class="form-control" id="umur" name="umur">
            @error('umur')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Mahasiswa</label>
            <textarea class="form-control" id="alamat" name="alamat"></textarea>
            @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="no_tlp" class="form-label">No Telepon</label>
            <input type="number" class="form-control" id="no_tlp" name="no_tlp">
            @error('no_tlp')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
