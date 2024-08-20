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
                <h4 class="card-title">Perangkat Desa</h4>
            </div>
            <div class="card-body">
                <form id="postForm">
                    @csrf
                    @method('PUT')

                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" value="{{ old('Nama', $perangkat_desa->Nama) }}" required><br><br>

                    <label for="jabatan">Jabatan:</label>
                    <input type="text" id="jabatan" name="jabatan" value="{{ old('Jabatan', $perangkat_desa->Jabatan) }}" required><br><br>

                    <label for="image">Foto Perangkat Desa:</label><br>
                    @if ($perangkat_desa->image)
                        <img src="{{ Storage::url($perangkat_desa->image) }}" alt="Perangkat Desa Image" class="img-fluid" style="max-width: 100%; height: auto;"><br><br>
                    @endif
                    <input type="file" id="image" name="image"><br><br>
                    
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
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
document.getElementById('updateButton').addEventListener('click', function() {
    // axios post data with jquery

    const nama = $('#nama').val();
    const jabatan = $('#jabatan').val();

    const formData = new FormData();
    formData.append('Nama', nama);
    formData.append('Jabatan', jabatan);
    
    if($('#image')[0].files[0] ) {
        formData.append('image', $('#image')[0].files[0]);
    }
    
    formData.append('_method', 'PATCH');

    const id = "{{ $perangkat_desa->id }}"; // ID VisiMisi yang sedang diedit

    axios.post(`/admin/perangkat_desa/${id}`, formData, {
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
