{{-- ini halaman dashboard admin
tipe Pelanggaran --}}
{{-- {{ $violationTypes }}
<a href="{{ route('violation-index') }}">Violations</a>

@foreach ($reports as $report)
    <div class="card mb-3">
        @php
            $encryptedPhotoId = encrypt($report->photo_id);
        @endphp
        <div class="card-body">
            <h5 class="card-title">Laporan ID: {{ $report->id }}</h5>
            <p class="card-text">Foto ID: {{ $report->photo_id }}</p>
            <p class="card-text">Alasan Pelaporan: {{ $report->reason }}</p>
            <p class="card-text">Jenis Pelanggaran: {{ $report->violationTypes->name }}</p>
            <!-- Tampilkan informasi tambahan sesuai kebutuhan -->
            <a href="{{ route('detail', $encryptedPhotoId) }}" class="btn btn-primary">Lihat Foto</a>
            <form action="{{ route('report-approve', $report) }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-success">Terima</button>
            </form>
            <form action="{{ route('report-reject', $report) }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-danger">Tolak</button>
            </form>
        </div>
    </div>
@endforeach --}}

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="CryptoDash admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, CryptoDash Cryptocurrency Dashboard Template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="ThemeSelection">
    <title>ICO Dashboard - CryptoDash - Free Cryptocurrency Dashboard Template + Bitcoin Dashboard</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dashboard/images/ico/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/vendors/css/extensions/pace.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Layout/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/vendors/css/charts/chartist.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/vendors/css/charts/chartist-plugin-tooltip.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/core/menu/menu-types/vertical-compact-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/vendors/css/cryptocoins/cryptocoins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/pages/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/pages/dashboard-ico.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/style.css') }}">
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-compact-menu" data-col="2-columns">

    <!-- fixed-top-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-bg-color">
        <div class="navbar-wrapper">
            <div class="navbar-header d-md-none">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item d-md-none"><a class="navbar-brand" href="index.html">Ellysee.</a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                            data-target="#navbar-mobile"><i class="la la-ellipsis-v"> </i></a></li>
                </ul>
            </div>
            <div class="navbar-container">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                href="{{ route('home') }}"><i class="fa fa-home"></i></a></li>
                    </ul>
                    {{-- <ul class="nav navbar-nav float-right">
                    </ul> --}}
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-dark menu-bg-default rounded menu-accordion menu-shadow">
        <div class="main-menu-content"><a class="navigation-brand d-none d-md-block d-lg-block d-xl-block"
                href="index.html">Ellysee.</a>
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="active"><a href="{{ route('admin-index') }}"><i class="icon-grid"></i><span
                            class="menu-title" data-i18n="">Dashboard</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Violation Type</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin-index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Violation Type
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-4 col-12 d-none d-md-inline-block">
                    <div class="btn-group float-md-right"><button class="btn-gradient-secondary btn-sm white"
                            data-toggle="modal" data-target="#purchaseBTCModalLabel">Create</button></div>
                </div>
            </div>
            <div class="content-body"><!-- ICO Token &  Distribution-->

                <div class="card">

                    <div class="card-content">
                        <div class="table-responsive">
                            <table id="recent-orders" class="table table-hover table-xl mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">No.</th>
                                        <th class="border-top-0">Violation Name</th>
                                        <th class="border-top-0">Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($violationTypes->count() > 0)
                                        @foreach ($violationTypes as $report)
                                            <tr>
                                                <td class="text-truncate"><i
                                                        class="la la-dot-circle-o success font-medium-1 mr-1"></i>
                                                    {{ $report->id }}</td>
                                                <td class="text-truncate">{{ $report->name }}</td>
                                                <td class="text-truncate"><a href="#">{{ $report->created_at }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <p class="text-center">there are no Violation Type that has been made</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Recent Transactions -->
        <!-- Basic Horizontal Timeline -->
        <!--/ Basic Horizontal Timeline -->
    </div>
    </div>
    </div>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Report Log</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin-index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Report Log
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-4 col-12 d-none d-md-inline-block">
                    {{-- <div class="btn-group float-md-right"><a class="btn-gradient-secondary btn-sm white"
                            href="wallet.html">Buy now</a></div> --}}
                </div>
            </div>
            <div class="content-body"><!-- ICO Token &  Distribution-->

                <div class="card">

                    <div class="card-content">
                        <div class="table-responsive">
                            <table id="recent-orders" class="table table-hover table-xl mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0 text-center">No.</th>
                                        <th class="border-top-0 text-center">Links</th>
                                        <th class="border-top-0 text-center">Reason</th>
                                        <th class="border-top-0 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($reports->count() > 0)
                                        @foreach ($reports as $report)
                                            @php
                                                $encryptedPhotoId = encrypt($report->photo_id);
                                            @endphp
                                            <tr>
                                                <td class="text-truncate text-center"><i
                                                        class="la la-dot-circle-o warning font-medium-1 mr-1"></i>
                                                    {{ $report->id }}</td>
                                                <td class="text-truncate text-center"><a
                                                        href="{{ route('detail', $encryptedPhotoId) }}">See Photo</a>
                                                </td>
                                                <td class="text-truncate text-center">
                                                    {{ $report->violationTypes->name }}</td>
                                                <td class="text-truncate text-center" style="display: flex">
                                                    <form action="{{ route('report-approve', $report) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-success"
                                                            style="position: relative; left: 5vw">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('report-reject', $report) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" style="position: relative; left: 7vw"
                                                            class="btn btn-danger">
                                                            <i class="fa fa-ban"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <p class="text-center">there are no incoming reports</p>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="purchaseBTCModalLabel" tabindex="-1" role="dialog"
        aria-labelledby="purchaseBTCModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="purchaseModalLabel">Form Violation Types</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{-- <div class="card-content">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-2 col-12 d-none d-md-block">
                                        <div class="crypto-circle rounded-circle">
                                            <i class="cc BTC-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <p><strong>Bitcoin</strong></p>
                                        <h5>0xe834a970619218d0a7db4ee5a3c87022e71e177f</h5>
                                        <button type="button" class="btn btn-warning round mr-1 mb-0">Copy</button>
                                    </div>
                                    <div class="col-md-2 col-12 d-none d-md-block">
                                        <img src="../../../app-assets/images/icons/sample-qr.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <form action="{{ route('violation-store') }}" method="POST">
                        @csrf

                        <div class="form-body">
                            <div class="row">
                                <div class="px-2" style="flex: 0 0 120%;">
                                    <label class="label-control" for="projectinput1">Violation Types:</label>
                                    <div class="form-group row">
                                        <fieldset class="col-10">
                                            <div class="input-group">
                                                <input name="name" id="name" type="text"
                                                    class="form-control" aria-describedby="basic-addon4">
                                                <div class="input-group-append">
                                                    {{-- <span class="input-group-text" id="basic-addon4"><i
                                                            class="cc BTC-alt"></i></span> --}}
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="font-italic mx-1 mb-2">The calculator uses the effective CIC price, which is based on
                            the
                            price 1 CIC = 0.0000142 BTC and 15% bonus.</p>
                        <div class="col-12 text-center float-right">
                            <button type="submit" class="btn-gradient-secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-transparent">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                class="float-md-left d-block d-md-inline-block">Copyright &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> <a class="text-bold-800 grey darken-2" href="https://themeselection.com/"
                    target="_blank">ThemeSelection </a>, All rights reserved.
            </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with
                <i class="ft-heart pink"></i></span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('dashboard/vendors/js/vendors.min.js') }} " type="text/javascript"></script>
    <script src="{{ asset('dashboard/vendors/js/charts/chartist.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript') }}">
    </script>
    <script src="{{ asset('dashboard/vendors/js/timeline/horizontal-timeline.js" type="text/javascript') }}"></script>
    <script src="{{ asset('dashboard/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/dashboard-ico.js" type="text/javascript') }}"></script>
    {{-- <script>
        // var violationTypeElement = document.getElementById('violationType');

        // if (violationTypeElement.innerText.length > 10) {
        //     violationTypeElement.setAttribute('title', '{{ $report->violationTypes->name }}');

        //     violationTypeElement.innerText = '{{ substr($report->violationTypes->name, 0, 15) }}...';
        // }
    </script> --}}
</body>

</html>
