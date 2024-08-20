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
            <h2>VISI DAN MISI DESA</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Profil Desa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Visi dan Misi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Portfolio Detaila Area Start ##### -->
    <section class="portfolio-details-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Menuju Desa Karangmalang yang Sejahtera</h2>
                        <p>Visi dan Misi Desa Karangmalang</p>
                    </div>
                </div>
            </div>


        </div>

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-8">
                    <div class="col-12 col-lg-12 mt-4">
                        <h5>Visi Desa Karangmalang</h5>
                        <div class="card-body">
                            <div class="hide" hidden>
                                    <div id="editorVisi" hidden>

                                    </div>
                                </div>
                                <div id="semantichtmlVisi" class="ql-editor">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 mt-4">
                        <h5>Misi Desa Karangmalang</h5>
                        <div class="card-body">
                            <div class="hide" hidden>
                                <div id="editorMisi" hidden>

                                </div>
                            </div>
                            <div id="semantichtmlMisi" class="ql-editor"></div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3 mt-3 mb-3">
                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h4>Kategori</h4>
                            </div>
                            <!-- Tags -->
                            <ol class="popular-tags d-flex flex-wrap">
                                <li><a href="#">HOME</a></li>
                                <li><a href="#">BERITA</a></li>
                                <li><a href="#">GALERI</a></li>
                                <li><a href="#">TENTANG DESA</a></li>
                                <li><a href="#">VISI MISI</a></li>
                                <li><a href="#">LEMBAGA DESA</a></li>
                                <li><a href="#">LAYANAN PUBLIK</a></li>
                                <li><a href="#">PERANGKAT DESA</a></li>
                            </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Portfolio Detaila Area End ##### -->

    @include('layouts.guest.footer')


    @include('layouts.guest.js')

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <script>

        const visiQuill = new Quill('#editorVisi', {
        
        theme: 'snow',
        readOnly: true,  // Set to read-only mode
        });

        const misiQuill = new Quill('#editorMisi', {
        
        theme: 'snow',
        readOnly: true,  // Set to read-only mode
        });



        const visi = {!! $visi_misi->visi !!}; 
        visiQuill.setContents(visi);

        const misi = {!! $visi_misi->misi !!}; 
        misiQuill.setContents(misi);


        $('#semantichtmlVisi').html(visiQuill.getSemanticHTML());
        $('#semantichtmlMisi').html(misiQuill.getSemanticHTML());
    </script>
    
</body>

</html>