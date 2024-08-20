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
            <h2>Geografis Desa</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Profil Desa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Geografis Desa</li>
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
                        <h2>Letak Geografis Desa Karangmalang</h2>
                        <p>Gambaran Umum Wilayah dan Batas-Batas Desa</p>
                    </div>
                </div>
            </div>


        </div>

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-8">
        
                    <div class="col-12 col-lg-12">
                                <div class="card-body">
                                    <div class="hide" hidden>
                                        <div id="editor" hidden>
        
                                        </div>
                                    </div>
                                    <div id="semantichtml" class="ql-editor"></div>
                                </div>
                            </div>
                    </div>

                    <div>
                </div>

                <div class="col-12 col-lg-3 mt-3 mb-3">
                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h4>LEMBAGA DESA</h4>
                            </div>
                            <!-- Tags -->
                            <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ route('guest.pemerintahan.lembaga_desa.bpd') }}">Badan Permusyawaratan Desa (BPD)</a></li>
                                    <li class="list-group-item"><a href="{{ route('guest.pemerintahan.lembaga_desa.bumdes') }}">Badan Usaha Milik Desa (BUMDES)</a></li>
                                    <li class="list-group-item"><a href="{{ route('guest.pemerintahan.lembaga_desa.linmas') }}">Perlindungan Masyarakat (LINMAS)</a></li>
                                    <li class="list-group-item"><a href="{{ route('guest.pemerintahan.lembaga_desa.lkd') }}">Lembaga Kemasyarakatan Desa (LKD)</a></li>
                                    <li class="list-group-item"><a href="{{ route('guest.pemerintahan.lembaga_desa.lpmd') }}">Lembaga Pemberdayaan Masyarakat Desa (LPMD)</a></li>
                                    <li class="list-group-item"><a href="{{ route('guest.pemerintahan.lembaga_desa.spmdes') }}">Standar Pelayanan Minimal Desa (SPMDES)</a></li>
                            </ul>
                    </div>
                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h4>Kategori</h4>
                            </div>
                            <!-- Tags -->
                            <ol class="popular-tags d-flex flex-wrap">
                                <li><a href="{{route('home')}}">HOME</a></li>
                                <li><a href="{{route('guest.informasi_publik.artikel.index')}}">ARTIKEL</a></li>
                                <li><a href="{{ route('guest.informasi_publik.galeri') }}">GALERI</a></li>
                                <li><a href="{{ route('guest.profil_desa.tentang_kami') }}">TENTANG DESA</a></li>
                                <li><a href="{{ route('guest.profil_desa.visi_misi') }}">VISI MISI</a></li>
                                <li><a href="{{ route('guest.pemerintahan.lembaga_desa.bpd') }}">LEMBAGA DESA</a></li>
                                <li><a href="{{ route('guest.informasi_publik.layanan_publik') }}">LAYANAN PUBLIK</a></li>
                                <li><a href="{{ route('guest.pemerintahan.pemerintah_desa') }}">PEMERINTAH DESA</a></li>
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

        const quill = new Quill('#editor', {

        theme: 'snow',
        readOnly: true,  // Set to read-only mode
        });


        const geografis_desa = {!! $geografis_desa->description !!}; 
        quill.setContents(geografis_desa);

        $('#semantichtml').html(quill.getSemanticHTML());

    </script>

</body>

</html>