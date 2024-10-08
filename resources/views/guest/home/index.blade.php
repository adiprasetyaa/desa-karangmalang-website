{{-- @dd(asset('assets/guest/')) --}}
<!DOCTYPE html>
<html lang="en">

<head>

@include('layouts.guest.css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
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

                        <p  style="text-align: center;">{{ $tentang_kami->description }}</p>

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

            @foreach($artikels as $index=> $artikel)
                            <!-- Single Blog Post Area -->
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post mb-50">
                                    <div class="post-thumbnail mb-30">
                                        <a href="{{ route('guest.informasi_publik.artikel.show', $artikel->id) }}">
                                            <img src="{{ Storage::url($artikel->image) }}" alt="{{ $artikel->title }}">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <a href="{{ route('guest.informasi_publik.artikel.show', $artikel->id) }}" class="post-title">
                                            <h5>{{ $artikel->title }}</h5>
                                        </a>
                                        <div class="post-meta">
                                            <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $artikel->created_at->format('d M Y') }}</a>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i>{{ $artikel->user->name }}</a>
                                        </div>
                                        <!-- <p class="post-excerpt">{{ Str::limit($artikel->content, 100) }}</p> -->
                                        <!-- <p class="post-excerpt">
                                            <div class="hide" hidden>
                                                <div id="editor_{{ $loop->index }}" hidden></div>
                                            </div>
                                            <div id="semantichtml_{{ $loop->index }}" class="ql-editor"></div>
                                        </p> -->
                                                        <!-- Hidden container for Quill content -->
                <div class="hide" hidden>
                    <div id="editor_{{ $loop->index }}" hidden>{!! $artikel->content !!}</div>
                </div>
                <!-- Visible container for truncated content -->
                <p class="post-excerpt">
                    <div id="semantichtml_{{ $loop->index }}" class="ql-editor"></div>
                </p>
                                        <!-- <div id="editorContent"></div> -->
                                        <!-- <div id="editorContent_{{ $index }}"></div> -->
                                    </div>
                                </div>
                            </div>
                        @endforeach

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
                @foreach($perangkat_desa->take(4) as $perangkat)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Product Image -->
                            @if($perangkat->image)
                                <div class="d-flex justify-content-center align-items-center" style="height: 480px;">
                                    <img src="{{ asset('images/perangkat_desa/' . $perangkat->image) }}" alt="{{ $perangkat->Nama }}" style="height: 480px; width:270px; object-fit: cover;">
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15040.308696471542!2d110.91305762260392!3d-7.486527314295976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1a617d952859%3A0x5027a76e355acc0!2sKarang%20Malang%2C%20Masaran%2C%20Sragen%20Regency%2C%20Central%20Java!5e1!3m2!1sen!2sid!4v1724205231504!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

        <!-- Footer Bottom Area -->
         @include('layouts.guest.footer')

    <!-- ##### Footer Area End ##### -->

    @include('layouts.guest.js')

    <script>
    @foreach($artikels as $artikel)
        const Quill_{{ $loop->index }} = new Quill('#editor_{{ $loop->index }}', {
            theme: 'snow',
            readOnly: true,  // Set to read-only mode
        });

        // Parse the Quill Delta (or HTML) content
        const artikel_{{ $loop->index }} = {!! $artikel->content !!}; 
        Quill_{{ $loop->index }}.setContents(artikel_{{ $loop->index }});


        // Update HTML content with Quill's semantic HTML
        $('#semantichtml_{{ $loop->index }}').html(Quill_{{ $loop->index }}.root.innerHTML);

    @endforeach
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach($artikels as $index => $artikel)
            // Initialize Quill editor in read-only mode
            const Quill_{{ $loop->index }} = new Quill('#editor_{{ $loop->index }}', {
                theme: 'snow',
                readOnly: true,
            });

            // Set content for Quill editor
            const artikelContent_{{ $loop->index }} = document.getElementById('editor_{{ $loop->index }}').innerHTML;
            Quill_{{ $loop->index }}.root.innerHTML = artikelContent_{{ $loop->index }};

            // Extract text content and truncate
            const textContent_{{ $loop->index }} = Quill_{{ $loop->index }}.root.innerText;
            let truncatedContent_{{ $loop->index }} = textContent_{{ $loop->index }}.length > 100 ? textContent_{{ $loop->index }}.substring(0, 100) + '...' : textContent_{{ $loop->index }};

            // Update the HTML container with truncated content
            document.getElementById('semantichtml_{{ $loop->index }}').innerHTML = truncatedContent_{{ $loop->index }};
        @endforeach
    });
    </script>
</body>

</html>