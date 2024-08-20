{{-- @dd(asset('assets/guest/')) --}}
<!DOCTYPE html>
<html lang="en">

<head>

@include('layouts.guest.css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

</head>

<body>
    @include('layouts.guest.header')

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/guest') }}/static/images/bg_hero/bg_hero_1.png);">
            <h2>ARTIKEL DESA</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Informasi Publik</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Artikel Desa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <section class="alazea-blog-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="row">
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
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="Page navigation">
                                {{ $artikels->links() }}
                            </nav>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div> -->
                </div>
                
                <div class="col-12 col-lg-3 col-md-4 mt-3 mb-3">
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
    <!-- ##### Blog Area End ##### -->

    
    @include('layouts.guest.footer')


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