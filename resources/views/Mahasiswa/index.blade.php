@extends('../layouts/mainapp')

@section('title', 'List Mahasiswa')
@section('pagetitle', 'Mahasiswa')

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

    <h1 class="mb-3">List Mahasiswa</h1>

    <!-- Button trigger modal -->
    {{-- <a class="btn btn-info" href="{{ url('mahasiswa/create') }}">Tambah Data Mahasiswa</a> --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data Mahasiswa
    </button>
    <div class="table-responsive">
        <table class="table table-striped table-hover">

            <div class="position-relative mb-5">
                <div class="position-absolute top-0 end-0">{{ $mahasiswas->links() }} </div>
            </div>
            <thead>
                <th>No</th>
                <th>Nim</th>
                <th>Nama Mahasiswa</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>action</th>
            </thead>
            @php($no = 1)
            @foreach ($mahasiswas as $mhs)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $mhs->nim }}</td>
                    <td><a href="/mahasiswa/{{ $mhs->id }}">{{ $mhs->nama_mhs }}</a></td>
                    <td>+62 {{ $mhs->no_tlp }}</td>
                    <td>{{ $mhs->alamat }}</td>
                    <td>
                        {{-- inline div --}}
                        <div class="btn-group" role="group">
                            <a href="/mahasiswa/{{ $mhs->id }}/edit" class="btn btn-outline-warning btn-sm text-dark">Edit</a>
                            {{-- create small space between button --}}
                            &nbsp; | &nbsp;
                            <form action="/mahasiswa/{{ $mhs->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Yakin Menghapus Data {{ $mhs->nama_mhs }}')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @php($no++)
            @endforeach
        </table>
    </div>
         
  <!-- Add Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Mahasiswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
                    <label for="semester" class="form-label">Semester Pada Perkuliahan</label>
                    <input type="number" class="form-control" id="semester" name="semester">
                    @error('semester')
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
