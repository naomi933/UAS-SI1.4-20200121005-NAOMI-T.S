@extends('../layouts/mainapp')

@section('title', 'Jadwal Matakuliah')
@section('pagetitle', 'Jadwal Matakuliah')

@section('container')

    {{-- jika message berhasil --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Jika message gagal --}}
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Show error from validation --}}
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1 class="mb-3">List Jadwal Matakuliah</h1>

    <!-- Button trigger modal -->
    {{-- <a class="btn btn-info" href="{{ url('jadwal/create') }}">Buat Jadwal Matakuliah Baru</a> --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Buat Data Jadwal Baru
    </button>
    <div class="table-responsive">
        <table class="table table-striped table-hover">

            <div class="position-relative mb-5">
                <div class="position-absolute top-0 end-0">{{ $jadwal->links() }} </div>
            </div>
            <thead>
                <th>No</th>
                <th>Jadwal Matakuliah</th>
                <th>Nama Matakuliah</th>
                <th>action</th>
            </thead>
            @php($no = 1)
            @foreach ($jadwal as $item)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $item->jadwal }}</td>
                    <td><a href="/jadwal/{{ $item->id }}">{{ $item->matakuliah->matakuliah }}</a></td>
                    <td>
                        {{-- inline div --}}
                        <div class="btn-group" role="group">
                            <a href="/jadwal/{{ $item->id }}/edit" class="btn btn-outline-warning btn-sm text-dark">Edit</a>
                            {{-- create small space between button --}}
                            &nbsp; | &nbsp;
                            <form action="/jadwal/{{ $item->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Yakin Menghapus Data {{ $item->nama_mhs }}')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @php($no++)
            @endforeach
        </table>
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Jadwal Kuliah</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
      </div>
    </div>
  </div>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
