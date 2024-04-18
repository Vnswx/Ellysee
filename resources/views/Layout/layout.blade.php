<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

    <title>Ellysee.</title>
    <!--
SOFTY PINKO
https://templatemo.com/tm-535-softy-pinko
-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/Layout/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/Layout/css/flex-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Layout/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('Layout/css/templatemo-softy-pinko.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    @yield('header')
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Small Start ***** -->

    @yield('content')

    <!-- ***** Footer Start ***** -->
    @yield('footer')
</body>

</html>
