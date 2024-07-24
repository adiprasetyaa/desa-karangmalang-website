<div class="modal fade text-left" id="editForm" tabindex="-1" role="dialog"
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
            <form action="#">
                <div class="modal-body">
                    @method('PATCH')
                    <label for="nama">Nama</label>
                    <div class="form-group">
                        <input id="nama" name="text" placeholder="-" class="form-control">
                    </div>
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <div class="form-group">
                        <input id="tempat_lahir" placeholder="-" class="form-control">
                    </div>
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <div class="form-group">
                        <input id="tanggal_lahir" name="tanggal_lahir" type="date" class="form-control mb-3 flatpickr-no-config" placeholder="Select date..">
                    </div>
                    <label for="alamat">Alamat</label>
                    <div class="form-group">
                        <input id="alamat" name="alamat" placeholder="-" class="form-control">
                    </div>
                    <label for="NoHandphone">Nomor HP</label>
                    <div class="form-group">
                        <input id="NoHandphone" name="NoHandphone" placeholder="-" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" id="ketuart_update" class="btn btn-primary ms-1"
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
    let changed_Ketua_Rt_id = -1;
    let editModal = document.getElementById('editForm')
    editModal.addEventListener('show.bs.modal', function (event) {
        let button = event.relatedTarget
        let idKetua = button.getAttribute('data-bs-idketua');
        changed_Ketua_Rt_button = idKetua;
        
        let url = "{{ route('admin.ketua_rt.show', ':id') }}";
        url = url.replace(':id', idKetua); 

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
            const ketuaRT = data.data;
           
            $('#myModalLabel33').text(`Data Ketua ${ketuaRT.rt}`);
            $('#nama').val(ketuaRT.Nama);
            $('#tempat_lahir').val(ketuaRT.tempat_lahir);
            $('#tanggal_lahir').val(ketuaRT.tanggal_lahir);
            $('#alamat').val(ketuaRT.Alamat);
            $('#NoHandphone').val(ketuaRT.NoHandphone);

            // add data-bs to update button
            $('#ketuart_update').attr('data-bs-idketua', ketuaRT.id);


        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    });

    let updateButton =  document.getElementById('ketuart_update');
    updateButton.addEventListener('click', function(event){
        let idKetua = updateButton.getAttribute('data-bs-idketua');
        changed_Ketua_Rt_id = idKetua;
        let url = "{{ route('admin.ketua_rt.update', ':id') }}";
        url = url.replace(':id', idKetua); 

        let new_data = {
            _method: 'PATCH',
            Nama: $('#nama').val(),
            tempat_lahir: $('#tempat_lahir').val(),
            tanggal_lahir: $('#tanggal_lahir').val(),
            Alamat: $('#alamat').val(),
            NoHandphone: $('#NoHandphone').val(),
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
            let ketuaRow = $(`tr[data-bs-idketua="${idKetua}"]`);
            console.log(ketuaRow);
            if (ketuaRow.length) {
                // Convert date string to Date object
                let date = new Date(new_data.tanggal_lahir);

                // Format date to '10 Maret 2024'
                let formatter = new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
                let formattedDate = formatter.format(date);

                ketuaRow.find('td').eq(1).text(new_data.Nama);
                ketuaRow.find('td').eq(2).text(new_data.tempat_lahir+', '+formattedDate);
                ketuaRow.find('td').eq(3).text(new_data.Alamat);
                ketuaRow.find('td').eq(4).text(new_data.NoHandphone);
            } else {
                console.error('Row not found');
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    });
</script>