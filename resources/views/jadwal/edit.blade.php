@extends('../layouts/mainapp')

@section('title', 'Jadwal Kuliah')
{{-- @section('pagetitle', 'Create Data Mahasiswa ' . $mahasiswa->nama_mhs) --}}
@section('pagetitle', 'Edit Data Jadwal Kuliah ')

@section('container')

    <form action="/jadwal/{{ $dtJadwal->id }}" method="post">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label>Nama Matakuliah</label>
            <select class="form-control" name="matakuliah_id" aria-label="Default select example">
                <option disabled value selected>Pilih Matakuliah</option>
                @foreach ($matakuliah as $item)
                    <option value="{{$item->id}}">{{$item->matakuliah}}</option>
                @endforeach
              </select>
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

        <button type="submit" class="btn btn-primary">Update</button>
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
