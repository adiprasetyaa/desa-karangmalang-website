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
                    <h3>Edit Visi Misi</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Visi Misi</li>
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
                <h4 class="card-title">Edit Visi dan Misi</h4>
            </div>
            <div class="card-body">
                <form id="editForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <label for="visi">Visi:</label>
                    <div id="editorVisi"></div>
                    <input type="hidden" name="visi" id="visi">
                    <br><br>

                    <label for="misi">Misi:</label>
                    <div id="editorMisi"></div>
                    <input type="hidden" name="misi" id="misi">
                    <br><br>
                    
                    <button type="button" id="updateVisiMisiButton" class="btn btn-primary">Update Visi Misi</button>
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
            [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }],
            [{ 'direction': 'rtl' }],
            ['link', 'image', 'video', 'formula'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'align': [] }],
            ['clean']
        ];

        const visiQuill = new Quill('#editorVisi', {
            modules: { toolbar: toolbarOptions },
            theme: 'snow'
        });

        const misiQuill = new Quill('#editorMisi', {
            modules: { toolbar: toolbarOptions },
            theme: 'snow'
        });

        // Set initial content
        const visi = {!! json_encode($visimisi->visi) !!}; 
        visiQuill.setContents(JSON.parse(visi));

        const misi = {!! json_encode($visimisi->misi) !!}; 
        misiQuill.setContents(JSON.parse(misi));

        document.getElementById('updateVisiMisiButton').addEventListener('click', function() {
            const contentVisi = visiQuill.getContents();
            const contentMisi = misiQuill.getContents();

            const formData = new FormData();
            formData.append('visi', JSON.stringify(contentVisi));
            formData.append('misi', JSON.stringify(contentMisi));
            formData.append('_method', 'PATCH');

            const id = "{{ $visimisi->id }}";

            axios.post(`/admin/visimisi/${id}`, formData, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
            .then(response => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.data.message,
                });
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Failed to update Visi Misi',
                });
            });
        });
    </script>
@endsection
