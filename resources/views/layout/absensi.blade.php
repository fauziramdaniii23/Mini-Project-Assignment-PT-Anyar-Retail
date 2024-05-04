@extends('layout.main')

@section('content')
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Absensi Karyawan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Absensi Karyawan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <div>
        <h4>Data Karyawan yang memiliki absen lebih dari 3</h4>
      </div>
      <div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">no</th>
                <th scope="col">Nama</th>
                <th scope="col">Jumlah Absen</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($absensi as $absen)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $absen->nama_lengkap }}</td>
                  <td>{{ $absen->total_absen }}</td>
                  <td><a href="{{ route('presensi.karyawan', $absen->id_karyawan) }}" class="btn btn-primary">Detail</a></td>
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