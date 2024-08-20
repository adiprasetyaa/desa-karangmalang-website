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
            <h2>Pemerintah Desa</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pemerintahan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pemerintah Desa</li>
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
                        <h2>Karangmalang Maju: Dibangun Bersama Pemerintah Desa</h2>
                        <p>Mengenal Lebih Dekat Jajaran Pemerintah Desa</p>
                    </div>
                </div>
            </div>


        </div>

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-8">
                    <div class="section-heading text-center">
                        <h4>Struktur Organisasi Desa</h4>
                        <p>Profesional, Kompeten, dan Berintegritas</p>
                    </div>
                    <div>
                        <img src="{{ Storage::url($struktur_organisasi->image) }}" class="img-fluid" alt="...">
                    </div>
                    <div class="container">
            <br><br>

            <div class="row mt-3">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h4>Perangkat Desa</h4>
                        <p>Profesional, Kompeten, dan Berintegritas</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Product Area -->
                @foreach($perangkat_desa as $perangkat)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Product Image -->
                            @if($perangkat->image)
                                <div class="d-flex justify-content-center align-items-center" style="height: 480px;">
                                    <img src="{{ Storage::url($perangkat->image) }}" alt="{{ $perangkat->nama }}" style="height: 480px; width:270px; object-fit: cover;">
                                </div>
                            @else
                                <!-- Product Image -->
                                <div class="d-flex justify-content-center align-items-center" style="height: 480px;">
                                    <img src="{{ asset('assets/guest') }}/static/images/staff/dummy_profile.png" alt="{{ $perangkat->Nama }}" style="height: 480px; width:270px; object-fit: cover;">
                                </div>
                            @endif
                            <!-- Product Info -->
                            <div class="product-info mt-15 text-center">
                                <a href="#">
                                    <p>{{ $perangkat->Nama }}</p>
                                </a>
                                <h6>{{ $perangkat->Jabatan }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h4>Kepala Desa</h4>
                        <p>Pemimpin dari Periode ke Periode Selanjutnya</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Product Area -->
                @foreach($kepala_desa as $kades)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Product Image -->
                            @if($kades->photo)
                                <div class="d-flex justify-content-center align-items-center" style="height: 480px;">
                                    <img src="{{ Storage::url($kades->photo) }}" alt="{{ $kades->nama }}" style="height: 480px; width:270px; object-fit: cover;">
                                </div>
                            @else
                                <!-- Product Image -->
                                <div class="d-flex justify-content-center align-items-center" style="height: 480px;">
                                    <img src="{{ asset('assets/guest') }}/static/images/staff/dummy_profile.png" alt="{{ $kades->photo }}" style="height: 480px; width:270px; object-fit: cover;">
                                </div>
                            @endif
                            <!-- Product Info -->
                            <div class="product-info mt-15 text-center">
                                <a href="#">
                                    <p>{{ $kades->name }}</p>
                                </a>
                                <h6>{{ date('Y', strtotime($kades->period_start_at)) }} - {{ date('Y', strtotime($kades->period_end_at)) }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


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
</body>

</html>