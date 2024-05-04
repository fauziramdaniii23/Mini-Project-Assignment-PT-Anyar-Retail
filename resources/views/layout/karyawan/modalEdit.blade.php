
  <!-- Modal -->
  <div class="modal fade" id="modalEditKaryawan{{ $karyawan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Karyawan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('edit.karyawan', $karyawan->id) }}">
                @csrf
                @method('put')

                <div class="form-group row">
                    <label for="id_user" class="col-md-4 col-form-label text-md-right">User</label>
                    <div class="col-md-6">
                        <select id="id_user" class="form-control @error('id_user') is-invalid @enderror" name="id_user" required>
                            <option value="">Pilih User</option>
                            @foreach ($users as $user)      
                            <option value="{{ $user->id }}" {{ $user->id == $karyawan->id_user ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('id_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama_lengkap" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                    <div class="col-md-6">
                        <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ $karyawan->nama_lengkap }}" required autocomplete="nama_lengkap" autofocus >
                        @error('nama_lengkap')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>
                    <div class="col-md-6">
                        <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required>{{ $karyawan->alamat }}</textarea>
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
                            <option value="Bandung" {{ $karyawan->cabang == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                            <option value="Garut" {{ $karyawan->cabang == 'Garut' ? 'selected' : '' }}>Garut</option>
                            <option value="Sukabumi" {{ $karyawan->cabang == 'Sukabumi' ? 'selected' : '' }}>Sukabumi</option>
                            <option value="Cianjur" {{ $karyawan->cabang == 'Cianjur' ? 'selected' : '' }}>Cianjur</option>
                        
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
                            
                            <option value="Operasional" {{ $karyawan->organisasi == 'Operasional' ? 'selected' : '' }}>Operasional</option>
                            <option value="Supporting" {{ $karyawan->organisasi == 'Supporting' ? 'selected' : '' }}>Supporting</option>
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
                            <option value="Staff IT" {{ $karyawan->jabatan == 'Staff IT' ? 'selected' : '' }}>Staff IT</option>
                            <option value="Spv IT" {{ $karyawan->jabatan == 'Spv IT' ? 'selected' : '' }}>Spv IT</option>
                            <option value="Manager IT" {{ $karyawan->jabatan == 'Manager IT' ? 'selected' : '' }}>Manager IT</option>
                            <option value="Direktur Umum" {{ $karyawan->jabatan == 'Direktur Umum' ? 'selected' : '' }}>Direktur Umum</option>
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
                            <option value="Staff" {{ $karyawan->level_jabatan == 'Staff' ? 'selected' : '' }}>Staff</option>
                            <option value="Spv" {{ $karyawan->level_jabatan == 'Spv' ? 'selected' : '' }}>Spv</option>
                            <option value="Manager" {{ $karyawan->level_jabatan == 'Manager' ? 'selected' : '' }}>Manager</option>
                            <option value="Direktur" {{ $karyawan->level_jabatan == 'Direktur' ? 'selected' : '' }}>Direktur</option>
                        </select>
                        @error('level_jabatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data Karyawan</button>
            </form>
        </div>
      </div>
    </div>
  </div>