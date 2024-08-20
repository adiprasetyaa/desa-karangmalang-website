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
            <h2>TENTANG KAMI</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Profil Desa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
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
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="text-center">
                        <h2>Karangmalang: Desa Kita, Harapan Kita</h2>
                        <p>Eksplorasi Keindahan dan Keunikan Desa</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-12 text-center mb-24">
                    <!-- <div class="contact--thumbnail"> -->
                        <!-- <img src="{{ asset('assets/guest') }}/static/images/logo/logo_karangmalang_1x1.png" alt=""> -->
                        <img src="{{ asset('assets/guest') }}/static/images/logo/logo_karangmalang_1x1.png" alt="" style="width: 480px;">

                    <!-- </div> -->
                </div>

            <div class="col-12 col-lg-12 mb-100">
                    <div class="alazea-service-area">

                        <!-- Single Service Area -->
                        <!-- <div class="col-12 col-md-5" data-wow-delay="100ms">
                            <p>Pemerintah Desa Karangmalang senantiasa berupaya memberikan pelayanan terbaik bagi masyarakat. Kami hadir untuk memenuhi kebutuhan masyarakat, baik dalam hal administrasi, pembangunan, maupun pemberdayaan masyarakat. Dengan transparansi dan akuntabilitas yang tinggi, kami berkomitmen untuk mewujudkan pemerintahan yang bersih dan melayani.</p>
                        </div> -->

                        <p  style="text-align: center;">{{ $tentang_kami->description }}</p>

                    </div>
            </div>
        </div>
    </section>
    <!-- ##### Portfolio Detaila Area End ##### -->

    @include('layouts.guest.footer')


    @include('layouts.guest.js')

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

</body>

</html>