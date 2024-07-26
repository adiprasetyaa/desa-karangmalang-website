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
                <p id="deleteLkd_namalkd"></p>
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
        let idLkd = button.getAttribute('data-bs-idlkd');
        // add attribute to delete button
        deleteButton.setAttribute('data-bs-idlkd', idLkd);
        console.log('del:', idLkd);
    });

    deleteButton.addEventListener('click', function (event) {
        let idLkd = this.getAttribute('data-bs-idlkd');
        let url = `{{ route('admin.lkd.destroy', ':id') }}`;
        url = url.replace(':id', idLkd);

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'DELETE'
            },
            success: function (response) {
                console.log(response);
                let tr = document.querySelector(`tr[data-bs-idlkd="${idLkd}"]`);
                tr.remove();
            }
        });


    });
</script>