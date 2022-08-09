@extends('../layouts/mainapp')

@section('title', 'List Matakuliah')
@section('pagetitle', 'Matakuliah')

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

    <h1 class="mb-3">List Matakuliah</h1>

    <!-- Button trigger modal -->
    {{-- <a class="btn btn-info" href="{{ url('matakuliah/create') }}">Tambah Data Matakuliah</a> --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data Matakuliah Baru
    </button>

    <div class="table-responsive">
        <table class="table table-striped table-hover">

            <div class="position-relative mb-5">
                <div class="position-absolute top-0 end-0"></div>
            </div>
            <thead>
                <th>No</th>
                <th>Nama Matakuliah</th>
                <th>Jumlah SKS</th>
                <th>action</th>
            </thead>
            @php($no = 1)
            @foreach ($matakuliah as $matkul)
                <tr>
                    <td>{{ $no }}</td>
                    <td><a href="/matakuliah/{{ $matkul->id }}">{{ $matkul->matakuliah }}</a></td>
                    <td>{{ $matkul->sks }}</td>
                    <td>
                        {{-- inline div --}}
                        <div class="btn-group" role="group">
                            <a href="/matakuliah/{{ $matkul->id }}/edit" class="btn btn-outline-warning btn-sm text-dark">Edit</a>
                            {{-- create small space between button --}}
                            &nbsp; | &nbsp;
                            <form action="/matakuliah/{{ $matkul->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Yakin Menghapus Data {{ $matkul->nama_mhs }}')">Delete</button>
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
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
