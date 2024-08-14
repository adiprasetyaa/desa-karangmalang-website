<div class="modal fade text-left" id="createModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33_create">Tambah Data BPD</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="#" method="GET" id="createForm">
                <div class="modal-body">
                    <label for="createForm-Nama">Nama</label>
                    <div class="form-group">
                        <input id="createForm-Nama" name="Nama" placeholder="Nama" class="form-control">
                    </div>
                    <label for="createForm-Jabatan">Jabatan</label>
                    <div class="form-group">
                        <input id="createForm-Jabatan" name="Jabatan" placeholder="Jabatan" class="form-control">
                    </div>
                    <label for="createForm-Alamat">Alamat</label>
                    <div class="form-group">
                        <input id="createForm-Alamat" name="Alamat" placeholder="Alamat" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button type="button" id="createForm-store" class="btn btn-primary ms-1"
                        data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tambah</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>