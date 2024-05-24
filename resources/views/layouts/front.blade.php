<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> {{ $setting->nama_aplikasi }} - @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('frontend') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('frontend') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend') }}/assets/css/style.css" rel="stylesheet">

    @stack('css_vendor')

    <!-- =======================================================
  * Template Name: Techie
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @include('frontend.partials.front_header')

    @yield('hero')

    <main id="main">

        @yield('content')

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container">

            <div class="copyright-wrap d-md-flex py-4">
                <div class="me-md-auto text-center text-md-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>{{ $setting->nama_aplikasi }}</span></strong>. All Rights
                        Reserved
                    </div>
                    <div class="credits">
                        Designed by {{ $setting->nama_pemilik }}
                    </div>
                </div>
                <div class="social-links text-center text-md-right pt-3 pt-md-0">
                    <a href="{{ $setting->twitter_link }}" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="{{ $setting->fanpage_link }}" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="{{ $setting->instagram_link }}" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="{{ $setting->google_plus_link }}" class="google"><i class="bx bxl-google"></i></a>
                </div>
            </div>

        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('frontend') }}/assets/js/main.js"></script>

    @stack('scripts')

    <script>
        function goToHome(element) {
            const homeUrl = element.getAttribute('data-url');
            const currentUrl = window.location.href;

            if (currentUrl === homeUrl || currentUrl === homeUrl + '/') {
                const homeElement = document.getElementById('hero');
                if (homeElement) {
                    homeElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            } else {
                window.location.href = homeUrl + '#hero';
            }
        }

        function goToAbout(element) {
            const homeUrl = element.getAttribute('data-url');
            const currentUrl = window.location.href;

            if (currentUrl === homeUrl || currentUrl === homeUrl + '/') {
                const aboutElement = document.getElementById('about');
                if (aboutElement) {
                    aboutElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            } else {
                window.location.href = homeUrl + '#about';
            }
        }

        function goToFaq(element) {
            const homeUrl = element.getAttribute('data-url');
            const currentUrl = window.location.href;

            if (currentUrl === homeUrl || currentUrl === homeUrl + '/') {
                const faqElement = document.getElementById('faq');
                if (faqElement) {
                    faqElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            } else {
                window.location.href = homeUrl + '#faq';
            }
        }

        function goToFeature(element) {
            const homeUrl = element.getAttribute('data-url');
            const currentUrl = window.location.href;

            if (currentUrl === homeUrl || currentUrl === homeUrl + '/') {
                const featureElement = document.getElementById('features');
                if (featureElement) {
                    featureElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            } else {
                window.location.href = homeUrl + '#features';
            }
        }
    </script>

</body>

</html>
