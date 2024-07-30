<div class="modal fade text-left" id="createForm" tabindex="-1" role="dialog"
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
            <form action="#" method="GET">
                <div class="modal-body">
                    <label for="rt">RT</label>
                    <div class="form-group">
                        <input id="rt" placeholder="RT 000" class="form-control">
                    </div>
                    <label for="nama">Nama</label>
                    <div class="form-group">
                        <input id="nama" name="text" placeholder="Nama Ketua RT" class="form-control">
                    </div>
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <div class="form-group">
                        <input id="tempat_lahir" placeholder="Tempat Lahir" class="form-control">
                    </div>
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <div class="form-group">
                        <input id="tanggal_lahir" name="tanggal_lahir" type="date" class="form-control mb-3 flatpickr-no-config" placeholder="Select date..">
                    </div>
                    <label for="alamat">Alamat</label>
                    <div class="form-group">
                        <input id="alamat" name="alamat" placeholder="Alamat" class="form-control">
                    </div>
                    <label for="NoHandphone">Nomor HP</label>
                    <div class="form-group">
                        <input id="NoHandphone" name="NoHandphone" placeholder="085**********" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button type="button" id="ketuart_store" class="btn btn-primary ms-1"
                        data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tambah</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let createModal = document.getElementById('createForm')
    createModal.addEventListener('show.bs.modal', function (event) {
        let button = event.relatedTarget
    });

    let storeButton =  document.getElementById('ketuart_store');
    storeButton.addEventListener('click', function(event){
        let url = "{{ route('admin.ketua_rt.store') }}";

        let new_data = {
            _method: 'POST', 
            rt: $('#rt').val(),
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
            // Add Data
            let idKetua = data.id;
            let newRow = `<tr data-bs-idketua="${idKetua}">
                <td>${idKetua}</td>
                <td>${new_data.Nama}</td>
                <td>${new_data.tempat_lahir}, ${new_data.tanggal_lahir}</td>
                <td>${new_data.Alamat}</td>
                <td>${new_data.NoHandphone}</td>
                <td>
                    <button type="button" class="btn btn-icon rounded-circle btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updateForm" data-bs-idketua="${idKetua}">
                        <i data-feather="edit-2" class="font-medium-3"></i>
                    </button>
                    <button type="button" class="btn btn-icon rounded-circle btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteForm" data-bs-idketua="${idKetua}">
                        <i data-feather="trash" class="font-medium-3"></i>
                    </button>
                </td>
            </tr>`;
            $('#table-ketua-rt tbody').append(newRow);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    });
</script>