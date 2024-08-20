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
            <h2>Lembaga Kemasyarakatan Desa (LKD)</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pemerintahan</a></li>
                            <li class="breadcrumb-item"><a href="#">Lembaga Desa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">LKD</li>
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
                        <h2>Lembaga Kemasyarakatan Desa: Pilar Utama Pembangunan Desa</h2>
                        <p>Memahami Kontribusi LKD dalam Mewujudkan Desa Maju</p>
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
                        <h5>LKD: Jembatan Emas antara Pemerintah dan Masyarakat</h5>
                        <p>LKD (Lembaga Kemasyarakatan Desa) adalah lembaga yang dibentuk di tingkat desa dengan tujuan untuk mengembangkan partisipasi masyarakat dalam kegiatan sosial, ekonomi, dan budaya. LKD berfungsi sebagai wadah bagi masyarakat untuk berpartisipasi aktif dalam perencanaan dan pelaksanaan berbagai program desa, serta dalam pengelolaan sumber daya lokal.</p>
                        <p>LKD mencakup berbagai jenis lembaga, seperti RT (Rukun Tetangga), RW (Rukun Warga), dan kelompok-kelompok masyarakat lainnya yang berperan dalam kegiatan sosial dan kemasyarakatan. LKD membantu menyusun rencana kerja desa, mengidentifikasi kebutuhan masyarakat, dan melaksanakan kegiatan yang mendukung pembangunan desa. Dengan adanya LKD, diharapkan desa dapat lebih efektif dalam melibatkan masyarakat dalam proses pengambilan keputusan dan pelaksanaan program-program yang berdampak langsung pada kesejahteraan masyarakat.</p>
                    </div>

                    <div>
                        <h5>Struktur Organisasi</h5>
                        @if($lkd->isEmpty())
                        <p>Tidak ada data LKD yang ditemukan.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lkd as $item)
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
</body>

</html>