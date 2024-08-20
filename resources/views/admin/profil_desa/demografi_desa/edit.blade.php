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
                <h3>Edit Demografi Desa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Demografi Desa</li>
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
            <h4 class="card-title">Detail Demografi Desa</h4>
        </div>
        <div class="card-body">
            <form id="editForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Create the editor container -->
                <div id="editor"></div>
                <input type="hidden" name="description" id="description"><br>

                <button type="button" id="updateButton" class="btn btn-primary" style="width: 200px;">Update Data</button>
            </form>
        </div>
    </div>
</section>
@endsection

@section('javascript')
<script src="{{ asset('assets/admin/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- Tambahkan SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script>
const toolbarOptions = [
    [{ 'font': [] }],
    [{ 'size': ['small', false, 'large', 'huge'] }],
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    ['bold', 'italic', 'underline', 'strike'],
    ['blockquote', 'code-block'],
    [{ 'header': 1 }, { 'header': 2 }],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],
    [{ 'indent': '-1'}, { 'indent': '+1' }],
    [{ 'direction': 'rtl' }],
    ['link', 'image', 'video', 'formula'],
    [{ 'color': [] }, { 'background': [] }],
    [{ 'align': [] }],
    ['clean']
];

const quill = new Quill('#editor', {
    modules: { toolbar: toolbarOptions },
    theme: 'snow'
});

const desc = {!! json_encode($demografi_desa->description) !!};
quill.setContents(JSON.parse(desc));

document.getElementById('updateButton').addEventListener('click', function() {
    const content = quill.getContents();
    
    const formData = new FormData();
    formData.append('description', JSON.stringify(content));
    formData.append('_method', 'PATCH');

    const id = "{{ $demografi_desa->id }}"; // ID Demografi Desa yang sedang diedit

    axios.post(`/admin/demografi_desa/${id}`, formData, {
        headers: {
            'Content-Type': 'multipart/form-data',
        }
    }).then(response => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Demografi Desa berhasil diperbarui.',
        });
    }).catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Gagal memperbarui Demografi Desa.',
        });
    });
});
</script>
@endsection
