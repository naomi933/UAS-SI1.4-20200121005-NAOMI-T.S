@extends('../layouts/mainapp')

@section('title', 'Matakuliah')
{{-- @section('pagetitle', 'Create Data Mahasiswa ' . $mahasiswa->nama_mhs) --}}
@section('pagetitle', 'Create Data Matakuliah ')

@section('container')

    <form action="{{ url('matakuliah') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="matakuliah" class="form-label">Nama Matakuliah</label>
            <input type="text" class="form-control" id="matakuliah" name="matakuliah">
            @error('matakuliah')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sks" class="form-label">Jumlah SKS</label>
            <input type="number" class="form-control" id="sks" name="sks">
            @error('sks')
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

@endsection
