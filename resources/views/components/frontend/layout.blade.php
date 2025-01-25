<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <title>HeartFund</title>
    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/revolution-slider.css" rel="stylesheet">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="css/responsive.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
</head>

<body>
    <!--Page Wrapper-->
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

    </div>
    <!--Page Wrapper End-->

    <x-frontend.header />

    {{ $slot }}

    <x-frontend.footer />

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-long-arrow-up"></span>
    </div>

    <!-- Include SweetAlert -->
    @include('sweetalert::alert')

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/isotope.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/html5lightbox/html5lightbox.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/revolution.min.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <script src="js/knob.js"></script>

    <script src="js/custom.js"></script>
</body>

</html>
