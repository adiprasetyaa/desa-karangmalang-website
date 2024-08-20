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
                <h4 class="card-title">Edit Gallery</h4>
            </div>
            <div class="card-body">
                <form id="postForm" action="{{ route('admin.gallery.update', $galleries->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul:</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $galleries->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <p class="text-muted mt-2">Foto sebelumnya: {{ $galleries->title }}</p>
                        <img src="{{ Storage::url($galleries->image) }}" alt="{{ $galleries->title }}" style="max-width: 720px; height: auto;" class="img-thumbnail"><br><br>
                        <label for="image" class="form-label">Foto yang akan diunggah:</label>
                        <input type="file" id="image" name="image" class="form-control mt-2">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Foto</button>
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
document.getElementById('submitButton').addEventListener('click', function() {
    // axios post data with jquery

    const title = $('#title').val();

    const formData = new FormData();
    formData.append('title', title);
    formData.append('_method', 'PATCH');

    if($('#image')[0].files[0] ) {
        formData.append('image', $('#image')[0].files[0]);
    }

    const id = "{{ $galleries->id}};"

    axios.post(`/admin/gallery/${id}`, formData, {
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
