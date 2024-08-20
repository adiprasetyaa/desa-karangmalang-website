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
                <div class="form-group">
                    <label for="image">Gambar</label>
                    @if($post->image)
                    <br>
                    <img src="{{ asset('storage/'.$post->image) }}" alt="" class="img-fluid" style="width: 500px; height: auto;">
                    <br>
                    @endif
                </div>
                <br>
                <label for="editor">Konten</label>
                <div class="hide" hidden>
                    <div id="editor" hidden>

                    </div>
                </div>
                <div id="semantichtml" class="quill-content">
                </div>
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
const quill = new Quill('#editor', {
  theme: 'snow',
  readOnly: true,
});

const rapikanwkwkw = JSON.parse({!! json_encode($post->content) !!}); 
quill.setContents(rapikanwkwkw);

// Render the content in a new Quill instance for display
const renderedQuill = new Quill('#semantichtml', {
  theme: 'snow',
  readOnly: true,
  modules: {
    toolbar: false  // Disable the toolbar for the rendered content
  }
});

renderedQuill.setContents(quill.getContents());
</script>


@endsection
