@extends('layouts.admin.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin')}}/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" crossorigin href="{{ asset('assets/admin')}}/compiled/css/table-datatable-jquery.css">
<link rel="stylesheet" href="{{ asset('assets/admin')}}/extensions/flatpickr/flatpickr.min.css">
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
                <h3>Geografis Desa</h3>
                {{-- <p class="text-subtitle text-muted">Geografis Desa</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Geografis Desa</li>
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
                <h4 class="card-title">Deskripsi Geografis Desa</h4>
            </div>
            <div class="card-body">
                <div class="hide" hidden>
                    <div id="editor" hidden>

                    </div>
                </div>
                <div id="semantichtml" class="ql-editor">
                </div>
            </div>
            <div class="card-body d-flex justify-content-end me-3 mb-3">

                 <!-- Add the Edit Button -->
                 <a href="{{ route('admin.geografis_desa.edit', $geografis_desa->id) }}" class="btn btn-primary" style="width: 200px;">Edit Data</a>
            </div>
        </div>
    </section>
@endsection    <!-- Basic Tables end -->


@section('javascript')
<script src="{{ asset('assets/admin')}}/extensions/jquery/jquery.min.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/admin')}}/static/js/pages/datatables.js"></script>
<script src="{{ asset('assets/admin')}}/extensions/flatpickr/flatpickr.min.js"></script>
<script src="{{ asset('assets/admin')}}/static/js/pages/date-picker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>

const quill = new Quill('#editor', {
 
  theme: 'snow',
  readOnly: true,  // Set to read-only mode
});



const desc = {!! $geografis_desa->description !!}; 
quill.setContents(desc);




$('#semantichtml').html(quill.getSemanticHTML());
</script>

@endsection
