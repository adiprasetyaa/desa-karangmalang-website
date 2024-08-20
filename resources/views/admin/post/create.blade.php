@extends('layouts.admin.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/admin')}}/extensions/choices.js/public/assets/styles/choices.css">
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
                <h3>Postingan</h3>
                {{-- <p class="text-subtitle text-muted">Halaman untuk membuat postingan</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post</li>
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
                <h4 class="card-title">Judul Post</h4>
            </div>
            <div class="card-body">
                <form id="postForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul Postingan</label>
                        <input id="title" type="text" name="title" class="form-control" required placeholder="Judul Postingan">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="image">Gambar Utama</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="editor">Konten</label>
                        <div id="editor">
                            <p>Desa Karangmalang, Masaran, Sragen</p>
                        </div>
                    </div>
                    <input type="hidden" name="content" id="content">
                    <br>    
                    <div class="form-group">
                        <label for="categories">Kategori</label>
                        <div class="col-md-6 mb-4">
                            <select id="categories" name="category_ids[]" class="choices form-select multiple-remove" multiple="multiple">
                                <optgroup label="Kategori">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <!-- <div class="col-md-6 mb-4">
                            <input type="text" class="form-control" id="new_category" placeholder="New Category">
                            <button type="button" class="btn btn-primary" id="add_category_button">Add Category</button><br><br>
                        </div> -->
                    </div>
            
                

                  

                    <button type="button" class="btn btn-primary" id="submitPostButton">Create Post</button>
                </form>
               
            </div>
        </div>
    </section>
@endsection

@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script src="{{ asset('assets/admin')}}/static/js/pages/form-element-select.js"></script>
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

  ['table'],
  ['clean']                                         // remove formatting button
];

const quill = new Quill('#editor', {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow'
});
document.getElementById('submitPostButton').addEventListener('click', function() {
    // axios post data with jquery

    const title = $('#title').val();
    const content = quill.getContents();

    const formData = new FormData();
    formData.append('title', title);
    formData.append('content', JSON.stringify(content));
    // selected categories





    if($('#image')[0].files[0] ) {
        formData.append('image', $('#image')[0].files[0]);
    }

    formData.append('category_ids', $('#categories').val());

    axios.post('/admin/post', formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then(response => {
        showToast('success', response.data.message);
        console.log(response);

        // if success, redirect to post index
        window.location.href = '/admin/post';
    }).catch(error => {
        console.log(error);
        showToast('error', error.response.data.message);
    });

});
</script>

@endsection
