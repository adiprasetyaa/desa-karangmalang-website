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
                <h3>Edit Perangkat Desa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Perangkat Desa</li>
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
                <h4 class="card-title">Detail Perangkat Desa</h4>
            </div>
            <div class="card-body">
                <form id="postForm">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ old('Nama', $perangkat_desa->Nama) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan:</label>
                        <input type="text" id="jabatan" name="jabatan" class="form-control" value="{{ old('Jabatan', $perangkat_desa->Jabatan) }}" required>
                    </div>

                    <div class="form-group">
                        @if ($perangkat_desa->image)
                            <img src="{{ Storage::url($perangkat_desa->image) }}" alt="Perangkat Desa Image" class="img-fluid" style="max-width: 100%; height: auto;"><br><br>
                        @endif
                        <label for="image">Unggah Foto:</label>
                        <input id="image" name="image" class="form-control" type="file">
                    </div>
                    
                    <div class="form-group mt-3">
                        <button type="button" class="btn btn-primary" id="updateButton">Edit Data</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
document.getElementById('updateButton').addEventListener('click', function() {
    const nama = $('#nama').val();
    const jabatan = $('#jabatan').val();

    const formData = new FormData();
    formData.append('Nama', nama);
    formData.append('Jabatan', jabatan);
    
    if($('#image')[0].files[0]) {
        formData.append('image', $('#image')[0].files[0]);
    }
    
    formData.append('_method', 'PATCH');

    const id = "{{ $perangkat_desa->id }}"; // ID Perangkat Desa yang sedang diedit

    axios.post(`/admin/perangkat_desa/${id}`, formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then(response => {
        Swal.fire({
            title: 'Sukses!',
            text: 'Data Perangkat Desa berhasil diperbarui.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.reload(); // Memuat ulang halaman
        });
    }).catch(error => {
        Swal.fire({
            title: 'Gagal!',
            text: 'Terjadi kesalahan saat memperbarui data Perangkat Desa.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
});
</script>
@endsection
