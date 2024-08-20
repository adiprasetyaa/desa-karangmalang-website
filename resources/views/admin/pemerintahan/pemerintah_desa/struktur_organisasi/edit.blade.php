@extends('layouts.admin.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
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
                <h3>Edit Struktur Organisasi</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Struktur Organisasi</li>
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
            <form id="postForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="periode_awal">Periode Awal:</label>
                    <input type="text" id="periode_awal" name="periode_awal" class="form-control" value="{{ old('periode_awal', $struktur_organisasi->periode_awal) }}" required>
                </div>
                
                <div class="form-group mt-3">
                    <label for="periode_akhir">Periode Akhir:</label>
                    <input type="text" id="periode_akhir" name="periode_akhir" class="form-control" value="{{ old('periode_akhir', $struktur_organisasi->periode_akhir) }}" required>
                </div>
                
                <div class="form-group mt-3">
                    <label for="image">Foto Struktur Organisasi Sebelumnya:</label><br><br>
                    @if ($struktur_organisasi->image)
                        <img src="{{ Storage::url($struktur_organisasi->image) }}" alt="Struktur Organisasi Image" class="img-fluid" style="max-width: 100%; height: auto;"><br><br>
                    @endif
                </div>

                <div class="form-group mt-3">
                    <label for="image">Unggah Foto Struktur Organisasi Terbaru:</label>
                    <input id="image" name="image" class="form-control" type="file">
                </div>
                
                <div class="form-group mt-3">
                    <button type="button" class="btn btn-primary" id="updateButton" style="width:fit-content;">Update Struktur Organisasi</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('javascript')
<script src="{{ asset('assets/admin/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script>
document.getElementById('updateButton').addEventListener('click', function() {
    const formData = new FormData();
    formData.append('periode_awal', document.getElementById('periode_awal').value);
    formData.append('periode_akhir', document.getElementById('periode_akhir').value);

    const imageFile = document.getElementById('image').files[0];
    if (imageFile) {
        formData.append('image', imageFile);
    }

    formData.append('_method', 'PATCH');

    const id = "{{ $struktur_organisasi->id }}";

    axios.post(`/admin/struktur_organisasi/${id}`, formData, {
        headers: {
            'Content-Type': 'multipart/form-data',
        }
    }).then(response => {
        Swal.fire({
            title: 'Sukses!',
            text: 'Struktur Organisasi berhasil diperbarui.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.reload(); // Memuat ulang halaman
        });
    }).catch(error => {
        Swal.fire({
            title: 'Gagal!',
            text: 'Terjadi kesalahan saat memperbarui Struktur Organisasi.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
});
</script>
@endsection
