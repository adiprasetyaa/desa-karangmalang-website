<div class="modal fade text-left" id="createModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33_ketuart_store">Tambah Data Ketua RT </h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="#" method="GET" id="createForm">
                <div class="modal-body">
                    <label for="createForm-rt">RT</label>
                    <div class="form-group">
                        <input id="createForm-rt" class="form-control" placeholder="RT 000">
                    </div>
                    <label for="createForm-nama">Nama</label>
                    <div class="form-group">
                        <input id="createForm-nama" name="nama" placeholder="Nama Ketua RT" class="form-control">
                    </div>
                    <label for="createForm-tempat_lahir">Tempat Lahir</label>
                    <div class="form-group">
                        <input id="createForm-tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control">
                    </div>
                    <label for="createForm-tanggal_lahir">Tanggal Lahir</label>
                    <div class="form-group">
                        <input id="createForm-tanggal_lahir" name="tanggal_lahir" type="date" class="form-control mb-3 flatpickr-no-config" placeholder="Select date..">
                    </div>
                    <label for="createForm-alamat">Alamat</label>
                    <div class="form-group">
                        <input id="createForm-alamat" name="alamat" placeholder="Alamat" class="form-control">
                    </div>
                    <label for="createForm-NoHandphone">Nomor HP</label>
                    <div class="form-group">
                        <input id="createForm-NoHandphone" name="NoHandphone" placeholder="085**********" class="form-control">
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