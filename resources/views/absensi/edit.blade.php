@extends('../layouts/mainapp')

@section('title', 'Jadwal Kuliah')
{{-- @section('pagetitle', 'Create Data Mahasiswa ' . $mahasiswa->nama_mhs) --}}
@section('pagetitle', 'Edit Data Jadwal Kuliah ')

@section('container')

    <form action="/jadwal/{{ $dtJadwal->id }}" method="post">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Matakuliah</label>
            <input type="text" class="form-control" id="matakuliah_id" name="matakuliah_id" value="@if (old('matakuliah_id')) {{ old('matakuliah_id') }} 
            @else {{ $dtJadwal->matakuliah_id }} @endif
            ">
            @error('jadwal')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jadwal" class="form-label">Jadwal Kuliah</label>
            <input type="text" class="form-control" id="jadwal" name="jadwal" value="@if (old('jadwal')) {{ old('jadwal') }} 
            @else {{ $dtJadwal->jadwal }} @endif
            ">
            @error('jadwal')
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

@endsection
