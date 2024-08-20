<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.guest.css')
</head>

<body>

    <!-- Preloader -->
    @include('layouts.guest.header')

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/guest') }}/static/images/bg_hero/bg_hero_1.png);">
            <h2>GALERI DESA</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Galeri</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Portfolio Area Start ##### -->
    <section class="alazea-portfolio-area portfolio-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Ragam Aktivitas di Desa Karangmalang</h2>
                        <p>Galeri Foto yang Menampilkan Kegiatan Masyarakat</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row alazea-portfolio">
                @foreach($gallery as $item)
                    <!-- Single Portfolio Area -->
                    <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item">
                        <!-- Portfolio Thumbnail -->
                        <div class="portfolio-thumbnail bg-img" style="background-image: url('{{ Storage::url($item->image) }}');"></div>
                        <!-- Portfolio Hover Text -->
                        <div class="portfolio-hover-overlay">
                            <a href="{{ Storage::url($item->image) }}" class="portfolio-img d-flex align-items-center justify-content-center" title="{{ $item->title }}">
                                <div class="port-hover-text">
                                    <h6>{{ $item->title }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Portfolio Area End ##### -->

    @include('layouts.guest.footer')

    @include('layouts.guest.js')
    
</body>

</html>
