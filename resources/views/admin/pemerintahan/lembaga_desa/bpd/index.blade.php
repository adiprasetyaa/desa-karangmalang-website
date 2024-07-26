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
                <h3>Badan Permusyawaratan Desa (BPD)</h3>
                {{-- <p class="text-subtitle text-muted">Data BPD</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">BPD</li>
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
                <h5 class="card-title">
                    Data BPD
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bpd as $bpd_data)
                                <tr data-bs-idbpd="{{ $bpd_data->id }}">
                                    <td>{{ $bpd_data->Nama }}</td>
                                    <td>{{ $bpd_data->Jabatan }}</td>
                                    <td>{{ $bpd_data->Alamat }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-idbpd="{{ $bpd_data->id }}" data-bs-target="#editForm">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-bs-idbpd="{{ $bpd_data->id }}">
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
@endsection

@include('admin.pemerintahan.lembaga_desa.bpd.modal.update')
@include('admin.pemerintahan.lembaga_desa.bpd.modal.delete')

@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/jquery/jquery.min.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/admin')}}/static/js/pages/datatables.js"></script>
@endsection
