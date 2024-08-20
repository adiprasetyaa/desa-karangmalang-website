@extends('layouts.admin.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<!-- Tambahkan SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
                <h3>Detail Tentang Kami</h3>
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
            <h4 class="card-title">Tentang Kami</h4>
        </div>
        <div class="card-body">
            <form id="postForm">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <textarea class="form-control" id="description" name="description" rows="5" required>{{ $tentang_kami->description }}</textarea>
                </div>
                
                <div class="form-group mt-3">
                    <button type="button" class="btn btn-primary" id="submitButton">Edit Tentang Kami</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- Tambahkan SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script>
$('#submitButton').click(function() {
    axios.put('/admin/tentang_kami/{{ $tentang_kami->id }}', {
        description: $('#description').val(),
    })
    .then(function(response) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: response.data.message,
        });
    })
    .catch(function(error) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Failed to update Tentang Kami',
        });
    });
});
</script>

@endsection
