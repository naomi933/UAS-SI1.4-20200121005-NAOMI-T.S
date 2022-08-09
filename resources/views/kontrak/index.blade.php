@extends('../layouts/mainapp')

@section('title', 'Kontrak Matakuliah')
@section('pagetitle', 'Kontrak Matakuliah')

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

    <h1 class="mb-3">Kontrak Matakuliah</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">

            <div class="position-relative mb-5">
                <div class="position-absolute top-0 end-0"></div>
            </div>
            <thead class="text-center">
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Semester</th>
            </thead>
            @php($no = 1)
            @foreach ($dtMahasiswa as $item)
                <tr class="text-center">
                    <td>{{$no}}</td>
                    <td>{{$item->nama_mhs}}</td>
                    <td>Semester {{$item->semester}}</td>
                </tr>
                @php($no++)
            @endforeach
        </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
