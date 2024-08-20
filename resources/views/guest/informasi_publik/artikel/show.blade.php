{{-- @dd(asset('assets/guest/')) --}}
<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
@include('layouts.guest.css')

</head>

<body>
    
@include('layouts.guest.header')

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/guest') }}/static/images/bg_hero/bg_hero_1.png);">
            <h2>DETAIL ARTIKEL</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Informasi Publik</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Artikel</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12 col-md-8">
                    <div class="blog-posts-area">

                        <!-- Post Details Area -->
                        <div class="single-post-details-area">
                            <div class="post-content">
                                <h4 class="post-title">{{$artikels->title}}</h4>
                                <div class="post-meta mb-30">
                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $artikels->created_at->format('d M Y') }}</a>
                                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i>{{ $artikels->user->name }}</a>
                                </div>
                                <div class="post-thumbnail mb-30">
                                    <img src="{{ Storage::url($artikels->image) }}" alt="{{ $artikels->title }}">
                                </div>
                                <div>
                                    <div class="hide" hidden>
                                        <div id="editor" hidden>

                                        </div>
                                    </div>
                                    <div id="semantichtml" class="ql-editor"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog Sidebar Area -->
                <div class="col-12 col-sm-9 col-md-4">
                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h4>Articles For You</h4>
                            </div>

                            @foreach($sidebar_artikels as $index=> $artikel)
                            <!-- Single Latest Posts -->
                            <div class="single-latest-post d-flex align-items-center">
                                <div class="post-thumb">
                                    <img src="{{ Storage::url($artikel->image) }}" alt="{{ $artikel->title }}">
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('guest.informasi_publik.artikel.show', $artikel->id) }}" class="post-title">
                                        <h6>{{ $artikel-> title }}</h6>
                                    </a>
                                    <a href="{{ route('guest.informasi_publik.artikel.show', $artikel->id) }}" class="post-date">{{ $artikel->created_at->format('d M Y') }}</a>
                                </div>
                            </div>
                            @endforeach
                    </div>

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
    <!-- ##### Blog Content Area End ##### -->


    @include('layouts.guest.footer')


    @include('layouts.guest.js')

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<script>

    const quill = new Quill('#editor', {
    
    theme: 'snow',
    readOnly: true,  // Set to read-only mode
    });


    const content = {!! $artikels->content !!}; 
    quill.setContents(content);


    $('#semantichtml').html(quill.getSemanticHTML());
</script>

</body>

</html>