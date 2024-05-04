@extends('layout.main')

@section('content')
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Detail Absensi Karyawan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Absensi Karyawan</li>
                <li class="breadcrumb-item active">Detail Absensi Karyawan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      
      <div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">no</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama</th>
                <th scope="col">Status</th>
                <th scope="col">Keterangan</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($presensiKaryawan as $presensi)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $presensi->tanggal }}</td>
                  <td>{{ $presensi->karyawan->nama_lengkap }}</td>
                  <td>{{ $presensi->presensi_status }}</td>
                  <td>{{ $presensi->keterangan }}</td>
                  {{-- <td>{{ $absen->keterangan }}</td> --}}
                </tr>
                    
                @endforeach
            </tbody>
          </table>

      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content mx-2 my-2">
        

      </section>

@endsection