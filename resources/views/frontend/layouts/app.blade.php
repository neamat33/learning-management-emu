<!DOCTYPE html>
<html lang="en">
<head>
    <title>ENU-Education and Course</title>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Eduport- LMS, Education and Course">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('web')}}/assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('web')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{asset('web')}}/assets/vendor/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" type="text/css" href="{{asset('web')}}/assets/vendor/glightbox/css/glightbox.css">
    <link rel="stylesheet" type="text/css" href="{{asset('web')}}/assets/vendor/choices/css/choices.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('web')}}/assets/vendor/aos/aos.css">
    <link rel="stylesheet" type="text/css" href="{{asset('web')}}/assets/vendor/stepper/css/bs-stepper.min.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{asset('web')}}/assets/css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7N7LGGGWT1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-7N7LGGGWT1');
    </script>

</head>

<body>

<!-- Header START -->
@include('frontend.layouts.header')
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
     @yield('content')
</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
@include('frontend.layouts.footer')
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

<!-- Bootstrap JS -->
<script src="{{asset('web')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="{{asset('web')}}/assets/vendor/tiny-slider/tiny-slider.js"></script>
<script src="{{asset('web')}}/assets/vendor/glightbox/js/glightbox.js"></script>
<script src="{{asset('web')}}/assets/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>
<script src="{{asset('web')}}/assets/vendor/choices/js/choices.min.js"></script>
<script src="{{asset('web')}}/assets/vendor/aos/aos.js"></script>
<script src="{{asset('web')}}/assets/vendor/stepper/js/bs-stepper.min.js"></script>
<!-- Template Functions -->
<script src="{{asset('web')}}/assets/js/functions.js"></script>

</body>

</html>
