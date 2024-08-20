@extends('layouts.admin.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin')}}/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" crossorigin href="{{ asset('assets/admin')}}/compiled/css/table-datatable-jquery.css">
<link rel="stylesheet" href="{{ asset('assets/admin')}}/extensions/flatpickr/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
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
                <h3>Tentang Kami</h3>
                {{-- <p class="text-subtitle text-muted">Struktur Organisasi</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Struktur Organisasi</h4>
            </div>
            <div class="card-body">
                <!-- Display Periode Awal -->
                <p><strong>Periode Awal:</strong> {{ $struktur_organisasi->periode_awal }}</p>
                
                <!-- Display Periode Akhir -->
                <p><strong>Periode Akhir:</strong> {{ $struktur_organisasi->periode_akhir }}</p>
                
                <!-- Display Image -->
                @if ($struktur_organisasi->image)
                    <p><strong>Image:</strong></p>
                    <img src="{{ Storage::url($struktur_organisasi->image) }}" alt="Struktur Organisasi Image" class="img-fluid" style="max-width: 100%; height: auto;">
                @else
                    <p>No image available</p>
                @endif

                <!-- Add the Edit Button -->
            </div>
            <div>
            <a href="{{ route('admin.struktur_organisasi.edit', $struktur_organisasi->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </section>
@endsection  <!-- Basic Tables end -->


@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/jquery/jquery.min.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/admin')}}/static/js/pages/datatables.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/flatpickr/flatpickr.min.js"></script>
<script src="{{ asset('assets/admin')}}/static/js/pages/date-picker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endsection
