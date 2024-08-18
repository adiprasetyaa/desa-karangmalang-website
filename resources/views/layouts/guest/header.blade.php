<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="{{asset('assets/guest')}}/static/images/logo/logo_karangmalang_1x1.png" style="object-fit: contain;" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="index.html" class="nav-brand"><img src="{{ asset('assets/guest') }}/static/images/logo/logo_fullwhite.png" alt="logo" style="width: 110px;"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="#">Profil Desa</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.html">Tentang Kami</a></li>
                                            <li><a href="shop.html">Visi & Misi</a></li>
                                            <li><a href="shop-details.html">Geografis Desa</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="portfolio.html">Pemerintahan</a>
                                        <ul class="dropdown">
                                            <li><a href="portfolio.html">Struktur Organisasi</a></li>
                                            <li><a href="single-portfolio.html">Perangkat Desa</a></li>
                                            <li><a href="single-portfolio.html">Lembaga Desa</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">Informasi Publik</a>
                                        <ul class="dropdown">
                                            <li><a href="portfolio.html">Layanan Publik</a>
                                                <ul class="dropdown">
                                                    <li><a href="portfolio.html">KTP</a></li>
                                                    <li><a href="single-portfolio.html">Kartu Keluarga</a></li>
                                                    <li><a href="single-portfolio.html">Akta Kelahiran</a></li>
                                                    <li><a href="single-portfolio.html">Lain-lain</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="blog.html">Berita Desa</a></li>
                                            <li><a href="single-post.html">Pengumuman</a></li>
                                            <li><a href="single-post.html">Agenda Kegiatan</a></li>
                                            <li><a href="single-post.html">Galeri</a></li>
                                            <li><a href="single-post.html">Download</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Login</a></li>
                                </ul>

                                <!-- Search Icon -->
                                <div id="searchIcon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>

                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                            <button type="submit" class="d-none"></button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->