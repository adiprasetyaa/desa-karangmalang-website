<div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Data Ketua RT </h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="#" method="POST" id="editForm">
                <div class="modal-body">
                    <label for="editForm-rt" hidden>RT</label>
                    <div class="form-group" hidden>
                        <input id="editForm-rt" name="rt" placeholder="-" class="form-control">
                    </div>
                    <label for="editForm-nama">Nama</label>
                    <div class="form-group">
                        <input id="editForm-nama" name="nama" placeholder="-" class="form-control">
                    </div>
                    <label for="editForm-tempat_lahir">Tempat Lahir</label>
                    <div class="form-group">
                        <input id="editForm-tempat_lahir" name="tempat_lahir" placeholder="-" class="form-control">
                    </div>
                    <label for="editForm-tanggal_lahir">Tanggal Lahir</label>
                    <div class="form-group">
                        <input id="editForm-tanggal_lahir" name="tanggal_lahir" type="date" class="form-control mb-3 flatpickr-no-config" placeholder="Select date..">
                    </div>
                    <label for="editForm-alamat">Alamat</label>
                    <div class="form-group">
                        <input id="editForm-alamat" name="alamat" placeholder="-" class="form-control">
                    </div>
                    <label for="editForm-NoHandphone">Nomor HP</label>
                    <div class="form-group">
                        <input id="editForm-NoHandphone" name="NoHandphone" placeholder="-" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" id="editForm-update" class="btn btn-primary ms-1"
                        data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>