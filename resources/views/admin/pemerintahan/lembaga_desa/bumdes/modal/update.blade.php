<div class="modal fade text-left" id="editForm" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Data BUMDES</h4>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" id="bumdes_update" class="btn btn-primary ms-1"
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
    let changed_Bumdes_id = -1;
    let editModal = document.getElementById('editForm')
    editModal.addEventListener('show.bs.modal', function (event) {
        let button = event.relatedTarget
        let idBumdes = button.getAttribute('data-bs-idbumdes');
        changed_Bumdes_button = idBumdes;
        
        let url = "{{ route('admin.bumdes.show', ':id') }}";
        url = url.replace(':id', idBumdes); 

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
            const bumdes = data.data;
           
            $('#myModalLabel33').text(`Data BUMDES`);
            $('#nama').val(bumdes.Nama);
            $('#jabatan').val(bumdes.Jabatan);

            // add data-bs to update button
            $('#bumdes_update').attr('data-bs-idbumdes', bumdes.id);


        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    });

    let updateButton =  document.getElementById('bumdes_update');
    updateButton.addEventListener('click', function(event){
        let idBumdes = updateButton.getAttribute('data-bs-idbumdes');
        changed_Bumdes_id = idBumdes;
        let url = "{{ route('admin.bumdes.update', ':id') }}";
        url = url.replace(':id', idBumdes); 

        let new_data = {
            _method: 'PATCH',
            Nama: $('#nama').val(),
            Jabatan: $('#jabatan').val(),
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
            let bumdesRow = $(`tr[data-bs-idbumdes="${idBumdes}"]`);
            console.log(bumdesRow);
            if (bumdesRow.length) {

                bumdesRow.find('td').eq(1).text(new_data.Nama);
                bumdesRow.find('td').eq(2).text(new_data.Jabatan);
            } else {
                console.error('Row not found');
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    });
</script>