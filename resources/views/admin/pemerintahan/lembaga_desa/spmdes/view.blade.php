@extends('layouts.admin.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin')}}/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" crossorigin href="{{ asset('assets/admin')}}/compiled/css/table-datatable-jquery.css">
@endsection

@section('heading')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Standar Pelayanan Minimal Desa (SPMDES)</h3>
                {{-- <p class="text-subtitle text-muted">Data SPMDES</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">SPMDES</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                        Data SPMDES
                    </h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        Tambah Data SPMDES
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table-spmdes">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
@include('admin.pemerintahan.lembaga_desa.spmdes.modal.create')     
@include('admin.pemerintahan.lembaga_desa.spmdes.modal.update')     
@include('admin.pemerintahan.lembaga_desa.spmdes.modal.delete') 


@endsection

@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>


<script>
    const table = new DataTable('#table-spmdes');

    const url_index = `{{ route('admin.api.spmdes.index') }}`;
    const url_show = (id) => `{{ route('admin.api.spmdes.show', ':id') }}`.replace(':id', id);
    const url_store = `{{ route('admin.api.spmdes.store') }}`;
    const url_update = (id) => `{{ route('admin.api.spmdes.update', ':id') }}`.replace(':id', id);
    const url_destroy = (id) => `{{ route('admin.api.spmdes.destroy', ':id') }}`.replace(':id', id);

    // button markup

    function rowData(spmdes) {
        return [
            spmdes.id,
            spmdes.Nama,
            spmdes.Jabatan,
            `
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-idspmdes="${spmdes.id}" data-bs-target="#editModal">
                Edit
            </button>
            <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                data-bs-target="#deleteModal" data-bs-idspmdes="${spmdes.id}">
                Hapus
            </button>
            `
        ];
    }

    function addNewRow(newData) {
        table.row.add(rowData(newData)).draw(false);
    }

    function updateRow(rowIndex, newData) {
        table.row(rowIndex).data(rowData(newData)).draw(false);
    }

    function fetchIndex() {
        $.ajax({
            url: url_index,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Content-Type': 'application/json',
            },
            success: function(response) {
                if (!response.success) {
                    showToast('error', response.message);
                    throw new Error('Network response was not ok: ' + response.message);
                }
                response.data.forEach(datum => {
                    addNewRow(datum);
                });
            },
            error: function(error) {
                console.error('Error:', error);
                showToast('error', "Gagal mendapatkan semua data");
            }
        });
    }
</script>

{{-- CREATE --}}
<script>
    const createModal = document.getElementById('createModal')
    const storeButton =  document.getElementById('createForm-store');

    const createForm = {
        Nama: $('#createForm-Nama'),
        Jabatan: $('#createForm-Jabatan'),
    };

    $('#createModal').on('hidden.bs.modal', function (e) {
        Object.keys(createForm).forEach(key => {
            createForm[key].val('');
        });
    });

    createModal.addEventListener('show.bs.modal', function (event) {
        let button = event.relatedTarget
    });

    storeButton.addEventListener('click', function(event){
        const createFormData = Object.keys(createForm).reduce((acc, key) => {
            acc[key] = createForm[key].val();
            return acc;
        }, {});

        const new_data = {
            _method: 'POST', 
            ...createFormData
        };

        $.ajax(url_store, {
            method: 'POST',
            headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Content-Type': 'application/json',
                },
            data: JSON.stringify(new_data),
            success: function(response) {
                if (!response.success) {
                    showToast('error', response.message);
                    throw new Error('Network response was not ok: ' + response.message);
                }

                new_data.id = response.data.id;
                
                addNewRow(new_data);
                showToast('success', response.message);
            },
            error: function(error) {
                console.error('Error:', error);
                if (error.responseJSON.errors) {
                    showToast('error', "Gagal menambahkan data: Pastikan semua bagian terisi");
                } else {
                    showToast('error', error.message);
                }
            }
        });
    });
</script>


{{-- READ --}}
<script> 
    fetchIndex();
</script>

{{-- UPDATE --}}
<script>
    const editModal = document.getElementById('editModal')
    const updateButton =  document.getElementById('editForm-update');

    const editForm = {
        Nama: $('#editForm-Nama'),
        Jabatan: $('#editForm-Jabatan'),
    };

    $('#editForm').on('hidden.bs.modal', function (e) {
        Object.keys(editForm).forEach(key => {
            editForm[key].val('');
        });
    });

    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget
        const id = button.getAttribute('data-bs-idspmdes');
        const rowIndex = table.row(button.closest('tr')).index();
        updateButton.setAttribute('data-bs-rowIndex', rowIndex);
        updateButton.setAttribute('data-bs-idspmdes', id);

        $.ajax({
            url: url_show(id),
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Content-Type': 'application/json',
            },
            success: function(response) {
                if (!response.success) {
                    showToast('error', response.message);
                    throw new Error('Network response was not ok: ' + response.message);
                }
                data = response.data;
                // $('#myModalLabel33').text(`Data Ketua ${data.rt}`);

                Object.keys(editForm).forEach(key => {
                    editForm[key].val(data[key]);
                });

            },
            error: function(error) {
                console.error('Error:', error);
                showToast('error', "Gagal mendapatkan data");
            }
        });
    });

    updateButton.addEventListener('click', function (event) {
        const id = updateButton.getAttribute('data-bs-idspmdes');
        const rowIndex = updateButton.getAttribute('data-bs-rowIndex');
        const url = url_update(id);

        const editFormData = Object.keys(editForm).reduce((acc, key) => {
            acc[key] = editForm[key].val();
            return acc;
        }, {});

        const new_data = {
            _method: 'PATCH', 
            id: id,
            ...editFormData
        };


        $.ajax(url, {
            method: 'POST',
            headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Content-Type': 'application/json',
                },
            data: JSON.stringify(new_data),
            success: function(response) {
                if (!response.success) {
                    showToast('error', response.message);
                    throw new Error('Network response was not ok: ' + response.message);
                }

                new_data.ttl = TTL(new_data.tempat_lahir, new_data.tanggal_lahir);
                updateRow(rowIndex, new_data);

                showToast('success', response.message);
                window.location.reload(); // Reload the page after success

            },
            error: function(error) {
                console.error('Error:', error);
                if (error.responseJSON.errors) {
                    showToast('error', "Gagal mengubah data");
                } else {
                    showToast('error', error.message);
                }
            }
        });
    });
</script>

{{-- DELETE --}}
<script>
    const destroyButton = document.getElementById('destroyButton');
    const deleteModal = document.getElementById('deleteModal');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget
        const idspmdes = button.getAttribute('data-bs-idspmdes');

        destroyButton.setAttribute('data-bs-idspmdes', idspmdes);
        console.log('del:', idspmdes);
    });

    destroyButton.addEventListener('click', function (event) {
        const idspmdes = this.getAttribute('data-bs-idspmdes');
        const url = url_destroy(idspmdes);

        $.ajax(url, {
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'DELETE'
            },
            success: function (response) {
                table.row($(`button[data-bs-idspmdes="${idspmdes}"]`).parents('tr')).remove().draw(false);
                showToast('success', response.message);
            },
            error: function (error) {
                console.error('Error:', error);
                showToast('error', "Gagal menghapus data");
            }
        });
    });
</script>


@endsection
