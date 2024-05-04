
  <!-- Modal -->
  <div class="modal fade" id="modalShowKaryawan{{ $karyawan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Karyawan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                <div class="d-flex">
                    <div class="">Nama Lengkap :</div>
                    <div class="">
                        <p>{{ $karyawan->nama_lengkap }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="">No Induk Karyawan :</div>
                    <div class="">
                        <p>{{ $karyawan->nomor_induk_karyawan }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="">Alamat :</div>
                    <div class="">
                        <p>{{ $karyawan->alamat }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="">Cabang :</div>
                    <div class="">
                        <p>{{ $karyawan->cabang }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="">
                        <p>Organisasi :</p>
                    </div>
                    <div class="">
                        <p>{{ $karyawan->organisasi }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="">Jabatan :</div>
                    <div class="">
                        <p>{{ $karyawan->jabatan }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="">Level Jabatan :</div>
                    <div class="">
                        <p>{{ $karyawan->level_jabatan }}</p>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        </div>
      </div>
    </div>
  </div>