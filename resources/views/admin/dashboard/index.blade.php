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
    <h3>Profile Statistics</h3>
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

@section('javscript')
<script src="{{ asset('assets/admin') }}/extensions/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('assets/admin') }}/static/js/pages/dashboard.js"></script>
@endsection
