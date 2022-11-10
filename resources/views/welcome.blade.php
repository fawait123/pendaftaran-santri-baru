<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PSB Darunnajah</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets') }}/images/logo/logo.png" rel="icon">
    <link href="{{ asset('assets') }}/images/logo/logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="{{ asset('frontend/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: OnePage - v4.9.2
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">PSB Darunnajah</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#program">Program</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('persyaratan.download') }}">Persyaratan</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    @if (auth()->user() == null)
                        <li><a class="nav-link scrollto o" href="{{ route('login') }}">Login</a></li>
                        <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li><a class="nav-link scrollto" href="{{ route('home') }}">Home</a @endif
                            <ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 text-center">
                    <h1>Pendaftaran Santri Baru Tahun 2023</h1>
                    <h2>Pondok Pesantren Darunnajah Kepil Wonosobo</h2>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('register') }}" class="btn-get-started scrollto">Daftar Sekarang</a>
            </div>

            <div class="text-center">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Program Pendidikan</h2>
                        <p>Program pendidikan yang ditawarkan di pondok pesantren darunajah ada 4 program pendidikan,
                            yang masing-masing mempunyai bidang yang berbeda, khusus
                            pondok pesantren santri dan santriwati yang mendapatkan pedidikan berbasis Takhfidz, Tartil,
                            dan Tilawatul Qur’an </p>

                        <div class="row icon-boxes" id="program">
                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                                data-aos-delay="200">
                                <div class="icon-box">
                                    <div class="icon"><i class="ri-stack-line"></i></div>
                                    <h4 class="title"><a href="">Takhfidzul Qur'an</a></h4>
                                    <p class="description">Menghafal Al-Qur'an adalah orang yang menghafal setiap
                                        ayat-ayat dalam Al-Qur'an mulai ayat pertama sampai ayat terakhir.</p>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                                data-aos-delay="300">
                                <div class="icon-box">
                                    <div class="icon"><i class="ri-palette-line"></i></div>
                                    <h4 class="title"><a href="">Madrasah Diniyyah</a></h4>
                                    <p class="description">Santri dan Santriwati untuk menguasai materi ilmu agama
                                        secara baik</p>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                                data-aos-delay="400">
                                <div class="icon-box">
                                    <div class="icon"><i class="ri-command-line"></i></div>
                                    <h4 class="title"><a href="">Kajian Kitab Kuning (Sorogan dan Bandongan)</a>
                                    </h4>
                                    <p class="description">Para santri mengikuti pelajaran dengan duduk di sekeiling
                                        kiai yang menerangkan secara kuliah, santri menyimak kitab masing-masing dan
                                        membuat catatan padanya.</p>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
                                data-aos-delay="500">
                                <div class="icon-box">
                                    <div class="icon"><i class="ri-fingerprint-line"></i></div>
                                    <h4 class="title"><a href="">SMP Darunnajah Al-Islamy</a></h4>
                                    <p class="description">Lembaga pendidikan baru yang dikembangkan oleh pondok
                                        pesantren Darunnajah berbasis formal sekolah islami</p>
                                </div>
                            </div>

                        </div>
                    </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Ketrampilan Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title-2">
                    <h2>Program Ketrampilan</h2>
                    <p>Banyak kegiatan yang ada di pondok pesantren antara lain berupa ekstra kulikuler yang di tawarkan
                        antara lain </p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('frontend/img/team/foto1.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="member-info">
                                <h4>Haflah Khataman</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('frontend/img/team/foto2.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="member-info">
                                <h4>Seni Hadroh</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('frontend/img/team/foto3.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="member-info">
                                <h4>Kompetisi Hiburan</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('frontend/img/team/foto4.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="member-info">
                                <h4>Al- Barjanji</h4>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Ketrampilan Section -->
        <!-- ======= Daftar Sekarang Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">
                <div class="text-center">
                    <h3>Ayo, Daftar Sekarang !</h3>
                    <p> Untuk melakukan pendaftaran klik "Daftar Sekarang"</p>
                    <a class="cta-btn" href="{{ route('register') }}">Daftar Sekarang</a>
                </div>
            </div>
        </section><!-- End Daftar Sekarang Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                </div>

                <div>
                    <iframe style="border:0; width: 100%; height: 270px;"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                        frameborder="0" allowfullscreen></iframe>
                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Pendaftaran</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Petunjuk Pendaftaran</a></li>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Lembaga</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Pondok Pesantren Darunnajah</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">SMP Darunnajah Al-Islamy</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">PAUD Berbasis Al-Qur’an
                                    An-Nawwaf</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">TK Islam Terpadu An-Nawwaf</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Alamat</h3>
                        <p>
                            Jl. Purworejo KM 24 <br>
                            Kecamatan Kepil<br>
                            Wonosobo <br><br>
                            <strong>Phone:</strong> 082 334 020 822<br>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>OnePage</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>

            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('frontend/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>
