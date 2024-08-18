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
                    <!-- Create the editor container -->
                    <div id="editorVisi">
                    </div>
                    <input type="hidden" name="visi" id="visi"><br><br>

                    <label for="misi">Misi:</label>
                    <!-- Create the editor container -->
                    <div id="editorMisi">
                    </div>
                    <input type="hidden" name="misi" id="misi"><br><br>
                    
                    <button type="button" id="updateVisiMisiButton">Update VisiMisi</button>
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

const visiQuill = new Quill('#editorVisi', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow'
});

const misiQuill = new Quill('#editorMisi', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow'
});

const visi = {!! $visimisi->visi !!}; 
visiQuill.setContents(visi);

const misi = {!! $visimisi->misi !!}; 
misiQuill.setContents(misi);


$('#semantichtmlVisi').html(visiQuill.getSemanticHTML());
$('#semantichtmlMisi').html(misiQuill.getSemanticHTML());

document.getElementById('updateVisiMisiButton').addEventListener('click', function() {
    const contentVisi = visiQuill.getContents();
    const contentMisi = misiQuill.getContents();

        // Debugging: Print the contents to the console
        console.log("Content Visi:", contentVisi);
    console.log("Content Misi:", contentMisi);

    const formData = new FormData();
    formData.append('visi', JSON.stringify(contentVisi));
    formData.append('misi', JSON.stringify(contentMisi));
    formData.append('_method', 'PATCH');

    const id = "{{ $visimisi->id }}"; // ID VisiMisi yang sedang diedit

    axios.post(`/admin/visimisi/${id}`, formData, {
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
