@extends('layouts.admin.app')

@section('css')
    <link rel="stylesheet" crossorigin href="{{ asset('assets/admin') }}/compiled/css/iconly.css">
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
                <h3>Dashboard</h3>
                {{-- <p class="text-subtitle text-muted">A page to show organized information to admin.</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Any</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <section class="row">
        <div class="col-12 col-lg-9">
            
        </div>
        <div class="col-12 col-lg-3">
            
        </div>
    </section>
@endsection

@section('javascript')
<script src="{{ asset('assets/admin') }}/extensions/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('assets/admin') }}/static/js/pages/dashboard.js"></script>
@endsection
