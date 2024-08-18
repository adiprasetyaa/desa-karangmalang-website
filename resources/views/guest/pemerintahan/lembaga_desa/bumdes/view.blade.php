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
            <h2>Badan Usaha Milik Desa (BUMDES)</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pemerintahan</a></li>
                            <li class="breadcrumb-item"><a href="#">Lembaga Desa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">BUMDES</li>
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
                        <h2>BUMDes: Pilar Utama Ekonomi Desa</h2>
                        <p>Mempercepat Pertumbuhan Ekonomi Desa</p>
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
                        <h5>BUMDes: Kunci Sukses Membangun Desa Mandiri</h5>
                        <p>BUMDES (Badan Usaha Milik Desa) adalah sebuah badan usaha yang didirikan dan dimiliki oleh desa untuk mengelola usaha ekonomi dan kegiatan bisnis yang bertujuan untuk meningkatkan kesejahteraan masyarakat desa. BUMDES berfungsi sebagai wadah bagi desa untuk mengembangkan potensi ekonomi lokal, menciptakan lapangan kerja, dan meningkatkan pendapatan desa melalui berbagai usaha yang dikelola secara mandiri.</p>
                        <p>BUMDES dapat menjalankan berbagai jenis usaha, mulai dari usaha perdagangan, pertanian, perikanan, hingga jasa layanan. Pengelolaan BUMDES dilakukan oleh pengurus yang ditunjuk berdasarkan keputusan musyawarah desa, dan keuntungan yang diperoleh dari kegiatan usaha akan digunakan untuk kepentingan desa, seperti pembiayaan program-program sosial, pembangunan infrastruktur, dan peningkatan layanan publik. Dengan adanya BUMDES, diharapkan desa dapat lebih mandiri secara ekonomi dan mampu meningkatkan kualitas hidup masyarakatnya melalui pengelolaan sumber daya yang lebih baik.</p>
                    </div>

                    <div>
                        <h5>Struktur Organisasi</h5>
                        @if($bumdes->isEmpty())
                        <p>Tidak ada data BUMDES yang ditemukan.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bumdes as $item)
                                        <tr>
                                            <td>{{ $item->Nama }}</td>
                                            <td>{{ $item->Jabatan }}</td>
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