{{-- @dd(asset('assets/guest/')) --}}
<!DOCTYPE html>
<html lang="en">

<head>

@include('layouts.guest.css')

</head>

<body>
    <!-- Preloader -->
    @include('layouts.guest.header')

    <!-- ##### Header Area Start ##### -->

    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/guest') }}/static/images/bg_hero/bg_hero_1.png);">
            <h2>LAYANAN PUBLIK</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Informasi Publik</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Layanan Publik</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

     <!-- ##### Portfolio Details Area Start ##### -->
     <section class="portfolio-details-area section-padding-0-100">
        <div class="container">
            @foreach($layanan_publik as $layanan)
                <div class="row">
                    <div class="col-12">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h4>{{ $layanan->nama_layanan }}</h4>
                        </div>
                    </div>
                </div>
                <div class="portfolio-text mb-100">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="card-body">
                                <h6>Deskripsi Layanan</h6>
                                <div class="hide" hidden>
                                    <div id="editorDescription_{{ $loop->index }}" hidden></div>
                                </div>
                                <div id="semantichtmlDescription_{{ $loop->index }}" class="ql-editor"></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="card-body">
                                <h6>Persyaratan Layanan</h6>
                                <div class="hide" hidden>
                                    <div id="editorPersyaratan_{{ $loop->index }}" hidden></div>
                                </div>
                                <div id="semantichtmlPersyaratan_{{ $loop->index }}" class="ql-editor"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- ##### Portfolio Details Area End ##### -->
    

    @include('layouts.guest.footer')


    @include('layouts.guest.js')

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <script>
    @foreach($layanan_publik as $layanan)
        const descQuill_{{ $loop->index }} = new Quill('#editorDescription_{{ $loop->index }}', {
            theme: 'snow',
            readOnly: true,  // Set to read-only mode
        });

        const persyaratanQuill_{{ $loop->index }} = new Quill('#editorPersyaratan_{{ $loop->index }}', {
            theme: 'snow',
            readOnly: true,  // Set to read-only mode
        });

        // Parse the Quill Delta (or HTML) content
        const desc_{{ $loop->index }} = {!! $layanan->deskripsi_layanan !!}; 
        descQuill_{{ $loop->index }}.setContents(desc_{{ $loop->index }});

        const persyaratan_{{ $loop->index }} = {!! $layanan->persyaratan !!}; 
        persyaratanQuill_{{ $loop->index }}.setContents(persyaratan_{{ $loop->index }});

        // Update HTML content with Quill's semantic HTML
        $('#semantichtmlDescription_{{ $loop->index }}').html(descQuill_{{ $loop->index }}.root.innerHTML);
        $('#semantichtmlPersyaratan_{{ $loop->index }}').html(persyaratanQuill_{{ $loop->index }}.root.innerHTML);

    @endforeach
</script>

</body>

</html>