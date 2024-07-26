<div class="modal fade text-left" id="editForm" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Data LINMAS</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    @method('PATCH')
                    <label for="nama">Nama</label>
                    <div class="form-group">
                        <input id="nama" name="nama" placeholder="-" class="form-control">
                    </div>
                    <label for="jabatan">Jabatan</label>
                    <div class="form-group">
                        <input id="jabatan" name="jabatan" placeholder="-" class="form-control">
                    </div>
                    <label for="alamat">Alamat</label>
                    <div class="form-group">
                        <input id="alamat" name="alamat" placeholder="-" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" id="linmas_update" class="btn btn-primary ms-1"
                        data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let changed_Linmas_id = -1;
    let editModal = document.getElementById('editForm')
    editModal.addEventListener('show.bs.modal', function (event) {
        let button = event.relatedTarget
        let idLinmas = button.getAttribute('data-bs-idlinmas');
        changed_Linmas_button = idLinmas;
        
        let url = "{{ route('admin.linmas.show', ':id') }}";
        url = url.replace(':id', idLinmas); 

        fetch(url, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Content-Type': 'application/json'
                }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            const linmas = data.data;
           
            $('#myModalLabel33').text(`Data LINMAS`);
            $('#nama').val(linmas.Nama);
            $('#jabatan').val(linmas.Jabatan);
            $('#alamat').val(linmas.Alamat);
    

            // add data-bs to update button
            $('#linmas_update').attr('data-bs-idlinmas', linmas.id);


        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    });

    let updateButton =  document.getElementById('linmas_update');
    updateButton.addEventListener('click', function(event){
        let idLinmas = updateButton.getAttribute('data-bs-idlinmas');
        changed_Linmas_id = idLinmas;
        let url = "{{ route('admin.linmas.update', ':id') }}";
        url = url.replace(':id', idLinmas); 

        let new_data = {
            _method: 'PATCH',
            Nama: $('#nama').val(),
            Jabatan: $('#jabatan').val(),
            Alamat: $('#alamat').val(),
        };
        
        fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(new_data)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            // Replace Data
            console.log(data);
            let linmasRow = $(`tr[data-bs-idlinmas="${idLinmas}"]`);
            console.log(linmasRow);
            if (linmasRow.length) {

                linmasRow.find('td').eq(0).text(new_data.Nama);
                linmasRow.find('td').eq(1).text(new_data.Jabatan);
                linmasRow.find('td').eq(2).text(new_data.Alamat);
            } else {
                console.error('Row not found');
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    });
</script>