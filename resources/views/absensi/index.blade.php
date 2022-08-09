@extends('../layouts/mainapp')

@section('title', 'Data Absensi')
@section('pagetitle', 'Absensi Mahasiswa')

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

    <h1 class="mb-3">Data Absensi Mahasiswa</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Presensi Kehadiran
    </button>
    <div class="table-responsive">
        <table class="table table-striped table-hover">

            <div class="position-relative mb-5">
                <div class="position-absolute top-0 end-0">{{ $absen->links() }}</div>
            </div>
            <thead class="text-center">
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Matakuliah</th>
                <th>Keterangan</th>
            </thead>
            @php($no = 1)
            @foreach ($absen as $item)
                <tr class="text-center">
                    <td>{{$no}}</td>
                    <td>{{$item->mahasiswa}}</td>
                    <td>{{$item->matakuliah->matakuliah}}</td>
                    <td><button class="btn btn-sm btn-outline-primary" disabled>{{$item->keterangan}}</button></td>
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
          <h5 class="modal-title" id="exampleModalLabel">Form Presensi Kehadiran</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ url('absensi') }}" method="POST">
                @csrf
        
                <div class="mb-3">
                    <label for="nim" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="mahasiswa" name="mahasiswa">
                    @error('nim')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
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
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="keterangan" id="keteranganH" value="Hadir">
                        <label for="keteranganH" class="form-check-label">Hadir</label>
                    </div> 
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="keterangan" id="keteranganTH" value="Tidak Hadir">
                        <label for="keteranganTH" class="form-check-label">Tidak Hadir</label>
                    </div> 
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
    <br>
    <br>
@endsection
