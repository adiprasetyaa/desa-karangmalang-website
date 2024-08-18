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
            <h2>PERLINDUNGAN MASYARAKAT (LINMAS)</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pemerintahan</a></li>
                            <li class="breadcrumb-item"><a href="#">Lembaga Desa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Linmas</li>
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
                        <h2>Linmas: Garda Terdepan Keamanan Desa</h2>
                        <p>Membangun Desa yang Aman dan Damai</p>
                    </div>
                </div>
            </div>


        </div>

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-8">
                    <div>
                        <img src="{{ asset('assets/guest/static/images/bg_hero/bg_hero_1.png') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="col-12 col-lg-12 mt-4">
                        <h5>Apa itu LINMAS?</h5>
                        <p>LINMAS (Perlindungan Masyarakat) adalah sebuah program dan lembaga di tingkat desa yang bertugas untuk meningkatkan keamanan, ketertiban, dan kesejahteraan masyarakat melalui berbagai kegiatan pencegahan dan penanganan masalah sosial. LINMAS berfungsi sebagai garda terdepan dalam menjaga keamanan dan ketertiban di lingkungan desa, serta memberikan dukungan dalam situasi darurat.</p>
                        <p>Anggota LINMAS biasanya terdiri dari warga desa yang dilatih untuk menghadapi berbagai situasi darurat, seperti kebakaran, bencana alam, dan konflik sosial. Selain itu, mereka juga terlibat dalam kegiatan rutin seperti pengawasan keamanan lingkungan, pelaksanaan program-program pencegahan kejahatan, dan kerja sama dengan aparat keamanan setempat. Dengan adanya LINMAS, diharapkan desa dapat lebih siap menghadapi berbagai tantangan dan memastikan lingkungan yang aman dan nyaman bagi seluruh masyarakat.</p>
                    </div>
                    <div>
                        <h5>Struktur Organisasi</h5>
                        @if($linmas->isEmpty())
                        <p>Tidak ada data Linmas yang ditemukan.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($linmas as $item)
                                        <tr>
                                            <td>{{ $item->Nama }}</td>
                                            <td>{{ $item->Jabatan }}</td>
                                            <td>{{ $item->Alamat }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
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