@extends('layouts.admin.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
                <h3>Menambahkan Foto</h3>
                {{-- <p class="text-subtitle text-muted">Halaman untuk menambahkan Layanan Publik</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Galeri</li>
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
            <h4 class="card-title">Detail Foto</h4>
        </div>
        <div class="card-body">
            <form id="postForm" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Judul:</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="image">Foto yang akan diunggah:</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>

                <button type="button" id="submitButton" class="btn btn-primary mt-3">Tambahkan Foto</button>
            </form>
        </div>
    </div>
</section>
@endsection

@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
document.getElementById('submitButton').addEventListener('click', function() {
    const title = $('#title').val();
    const formData = new FormData();
    formData.append('title', title);

    if ($('#image')[0].files[0]) {
        formData.append('image', $('#image')[0].files[0]);
    }

    axios.post('/admin/gallery', formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then(response => {
        if (response.data.status_code === 200) {
            toastr.success(response.data.message, 'Success');
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            toastr.success(response.data.message, 'Success');
        }
    }).catch(error => {
        toastr.error('Terjadi kesalahan saat mengunggah foto.', 'Error');
        console.log(error);
    });
});
</script>
@endsection
