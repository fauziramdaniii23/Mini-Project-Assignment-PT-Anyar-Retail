<!-- Modal -->
<div class="modal fade" id="modalEditPresensi{{ $presen->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Presensi Karyawan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('edit.presensi', $presen->id) }}">
                @csrf
                @method('put')
            
                <div class="form-group">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" value="{{ date('Y-m-d') }}" id="tanggal" name="tanggal" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="id_karyawan">ID Karyawan:</label>
                    <select id="id_karyawan" name="id_karyawan" class="form-control" required>
                        <option value="">Pilih Karyawan</option>
                        @foreach ($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}" {{ $karyawan->id == $presen->id_karyawan ? 'selected' : '' }}>{{ $karyawan->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="form-group">
                    <label for="jam_masuk">Jam Masuk:</label>
                    <input type="time" id="jam_masuk" name="jam_masuk" class="form-control" value="{{ $presen->jam_masuk }}">
                </div>
            
                <div class="form-group">
                    <label for="jam_pulang">Jam Pulang:</label>
                    <input type="time" id="jam_pulang" name="jam_pulang" class="form-control" value="{{ $presen->jam_pulang }}">
                </div>
            
                <div class="form-group">
                    <label for="presensi_status">Status Presensi:</label>
                    <select id="presensi_status" name="presensi_status" class="form-control" required>
                        <option value="Datang Awal"{{ $presen->presensi_status == 'Datang Awal' ? 'selected' : '' }}>Datang Awal</option>
                        <option value="Tepat Waktu" {{ $presen->presensi_status == 'Tepat Waktu' ? 'selected' : '' }}>Tepat Waktu</option>
                        <option value="Terlambat" {{ $presen->presensi_status == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                        <option value="Absen"{{ $presen->presensi_status == 'Absen' ? 'selected' : '' }}>Absen</option>
                    </select>
                </div>
            
                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <select id="keterangan" name="keterangan" class="form-control">
                        <option value="">Keterangan</option>
                        <option value="Sakit" {{ $presen->keterangan == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="Izin" {{ $presen->keterangan == 'Izin' ? 'selected' : '' }}>Izin</option>
                        <option value="Cuti"  {{ $presen->keterangan == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                        <option value="Alpha" {{ $presen->keterangan == 'Alpha' ? 'selected' : '' }}>Alpha</option>
                        <option value="Libur" {{ $presen->keterangan == 'Libur' ? 'selected' : '' }}>Libur</option>
                    </select>
                </div>
            
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Perbarui Data Presensi</button>
            </div>
        </form>
      </div>
    </div>
  </div>