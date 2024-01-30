<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, sshirink-to-fit=no">
    <script type="text/javascript" src="{{asset('jquery/jquery.min.js')}}"></script>

    <title>@lang('auth.home_title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('img\Logo G - STAS RG.png')}}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- scaning membaca status loadcell -->
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#cekstatus").load('proses-status.php')
            }, 1000); // pembacaan file status 5 detik
        });
    </script> --}}
</head>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-start">
      <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <img src="{{asset('img/stas-rg_logo-removebg-preview.png')}}" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <!-- Translate bahasa -->
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon dropdown-toggle" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-translate"></i>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="{{url('id/home')}}">
                <img src="{{asset('img/bendera-id.png')}}" alt="" class="rounded-circle" width="20px">
                ID
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="{{url('en/home')}}">
                <img src="{{asset('img/bendera-amerika.png')}}" alt="" class="rounded-circle" width="20px">
                EN
              </a>
            </li>
          </ul>
        </li>
        <!-- Penutup translate -->

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-person-bounding-box"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
        </a><!-- End Profile Iamge Icon -->


          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('signout')}}">
                <i class="bi bi-person"></i>
                <span>@lang('auth.profil_Saya')</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('signout')}}">
                <i class="bi bi-question-circle"></i>
                <span>@lang('auth.butuh_bantuan?')</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <form action="/signout" method="post">
                <button type="submit" class="dropdown-item d-flex align-items-center">
                    @csrf
                <i class="bi bi-box-arrow-right"></i>
                <span>@lang('auth.keluar')</span>
                </button>
                </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  {{-- Section content for body code --}}
  @yield('content')
  {{-- End of Section --}}

  {{-- Footer --}}
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>2024</span></strong>
    </div>
</footer><!-- End Footer -->
