@extends('layouts.admin.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin')}}/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" crossorigin href="{{ asset('assets/admin')}}/compiled/css/table-datatable-jquery.css">
<link rel="stylesheet" href="{{ asset('assets/admin')}}/extensions/flatpickr/flatpickr.min.css">
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
                <h3>Postingan</h3>
                {{-- <p class="text-subtitle text-muted">Postingan</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Postingan</li>
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
                {{-- div with flex justify --}}
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                        Postingan
                    </h5>
                    <a href="{{ route('admin.post.create') }}" class="btn btn-primary" >
                        Buat Posting
                    </a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr data-bs-idpost="{{ $post->id }}">
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-outline-primary">
                                            Lihat
                                        </a>
                                        <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-outline-primary" data-bs-target="#editForm">
                                            Edit  
                                        </a>

                                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-bs-idpost="{{ $post->id }}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->

@include('admin.post.modal.delete')
@endsection

@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/jquery/jquery.min.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/admin')}}/static/js/pages/datatables.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/flatpickr/flatpickr.min.js"></script>
<script src="{{ asset('assets/admin')}}/static/js/pages/date-picker.js"></script>
<script>

document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#tanggal_lahir", {
        dateFormat: "Y-m-d",
        defaultDate: new Date(),
        allowInput: true,
        onChange: function(selectedDates, dateStr, instance) {
            console.log(selectedDates, dateStr, instance);
        }
    });
});
</script>
<script>
    const destroyButton = document.getElementById('destroyButton');
    const deleteModal = document.getElementById('deleteModal');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget
        const idpost = button.getAttribute('data-bs-idpost');

        destroyButton.setAttribute('data-bs-idpost', idpost);
        console.log('del:', idpost);
    });

    destroyButton.addEventListener('click', function (event) {
        const idpost = this.getAttribute('data-bs-idpost');
        const url = `/admin/post/${idpost}`;

        $.ajax(url, {
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'DELETE'
            },
            success: function (response) {
                showToast('success', response.message);
                // timeout 2
                setTimeout(() => {
                    window.location.reload();
                }, 2000); 
                },
            error: function (error) {
                console.error('Error:', error);
                showToast('error', "Gagal menghapus data");
            }
        });
    });
</script>
@endsection
