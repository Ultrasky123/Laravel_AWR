<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, sshirink-to-fit=no">
    <script type="text/javascript" src="{{asset('jquery/jquery.min.js')}}"></script>

    <title>@lang('auth.home_title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('img/Logo G - STAS RG.png')}}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body>
    @include('layout.headerboard')
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('home') }}">
                    <i class="bi bi-grid"></i>
                    <span>@lang('auth.dashboard')</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">@lang('auth.halaman')</li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('board')}}">
                    <i class="bi bi-clipboard"></i>
                    <span>@lang('auth.papan_Status_Senjata')</span>
                </a>
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('access')}}">
                    <i class="fa-solid fa-person-rifle"></i>
                    <span>@lang('auth.data_Pengguna')</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('weapon')}}">
                    <i class="fa-solid fa-gun"></i>
                    <span>@lang('auth.data_Senjata')</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>@lang('auth.papan_Status_Senjata')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item active">@lang('auth.papan_Status_Senjata')</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body pt-4 d-flex flex-column align-items-center">

                            <img src="{{asset('assets/img/Indicator Lights for Weapon Use.png')}}" alt=@lang('auth.papan_Status_Senjata') width="200px">
                            <!-- <div class="slider-wrapper">
                                <div class="slider">
                                    <div class="slide"> <img src="assets/img/Indicator Lights for Weapon Use.png" alt="Slide 1" srcset=""></div>
                                    <div class="slide"> <img src="assets/img/Indicator Lights for Weapon Use.png" alt="Slide 2" srcset=""></div>
                                    <div class="slide"> <img src="assets/img/Indicator Lights for Weapon Use.png" alt="Slide 3" srcset=""></div>
                                </div>
                                <div class="dot-container">
                                    <span class="dot" onclick="currentSlide(0)"></span>
                                    <span class="dot" onclick="currentSlide(1)"></span>
                                    <span class="dot" onclick="currentSlide(2)"></span>
                                </div>
                            </div> -->
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">@lang('auth.papan_Status_Senjata')</button>
                                </li>


                            </ul>

                            <div class="tab-content pt-2">

                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">@lang('auth.rak_1')</h5>
                                                <div class="container d-flex justify-content-evenly align-item-center">
                                                    <div class="pill">
                                                        <div class="led led-red"></div>
                                                        <!-- <p>Weapon Out</p> -->
                                                    </div>
                                                    <div class="pill">
                                                        <!-- <p>Weapon In</p> -->
                                                        <div class="led led-green"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">@lang('auth.rak_2')</h5>

                                                <div class="container d-flex justify-content-evenly align-item-center">
                                                    <div class="pill">
                                                        <div class="led led-red"></div>
                                                        <!-- <p>Weapon Out</p> -->
                                                    </div>
                                                    <div class="pill">
                                                        <!-- <p>Weapon In</p> -->
                                                        <div class="led led-green"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">@lang('auth.rak_3')</h5>
                                                <div class="container d-flex justify-content-evenly align-item-center">
                                                    <div class="pill">
                                                        <div class="led led-red"></div>
                                                        <!-- <p>Weapon Out</p> -->
                                                    </div>
                                                    <div class="pill">
                                                        <!-- <p>Weapon In</p> -->
                                                        <div class="led led-green"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">@lang('auth.rak_4')</h5>

                                                <div class="container d-flex justify-content-evenly align-item-center">
                                                    <div class="pill">
                                                        <div class="led led-red"></div>
                                                        <!-- <p>Weapon Out</p> -->
                                                    </div>
                                                    <div class="pill">
                                                        <!-- <p>Weapon In</p> -->
                                                        <div class="led led-green"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">@lang('auth.rak_5')</h5>

                                                <div class="container d-flex justify-content-evenly align-item-center">
                                                    <div class="pill">
                                                        <div class="led led-red"></div>
                                                        <!-- <p>Weapon Out</p> -->
                                                    </div>
                                                    <div class="pill">
                                                        <!-- <p>Weapon In</p> -->
                                                        <div class="led led-green"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">@lang('auth.rak_6')</h5>

                                                <div class="container d-flex justify-content-evenly align-item-center">
                                                    <div class="pill">
                                                        <div class="led led-red"></div>
                                                        <!-- <p>Weapon Out</p> -->
                                                    </div>
                                                    <div class="pill">
                                                        <!-- <p>Weapon In</p> -->
                                                        <div class="led led-green"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">@lang('auth.rak_7')</h5>

                                                <div class="container d-flex justify-content-evenly align-item-center">
                                                    <div class="pill">
                                                        <div class="led led-red"></div>
                                                        <!-- <p>Weapon Out</p> -->
                                                    </div>
                                                    <div class="pill">
                                                        <!-- <p>Weapon In</p> -->
                                                        <div class="led led-green"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">@lang('auth.rak_8')</h5>

                                                <div class="container d-flex justify-content-evenly align-item-center">
                                                    <div class="pill">
                                                        <div class="led led-red"></div>
                                                        <!-- <p>Weapon Out</p> -->
                                                    </div>
                                                    <div class="pill">
                                                        <!-- <p>Weapon In</p> -->
                                                        <div class="led led-green"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    @include('layout.footer')
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="https://kit.fontawesome.com/878a3fab63.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
