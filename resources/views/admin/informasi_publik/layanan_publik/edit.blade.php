@extends('layouts.admin.app')

@section('css')
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
                <h3>Edit Layanan Publik</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Layanan Publik</li>
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
                <h4 class="card-title">Edit Layanan Publik</h4>
            </div>
            <div class="card-body">
                <form id="editForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label for="nama_layanan">Nama Layanan:</label>
                    <div class="form-group">
                    <textarea class="form-control" id="nama_layanan" name="nama_layanan" rows="2" required>{{ $layanan_publik->nama_layanan }}</textarea>
                    </div>
                    
                    <label for="deskripsi_layanan">Deskripsi Layanan:</label>
                    <!-- Create the editor container -->
                    <div id="editorDeskripsiLayanan">
                    </div>
                    <input type="hidden" name="deskripsi_layanan" id="dekripsi_layanan"><br><br>

                    <label for="misi">Persyaratan:</label>
                    <!-- Create the editor container -->
                    <div id="editorPersyaratan">
                    </div>
                    <input type="hidden" name="persyaratan" id="persyaratan"><br><br>
                    
                    <button type="button" id="updateLayananPublikButton">Update Layanan Publik</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

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

const quillDeskripsiLayanan = new Quill('#editorDeskripsiLayanan', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow'
});

const quillPersyaratan = new Quill('#editorPersyaratan', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow'
});

const deskripsi_layanan = {!! $layanan_publik->deskripsi_layanan !!}; 
quillDeskripsiLayanan.setContents(deskripsi_layanan);

const persyaratan = {!! $layanan_publik->persyaratan !!}; 
quillPersyaratan.setContents(persyaratan);


$('#semantichtmlDeskripsiLayanan').html(quillDeskripsiLayanan.getSemanticHTML());
$('#semantichtmlPersyaratan').html(quillPersyaratan.getSemanticHTML());

document.getElementById('updateLayananPublikButton').addEventListener('click', function() {
    const contentDeskripsiLayanan = quillDeskripsiLayanan.getContents();
    const contentPersyaratan = quillPersyaratan.getContents();
    const namaLayanan = $('#nama_layanan').val();

        // Debugging: Print the contents to the console
        console.log("Content Deskripsi Layanan:", contentDeskripsiLayanan);
    console.log("Content Persyaratan:", contentPersyaratan);

    const formData = new FormData();
    formData.append('nama_layanan', namaLayanan);
    formData.append('deskripsi_layanan', JSON.stringify(contentDeskripsiLayanan));
    formData.append('persyaratan', JSON.stringify(contentPersyaratan));
    formData.append('_method', 'PATCH');

    const id = "{{ $layanan_publik->id }}"; // ID VisiMisi yang sedang diedit

    axios.post(`/admin/layanan_publik/${id}`, formData, {
        headers: {
            'Content-Type': 'multipart/form-data',
        }
    }).then(response => {
        console.log(response);
    }).catch(error => {
        console.log(error.response.data);
    });
});
</script>

@endsection
