<div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Hapus Data</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Apakah anda yakin akan menghapus data ini?
                </p>
                <p id="deleteBpd_namabpd"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tidak</span>
                </button>
                <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal" id="deleteButton">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Yakin</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let deleteButton = document.getElementById('deleteButton');
    let deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        let button = event.relatedTarget
        let idBumdes = button.getAttribute('data-bs-idbumdes');
        // add attribute to delete button
        deleteButton.setAttribute('data-bs-idbumdes', idBumdes);
        console.log('del:', idBumdes);
    });

    deleteButton.addEventListener('click', function (event) {
        let idBumdes = this.getAttribute('data-bs-idbumdes');
        let url = `{{ route('admin.bumdes.destroy', ':id') }}`;
        url = url.replace(':id', idBumdes);

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'DELETE'
            },
            success: function (response) {
                console.log(response);
                let tr = document.querySelector(`tr[data-bs-idbumdes="${idBumdes}"]`);
                if (tr) {
                    tr.remove();
                }
                updateTableNumbering();
            }
        });


    });

    function updateTableNumbering() {
        let table = document.getElementById('table1').getElementsByTagName('tbody')[0];
        for (let i = 0, row; row = table.rows[i]; i++) {
            row.cells[0].innerHTML = i + 1;
        }
    }
</script>