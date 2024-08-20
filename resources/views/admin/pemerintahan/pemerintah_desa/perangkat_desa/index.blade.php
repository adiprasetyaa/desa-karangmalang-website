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
                <h3>Informasi Publik</h3>
                {{-- <p class="text-subtitle text-muted">Layanan Publik</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Layanan Publik</li>
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
                        Perangkat Desa
                    </h5>
                    <a href="{{ route('admin.perangkat_desa.create') }}" class="btn btn-primary" >
                        Tambah Perangkat Desa
                    </a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perangkat_desa as $perangkat)
                                <tr data-bs-idpost="{{ $perangkat->id }}">
                                    <td>{{ $perangkat->Nama }}</td>
                                    <td>{{ $perangkat->Jabatan}}</td>
                                    <td>
                                        <a href="{{ route('admin.perangkat_desa.show', $perangkat->id) }}" class="btn btn-outline-primary">
                                            Lihat
                                        </a>
                                        <a href="{{ route('admin.perangkat_desa.edit', $perangkat->id) }}" class="btn btn-outline-primary">
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-bs-idperangkatdesa="{{ $perangkat->id }}">
                                            Hapus (Belum berfungsi)
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


@endsection


@include('admin.informasi_publik.layanan_publik.delete')

@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/jquery/jquery.min.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/admin')}}/static/js/pages/datatables.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/flatpickr/flatpickr.min.js"></script>
<script src="{{ asset('assets/admin')}}/static/js/pages/date-picker.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Event listener untuk button hapus
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);  // Button yang meng-trigger modal
            var id = button.data('bs-idperangkatdesa');    // Ambil data-id dari button
            var action = "{{ url('admin/perangkat_desa') }}/" + id; // Generate URL

            // Set form action untuk delete
            var modal = $(this);
            modal.find('#deleteForm').attr('action', action);
        });
    });
</script>

@endsection
