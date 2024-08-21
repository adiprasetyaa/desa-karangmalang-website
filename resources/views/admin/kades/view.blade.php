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
                <h3>Kepala Desa Karangmalang</h3>
                {{-- <p class="text-subtitle text-muted">Data Kepala Desa</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kades</li>
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
                        Data Kades
                    </h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        Tambah Data Kades
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table-kades">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Periode<br>Menjabat</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor HP</th>
                                <th>Foto</th>
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
@include('admin.kades.modal.create')     
@include('admin.kades.modal.update')     
@include('admin.kades.modal.delete') 


@endsection

@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>


<script>
    const table = new DataTable('#table-kades');

    const url_index = `{{ route('admin.api.kades.index') }}`;
    const url_show = (id) => `{{ route('admin.api.kades.show', ':id') }}`.replace(':id', id);
    const url_store = `{{ route('admin.api.kades.store') }}`;
    const url_update = (id) => `{{ route('admin.api.kades.update', ':id') }}`.replace(':id', id);
    const url_destroy = (id) => `{{ route('admin.api.kades.destroy', ':id') }}`.replace(':id', id);

    // button markup

    function rowData(kades) {
        return [
            table.rows().count() + 1,
            `${(new Date(kades.period_start_at)).getFullYear()} - ${(new Date(kades.period_end_at)).getFullYear()}`,
            kades.name ? kades.name : '??????',
            kades.address ? kades.address : '-',
            kades.phone ? kades.phone : '-',
            kades.photo ? `<img src="/storage/${kades.photo}" alt="${kades.name}" style="width: 100px; height: 100px;">` : '',
            `
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-idkades="${kades.id}" data-bs-target="#editModal">
                Edit
            </button>
            <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                data-bs-target="#deleteModal" data-bs-idkades="${kades.id}">
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
                'Content-Type': 'multipart/form-data',
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

    // refetch index
    function refetchIndex() {
        table.clear().draw();
        fetchIndex();
    }
</script>
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     const photo = document.getElementById('photo');
    //     const modal = document.getElementById('photoModal');

    //     photo.addEventListener('click', function() {
    //         modal.show();
    //     });
    // });
    
</script>

{{-- CREATE --}}
<script>
    const createModal = document.getElementById('createModal')
    const storeButton =  document.getElementById('createForm-store');

    const createForm = {
        name: $('#createForm-name'),
        period_start_at: $('#createForm-period_start_at'),
        period_end_at: $('#createForm-period_end_at'),
        address: $('#createForm-address'),
        phone: $('#createForm-phone'),
        photo: $('#createForm-photo'),
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
        const createFormData = new FormData();

        Object.keys(createForm).forEach(key => {
            createFormData.append(key, createForm[key].val());
            console.log(key, createForm[key].val());
        });

        if (createForm.photo[0].files[0]) {
            createFormData.append('photo', createForm.photo[0].files[0]);
        }
        // loop and print all form
        for (var pair of createFormData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]);
        }



        $.ajax(url_store, {
            method: 'POST',
            headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            data: createFormData,
            processData: false, 
            contentType: false,
            success: function(response) {
                if (!response.success) {
                    showToast('error', response.message);
                    throw new Error('Network response was not ok: ' + response.message);
                }

                const data = response.data;
                
                addNewRow(data);
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
        name: $('#editForm-name'),
        period_start_at: $('#editForm-period_start_at'),
        period_end_at: $('#editForm-period_end_at'),
        address: $('#editForm-address'),
        phone: $('#editForm-phone'),
        photo: $('#editForm-photo'),
    };

    $('#editForm').on('hidden.bs.modal', function (e) {
        Object.keys(editForm).forEach(key => {
            editForm[key].val('');
        });
    });

    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget
        const id = button.getAttribute('data-bs-idkades');
        const rowIndex = table.row(button.closest('tr')).index();
        updateButton.setAttribute('data-bs-rowIndex', rowIndex);
        updateButton.setAttribute('data-bs-idkades', id);

        $.ajax({
            url: url_show(id),
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Content-Type': 'multipart/form-data',
            },
            success: function(response) {
                if (!response.success) {
                    showToast('error', response.message);
                    throw new Error('Network response was not ok: ' + response.message);
                }
                data = response.data;
                $('#myModalLabel33').text(`Data Kepala Desa Periode ${(new Date(data.period_start_at)).getFullYear()} - ${(new Date(data.period_end_at)).getFullYear()}`);

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
        const id = updateButton.getAttribute('data-bs-idkades');
        const rowIndex = updateButton.getAttribute('data-bs-rowIndex');
        const url = url_update(id);

        const editFormData = new FormData();

        Object.keys(editForm).forEach(key => {
            editFormData.append(key, editForm[key].val());
        });

        editFormData.append('id', id);
        editFormData.append('_method', 'PATCH');

        // if has photo
        if (editForm.photo[0].files[0]) {
            editFormData.append('photo', editForm.photo[0].files[0]);
        }
        
    

        $.ajax(url, {
            type: 'POST',
            headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
            data: editFormData,
            processData: false, 
            contentType: false,
            success: function(response) {
                if (!response.success) {
                    showToast('error', response.message);
                    throw new Error('Network response was not ok: ' + response.message);
                }

                // convert formdata to json
                const new_data = {};
                for (var pair of editFormData.entries()) {
                    new_data[pair[0]] = pair[1];
                }

                // new_data.ttl = TTL(new_data.tempat_lahir, new_data.tanggal_lahir);
                // updateRow(rowIndex, new_data);
                refetchIndex();
                showToast('success', response.message);
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
        const idkades = button.getAttribute('data-bs-idkades');

        destroyButton.setAttribute('data-bs-idkades', idkades);
        console.log('del:', idkades);
    });

    destroyButton.addEventListener('click', function (event) {
        const idkades = this.getAttribute('data-bs-idkades');
        const url = url_destroy(idkades);

        $.ajax(url, {
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'DELETE'
            },
            success: function (response) {
                table.row($(`button[data-bs-idkades="${idkades}"]`).parents('tr')).remove().draw(false);
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
