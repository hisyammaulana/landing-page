
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ empty($setting) ? '' : $setting->name }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{ empty($setting) ? '' : (empty($setting->logo) ? '' : asset($setting->logo)) }}" rel="icon">
    <link href="{{ empty($setting) ? '' : (empty($setting->logo) ? '' : asset($setting->logo)) }}" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="{{ asset('template/landing/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('template/landing/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('template/landing/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('template/landing/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('template/landing/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('template/landing/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{ asset('template/landing/css/style.css')}}" rel="stylesheet">
</head>
<body>
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="{{ route('landing') }}" class="logo d-flex align-items-center">
            <img src="{{ empty($setting) ? '' : (empty($setting->logo) ? '' : asset($setting->logo)) }}" alt="">
            <span>{{ empty($setting) ? '' : $setting->name }}</span>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                <li><a class="nav-link scrollto" href="#about">Tentang GAS</a></li>
                <li><a class="nav-link scrollto" href="#services">Fitur</a></li>
                <li><a class="nav-link scrollto" href="#portfolio">Daftar</a></li>
                <li><a class="nav-link scrollto" href="#team">Karir</a></li>
                <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">{{ empty($hero) ? '' : $hero->title }}</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">{{ empty($hero) ? '' : $hero->sub_title }}</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="{{ empty($setting) ? '' : $setting->link_playstore }}" style="display: {{ empty($setting) ? 'none' : (empty($setting->link_playstore) ? 'none' : 'inline') }}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Get Started</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ empty($hero) ? '' : (empty($hero->image) ? '' : asset($hero->image)) }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>
<main id="main">
    <section id="about" class="about">

        <div class="container" data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>Tentang Kami</h3>
                        <h2>{{ empty($about) ? '' : $about->title }}</h2>
                        <p>
                            {{ empty($about) ? '' : $about->sub_title }}
                        </p>
                        <div class="text-center text-lg-start">
                            <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Read More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ empty($about) ? '' : (empty($about->image) ? '' : asset($about->image)) }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <section id="services" class="pricing">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Popular Fitur</p>
            </header>
            <div class="row gy-4" data-aos="fade-left">
                @forelse($features as $feature)
                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box">
                            <h3 style="color: #07d5c0;">{{ $feature->name }}</h3>
                            <img src="{{ $feature->image }}" class="img-fluid" alt="">
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <section id="values" class="values">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Kategori Toko</p>
            </header>
            <div class="row">
                @forelse($stores as $store)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="{{ asset($store->image) }}" class="img-fluid" alt="">
                            <h3>{{ asset($store->name) }}</h3>
                            <p>{{ asset($store->description) }}</p>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <section id="team" class="features">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Karir</p>
            </header>
            <div class="row feature-icons" data-aos="fade-up">
                <div class="row">
                    <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ asset('template/landing/img/features-3.png')}}" class="img-fluid p-4" alt="">
                    </div>
                    <div class="col-xl-8 d-flex content">
                        <div class="row align-self-center gy-4">
                            @forelse($careers as $career)
                                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                                    <div class="box">
                                        <img src="{{ asset($career->image) }}" class="img-fluid" alt="">
                                        <h3>{{ asset($career->title) }}</h3>
                                        <p>{{ asset($career->description) }}</p>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
        <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('template/landing/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{ asset('template/landing/vendor/aos/aos.js')}}"></script>
<script src="{{ asset('template/landing/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('template/landing/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{ asset('template/landing/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('template/landing/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('template/landing/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('template/landing/js/main.js')}}"></script>

</body>

</html>
