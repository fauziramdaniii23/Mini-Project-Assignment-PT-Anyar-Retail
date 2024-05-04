@extends('layout.main')

@section('content')
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Presensi Karyawan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Presensi Karyawan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      @include('layout.allert')

      <div class="d-flex">
      <form class="form-inline my-2 mx-4 my-lg-0" action="{{ route('cariPresensi') }}" method="GET">
        <input class="form-control mr-sm-2" name="keyword" type="date" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
      </form>
      <form class="form-inline my-2 mx-4 my-lg-0" action="{{ route('cariPresensi') }}" method="GET">
        <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
      <!-- /.content-header -->
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-2 mx-2" data-toggle="modal" data-target="#modalCreatePresensi">
    Tambah Presensi Karyawan
  </button>
  
    @include('layout.presensi.modalCreate')
  
      <!-- Main content -->
      <section class="content">
        
    <table class="table">
        <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Karyawan</th>
                <th scope="col">Jam Masuk</th>
                <th scope="col">Jam Pulang</th>
                <th scope="col">Presensi Status</th>
                <th scope="co" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($presensi as $presen)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $presen->tanggal }}</td>
                <td>{{ $presen->karyawan->nama_lengkap }}</td>
                <td>{{ $presen->jam_masuk }}</td>
                <td>{{ $presen->jam_pulang }}</td>
                <td>{{ $presen->presensi_status }}</td>
                <td class="d-flex">
                    <button type="button" class="btn btn-warning mx-1" data-toggle="modal" data-target="#modalEditPresensi{{ $presen->id }}">
                        Edit
                      </button>
                      
                      @include('layout.presensi.modalEdit')

                      <button type="button" class="btn btn-primary mx-1" data-toggle="modal" data-target="#modalShowPresensi{{ $presen->id }}">
                          Show
                        </button>
                        @include('layout.presensi.modalShow')
                        <form action="{{ route('delete.presensi', $presen->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus presensi ini?')">
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