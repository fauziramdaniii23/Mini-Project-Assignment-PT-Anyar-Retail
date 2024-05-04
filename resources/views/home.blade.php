@extends('layout.component')

@section('main')
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        data-mdb-collapse-init
        class="navbar-toggler"
        type="button"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
            height="15"
            alt="MDB Logo"
            loading="lazy"
          />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Projects</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
  
      <!-- Right elements -->
      @if (Auth::check())
      
          
      <div class="d-flex align-items-center">
          <!-- Icon -->
          <a class="text-reset me-3" href="#">
          <i class="fas fa-shopping-cart"></i>
        </a>
  
        <!-- Notifications -->
        <div class="dropdown">
          <a
            data-mdb-dropdown-init
            class="text-reset me-3 dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            aria-expanded="false"
          >
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </div>
        <!-- Avatar -->
        <div class="dropdown">
          <a
            data-mdb-dropdown-init
            class="dropdown-toggle d-flex align-items-center hidden-arrow"
            href="#"
            id="navbarDropdownMenuAvatar"
            role="button"
            aria-expanded="false"
          >
            <img
              src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
              class="rounded-circle"
              height="25"
              alt="Black and White Portrait of a Man"
              loading="lazy"
            />
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuAvatar"
          >
          <li>
            <a class="dropdown-item" href="/dashboard">Dashboard</a>
          </li>
            <li>
              <a class="dropdown-item" href="#">My profile</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </li>
          </ul>
        </div>
      </div>

          
      @else
      <a class="text-reset me-3" href="/login">Login
      </a>
      <!-- Right elements -->
      @endif
    </div>
    <!-- Container wrapper -->
  </nav>

  @auth
  <div>
    <h1>
      Hallo Selamat Datang {{ auth()->user()->name }}
    </h1>
  </div>
@endauth
  <!-- Navbar -->
  <form method="POST" action="">
    @csrf

    <div class="form-group row">
        <label for="nama_lengkap" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
        <div class="col-md-6">
            <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autocomplete="nama_lengkap" autofocus>
            @error('nama_lengkap')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="nomor_induk_karyawan" class="col-md-4 col-form-label text-md-right">Nomor Induk Karyawan</label>
        <div class="col-md-6">
            <input id="nomor_induk_karyawan" type="text" class="form-control @error('nomor_induk_karyawan') is-invalid @enderror" name="nomor_induk_karyawan" value="{{ old('nomor_induk_karyawan') }}" required autocomplete="nomor_induk_karyawan">
            @error('nomor_induk_karyawan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>
        <div class="col-md-6">
            <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required>{{ old('alamat') }}</textarea>
            @error('alamat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="cabang" class="col-md-4 col-form-label text-md-right">Cabang</label>
        <div class="col-md-6">
            <select id="cabang" class="form-control @error('cabang') is-invalid @enderror" name="cabang" required>
                <option value="">Pilih Cabang</option>
                <option value="Bandung" {{ old('cabang') == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                <option value="Garut" {{ old('cabang') == 'Garut' ? 'selected' : '' }}>Garut</option>
                <option value="Sukabumi" {{ old('cabang') == 'Sukabumi' ? 'selected' : '' }}>Sukabumi</option>
                <option value="Cianjur" {{ old('cabang') == 'Cianjur' ? 'selected' : '' }}>Cianjur</option>
            </select>
            @error('cabang')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="organisasi" class="col-md-4 col-form-label text-md-right">Organisasi</label>
        <div class="col-md-6">
            <select id="organisasi" class="form-control @error('organisasi') is-invalid @enderror" name="organisasi" required>
                <option value="">Pilih Organisasi</option>
                <option value="Operasional" {{ old('organisasi') == 'Operasional' ? 'selected' : '' }}>Operasional</option>
                <option value="Supporting" {{ old('organisasi') == 'Supporting' ? 'selected' : '' }}>Supporting</option>
            </select>
            @error('organisasi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="jabatan" class="col-md-4 col-form-label text-md-right">Jabatan</label>
        <div class="col-md-6">
            <select id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" required>
                <option value="">Pilih Jabatan</option>
                <option value="Staff IT" {{ old('jabatan') == 'Staff IT' ? 'selected' : '' }}>Staff IT</option>
                <option value="Spv IT" {{ old('jabatan') == 'Spv IT' ? 'selected' : '' }}>Spv IT</option>
                <option value="Manager IT" {{ old('jabatan') == 'Manager IT' ? 'selected' : '' }}>Manager IT</option>
                <option value="Direktur Umum" {{ old('jabatan') == 'Direktur Umum' ? 'selected' : '' }}>Direktur Umum</option>
            </select>
            @error('jabatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="level_jabatan" class="col-md-4 col-form-label text-md-right">Level Jabatan</label>
        <div class="col-md-6">
            <select id="level_jabatan" class="form-control @error('level_jabatan') is-invalid @enderror" name="level_jabatan" required>
                <option value="">Pilih Level Jabatan</option>
                <option value="Staff" {{ old('level_jabatan') == 'Staff' ? 'selected' : '' }}>Staff</option>
                <option value="Spv" {{ old('level_jabatan') == 'Spv' ? 'selected' : '' }}>Spv</option>
                <option value="Manager" {{ old('level_jabatan') == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Direktur" {{ old('level_jabatan') == 'Direktur' ? 'selected' : '' }}>Direktur</option>
            </select>
            @error('level_jabatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Tambahkan input form untuk kolom lainnya sesuai kebutuhan -->

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Tambahkan Data Karyawan</button>
        </div>
    </div>
</form>
@endsection