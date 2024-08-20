<div class="modal fade text-left" id="createModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33_create">Tambah Data Kepala Desa</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="#" method="GET" id="createForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="createForm-name">Nama</label>
                    <div class="form-group">
                        <input id="createForm-name" name="name" placeholder="Nama" class="form-control">
                    </div>
                    <label for="createForm-period_start_at">Tanggal Awal Menjabat</label>
                    <div class="form-group">
                        <input id="createForm-period_start_at" name="period_start_at"  type="date" class="form-control mb-3 flatpickr-no-config" placeholder="Tanggal awal menjabat..">
                    </div>
                    <label for="createForm-period_start_at">Tanggal Akhir Menjabat</label>
                    <div class="form-group">
                        <input id="createForm-period_end_at" name="period_end_at"  type="date" class="form-control mb-3 flatpickr-no-config" placeholder="Tanggal akhir menjabat..">
                    </div>
                    <label for="createForm-address">Alamat</label>
                    <div class="form-group">
                        <input id="createForm-address" name="address" placeholder="Alamat" class="form-control">
                    </div>
                    <label for="createForm-phone">NoHP</label>
                    <div class="form-group">
                        <input id="createForm-phone" name="phone" placeholder="Nomor Handphone" class="form-control">
                    </div>
                    <label for="createForm-photo">Foto</label>
                    <div class="form-group">
                        <input id="createForm-photo" name="photo" class="form-control" type="file" >
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