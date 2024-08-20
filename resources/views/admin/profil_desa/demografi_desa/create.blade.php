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
                <h3>Info Demografi</h3>
                {{-- <p class="text-subtitle text-muted">Halaman untuk membuat Info Demografi</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Info Demografi</li>
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
                <h4 class="card-title">Info Demografi</h4>
            </div>
            <div class="card-body">
                <form id="postForm" enctype="multipart/form-data">
                    @csrf
                    
                    <label for="deskripsi">Deskripsi:</label>
                    <!-- Create the editor container -->
                    <div id="editor">
                        <p>ini Deskripsi Sementara</p>
                    </div>
                    <input type="hidden" name="deskripsi" id="deskripsi"><br><br>

                    <button type="button" id="submitInfoDemografiButton">Tambah Info Demografi</button>
                </form>
               
            </div>
        </div>
    </section>
@endsection

@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- <script src="{{ asset('assets/admin')}}/static/js/pages/quill.js"></script> -->
<script>


</script>
<script>
const toolbarOptions = [
    [{ 'font': [] }],
    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],
  
  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction
  ['link', 'image', 'video', 'formula'],


  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];

const quillInfoDemografi = new Quill('#editor', {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow'
});


document.getElementById('submitInfoDemografiButton').addEventListener('click', function() {
    // axios post data with jquery

    const content = quillInfoDemografi.getContents();

    const formData = new FormData();
    formData.append('description', JSON.stringify(content));

    axios.post('/admin/demografi_desa', formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then(response => {
        console.log(response);
    }).catch(error => {
        console.log(error);
    });

});
</script>

@endsection
