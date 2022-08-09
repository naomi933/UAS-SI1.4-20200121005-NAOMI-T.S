@extends('../layouts/mainapp')

@section('title', 'Jadwal Kuliah')
{{-- @section('pagetitle', 'Create Data Mahasiswa ' . $mahasiswa->nama_mhs) --}}
@section('pagetitle', 'Create Data Jadwal Kuliah ')

@section('container')

    <form action="{{ url('jadwal') }}" method="POST">
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
            <input type="date" class="form-control" id="jadwal" name="jadwal">
            @error('jadwal')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>     

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
