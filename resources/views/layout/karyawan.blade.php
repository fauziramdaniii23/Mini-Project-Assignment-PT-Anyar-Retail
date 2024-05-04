@extends('layout.main')

@section('content')
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Karyawan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Data Karyawan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <div>

        @include('layout.allert')
        <!-- Button trigger modal -->
        <div class="d-flex">
<button type="button" class="btn btn-primary mx-2 my-2" data-toggle="modal" data-target="#modalTambahKaryawan">
    Tambah Data Karyawan
  </button>
  <form class="form-inline my-2 my-lg-0" action="{{ route('cariKaryawan') }}" method="GET">
    <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>

</div>
  @include('layout.karyawan.modalCreate')
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content mx-2 my-2">
        
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">No Induk Karyawan</th>
                <th scope="col">Nama</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $karyawan)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $karyawan->nomor_induk_karyawan }}</td>
                <td>{{ $karyawan->nama_lengkap }}</td>
                <td class="d-flex">
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditKaryawan{{ $karyawan->id }}">
    <i class="bi bi-pen-fill"></i>
  </button>
            @include('layout.karyawan.modalEdit')

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalShowKaryawan{{ $karyawan->id }}">
                show
              </button>
              @include('layout.karyawan.modalShow')
              
            <form action="{{ route('delete.karyawan', $karyawan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
      </section>

@endsection