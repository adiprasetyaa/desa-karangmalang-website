@extends('layouts.admin.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin')}}/extensions/quill/quill.snow.css">
<link rel="stylesheet" href="{{ asset('assets/admin')}}/extensions/quill/quill.bubble.css">
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
                <h4 class="card-title">{{ $post->title }}</h4>
            </div>
            <div class="card-body">

                    <div id="postcontent">
                        {!! $post->content !!}
                    </div>
                    
               
            </div>
        </div>
    </section>
@endsection

@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/jquery/jquery.min.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/quill/quill.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- <script src="{{ asset('assets/admin')}}/static/js/pages/quill.js"></script> -->
<script>


</script>
<script>
let quill = new Quill("#full", {
  bounds: "#full-container .editor",
  modules: {
    toolbar: [
      [{ font: [] }, { size: [] }],
      ["bold", "italic", "underline", "strike"],
      [{ color: [] }, { background: [] }],
      [{ script: "super" }, { script: "sub" }],
      [
        { list: "ordered" },
        { list: "bullet" },
        { indent: "-1" },
        { indent: "+1" },
      ],
      ["direction", { align: [] }],
      ["link", "image", "video"],
      ["clean"],
    ],
  },
  theme: "snow",
});

document.getElementById('submitPostButton').addEventListener('click', function() {
    var form = document.getElementById('postForm');
    var formData = new FormData(form);
    formData.set('content', quill.root.innerHTML);

    const url = "{{ route('admin.post.store') }}"
    axios.post(url, formData)
        .then(function (response) {
            if (response.data.success) {
                alert('Post created successfully');
            }
        })
        .catch(function (error) {
            console.log(error);
            alert('An error occurred while creating the post');
        });
});
</script>

@endsection
