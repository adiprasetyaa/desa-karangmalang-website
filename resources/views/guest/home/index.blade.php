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

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                
                <div class="slide-img bg-img" style="background-image: url({{ asset('assets/guest') }}/static/images/bg_hero/bg_hero_1.png);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>DESA KARANGMALANG</h2>
                                <p>Desa Karangmalang terus berkembang dan menawarkan berbagai potensi yang menjanjikan. Dengan alam yang subur, budaya yang kaya, dan masyarakat yang kreatif, desa ini siap menyambut investasi dan pengembangan pariwisata</p>
                                <div class="welcome-btn-group">
                                    <a href="#" class="btn alazea-btn mr-30">GET STARTED</a>
                                    <a href="#" class="btn alazea-btn active">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url({{ asset('assets/guest') }}/static/images/bg_hero/bg_hero_2.png);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>DESA KARANGMALANG</h2>
                                <p>Nikmati pesona alam yang masih asri, rasakan hangatnya senyum masyarakat, dan ciptakan kenangan indah bersama keluarga. Udara segar, pemandangan hijau yang menyejukkan mata, dan keramahan masyarakatnya akan membuat Anda merasa seperti di rumah sendiri</p>
                                <div class="welcome-btn-group">
                                    <a href="#" class="btn alazea-btn mr-30">GET STARTED</a>
                                    <a href="#" class="btn alazea-btn active">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->
     

    <!-- ##### Service Area Start ##### -->
    <section class="our-services-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="text-center">
                        <h2>TENTANG KAMI</h2>
                        <p>Mengenal Lebih Dekat Desa Karangmalang</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-5 mb-100">
                    <div class="alazea-service-area">

                        <!-- Single Service Area -->
                        <!-- <div class="col-12 col-md-5" data-wow-delay="100ms">
                            <p>Pemerintah Desa Karangmalang senantiasa berupaya memberikan pelayanan terbaik bagi masyarakat. Kami hadir untuk memenuhi kebutuhan masyarakat, baik dalam hal administrasi, pembangunan, maupun pemberdayaan masyarakat. Dengan transparansi dan akuntabilitas yang tinggi, kami berkomitmen untuk mewujudkan pemerintahan yang bersih dan melayani.</p>
                        </div> -->

                        <p  style="text-align: center;">Pemerintah Desa Karangmalang senantiasa berupaya memberikan pelayanan terbaik bagi masyarakat. Kami hadir untuk memenuhi kebutuhan masyarakat, baik dalam hal administrasi, pembangunan, maupun pemberdayaan masyarakat. Dengan transparansi dan akuntabilitas yang tinggi, kami berkomitmen untuk mewujudkan pemerintahan yang bersih dan melayani.</p>

                    </div>
                </div>


                <div class="col-12 col-lg-6 text-center mb-100">
                    <!-- <div class="contact--thumbnail"> -->
                        <!-- <img src="{{ asset('assets/guest') }}/static/images/logo/logo_karangmalang_1x1.png" alt=""> -->
                        <img src="{{ asset('assets/guest') }}/static/images/logo/logo_karangmalang_1x1.png" alt="" style="width: 480px;">

                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Service Area End ##### -->


    <!-- ##### Blog Area Start ##### -->
    <section class="alazea-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>BERITA & PENGUMUMAN</h2>
                        <p>Informasi Terkini Seputar Karangmalang</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <!-- Single Blog Post Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-post mb-100">
                        <div class="post-thumbnail mb-30">
                            <a href="single-post.html"><img src="{{asset('assets/guest')}}/img/bg-img/6.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a href="single-post.html" class="post-title">
                                <h5>Garden designers across the country forecast ideas shaping the gardening world in 2018</h5>
                            </a>
                            <div class="post-meta">
                                <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 20 Jun 2018</a>
                                <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Alan Jackson</a>
                            </div>
                            <p class="post-excerpt">Integer luctus diam ac scerisque consectetur. Vimus ottawas nec lacus sit amet. Aenean interdus mid vitae.</p>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Post Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-post mb-100">
                        <div class="post-thumbnail mb-30">
                            <a href="single-post.html"><img src="{{asset('assets/guest')}}/img/bg-img/7.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a href="single-post.html" class="post-title">
                                <h5>2018 Midwest Tree and Shrub Conference: Resilient Plants for a Lasting Landscape</h5>
                            </a>
                            <div class="post-meta">
                                <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 20 Jun 2018</a>
                                <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Christina Aguilera</a>
                            </div>
                            <p class="post-excerpt">Integer luctus diam ac scerisque consectetur. Vimus ottawas nec lacus sit amet. Aenean interdus mid vitae.</p>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Post Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-post mb-100">
                        <div class="post-thumbnail mb-30">
                            <a href="single-post.html"><img src="{{asset('assets/guest')}}/img/bg-img/8.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a href="single-post.html" class="post-title">
                                <h5>The summer coming up, it’s time for both us and the flowers to soak up the sunshine</h5>
                            </a>
                            <div class="post-meta">
                                <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 19 Jun 2018</a>
                                <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Mason Jenkins</a>
                            </div>
                            <p class="post-excerpt">Integer luctus diam ac scerisque consectetur. Vimus ottawas nec lacus sit amet. Aenean interdus mid vitae.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Product Area Start ##### -->
    <section class="new-arrivals-products-area bg-gray section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>PERANGKAT DESA</h2>
                        <p>Profesional, Kompeten, dan Berintegritas</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Product Image -->
                        <div class="d-flex justify-content-center align-items-center" style="height: 480px;">
                            <img src="{{ asset('assets/guest') }}/static/images/staff/atya.jpeg" alt="" style="height: 480px; width:270px;object-fit: cover;">
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                                <p>Adi Prasetya</p>
                            </a>
                            <h6>Presiden RI</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Product Image -->
                        <div class="d-flex justify-content-center align-items-center" style="height: 480px;">
                            <img src="{{ asset('assets/guest') }}/static/images/staff/atya.jpeg" alt="" style="height: 480px; width:270px;object-fit: cover">
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                                <p>Adi Prasetya</p>
                            </a>
                            <h6>Presiden RI</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Product Image -->
                        <div class="d-flex justify-content-center align-items-center" style="height: 480px;">
                            <img src="{{ asset('assets/guest') }}/static/images/staff/atya.jpeg" alt="" style="height: 480px; width:270px;object-fit: cover">
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                                <p>Adi Prasetya</p>
                            </a>
                            <h6>Presiden RI</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Product Image -->
                        <div class="d-flex justify-content-center align-items-center" style="height: 480px;">
                            <img src="{{ asset('assets/guest') }}/static/images/staff/atya.jpeg" alt="" style="height: 480px; width:270px;object-fit: cover">
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                                <p>Adi Prasetya</p>
                            </a>
                            <h6>Presiden RI</h6>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center">
                    <a href="#" class="btn alazea-btn">View All</a>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Product Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>GET IN TOUCH</h2>
                        <p>Punya ide atau saran? Sampaikan kepada kami!</p>
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn alazea-btn w-100">
                                        <img src="{{ asset('assets/guest') }}/static/images/icon/whatsapp.png" alt="Icon" style="width: 20px; margin-right: 8px;"> Whatsapp
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <!-- Google Maps -->
                    <div class="map-area mb-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-image: url({{ asset('assets/guest') }}/static/images/bg_footer/bg_footer_1.jpg);">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row align-items-top justify-content-between">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="footer-logo">
                                <a href="#"><<img src="{{ asset('assets/guest') }}/static/images/logo/logo_fullwhite.png" alt="logo"></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>QUICK LINK</h5>
                            </div>
                            <nav class="widget-nav">
                                <ul>
                                    <li><a href="#">Tentang Kami</a></li>
                                    <li><a href="#">Visi Misi</a></li>
                                    <li><a href="#">Geografis Desa</a></li>
                                    <li><a href="#">Demografi Desa</a></li>
                                    <li><a href="#">Struktur Organisasi</a></li>
                                    <li><a href="#">Perangkat Desa</a></li>
                                    <li><a href="#">Lembaga Desa</a></li>
                                    <li><a href="#">Berita Desa</a></li>
                                    <li><a href="#">Pengumuman</a></li>
                                    <li><a href="#">Galeri</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>CONTACT</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Alamat: </span> Jalan Solo-Sragen, KM 14, Desa Karangmalang, Kec. Masaran Kabupaten Sragen, Jawa Tengah</p>
                                <p><span>Telepon: </span> +1 234 122 122</p>
                                <p><span>Email: </span>desakarangmalangmasaran@gmail.com</p>
                                <p><span>Waktu Pelayanan: </span></p>
                                <p>08:00 - 15:00 (Senin - Kamis)</p>
                                <p>08:00 - 11:00 dan 13:00 - 14:30 (Jumat)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Area -->
         @include('layouts.guest.footer')

    <!-- ##### Footer Area End ##### -->

    @include('layouts.guest.js')
</body>

</html>