<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, sshirink-to-fit=no">
    <script type="text/javascript" src="{{asset('jquery/jquery.min.js')}}"></script>

    <title>@lang('auth.tambah_akses')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('img/stasrg1-modified.png')}}" rel="icon">

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
    @include('layout.headeraccess')

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="bi bi-grid"></i>
                    <span>@lang('auth.dashboard')</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">@lang('auth.halaman')</li>

            <li class="nav-item">
                <a class="nav-link " href="{{route('access')}}">
                    <i class="bi bi-person"></i>
                    <span>@lang('auth.data_akses')</span>
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
            <h1>@lang('auth.ubah_data_akses')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item">@lang('auth.halaman')</li>
                    <li class="breadcrumb-item"><a href="{{route('access')}}">@lang('auth.data_akses')</a></li>
                    <li class="breadcrumb-item active">@lang('auth.ubah_data_akses')</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">@lang('auth.data_akses')</h5>
                            <!--Data Akses -->
                            <form method="POST" action="{{ url('/update/' . $owner->id_senjata) }}" class="row g-3 needs-validation">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">@lang('auth.no_kartu')</label>
                                    <input type="text" class="form-control" name="nokartu" id="nokartu" value="{{ $owner->nokartu }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">@lang('auth.iD_Pengguna')</label>
                                    <input type="text" class="form-control" name="id_pengguna" id="id_pengguna" value="{{ $owner->id_pengguna }}">
                                </div>
                                <div class=" col-12">
                                    <label class="form-label">@lang('auth.iD_Senjata')</label>
                                    <input type="text" class="form-control" name="id_senjata" id="id_senjata" value="{{ $owner->id_senjata }}">
                                </div>
                                <div class=" col-12">
                                    <label for="inputPassword4" class="form-label">@lang('auth.nama_Pengguna')</label>
                                    <input type="text" class="form-control" name="nama_pengguna" id="nama_pengguna" value="{{ $owner->nama_pengguna }}">
                                </div>
                                <div class=" col-12">
                                    <label for="inputPassword4" class="form-label">@lang('auth.pangkat')</label>
                                    <input type="text" class="form-control" name="pangkat" id="pangkat" value="{{ $owner->pangkat }}">
                                </div>
                                <div class=" col-12">
                                    <label for="inputAddress" class="form-label">@lang('auth.nRP')</label>
                                    <input type="text" class="form-control" name="NRP" id="NRP" value="{{ $owner->NRP }}">
                                </div>
                                <div class=" col-12">
                                    <label for="inputPassword4" class="form-label">@lang('auth.jabatan')</label>
                                    <input type="text" class="form-control" name="jabatan" id="jabatan" value="{{ $owner->jabatan }}">
                                </div>
                                <div class=" col-12">
                                    <label for="inputPassword4" class="form-label">@lang('auth.kesatuan')</label>
                                    <input type="text" class="form-control" name="kesatuan" id="kesatuan" value="{{ $owner->kesatuan }}">
                                </div>
                                <div class=" text-center">
                                    <button type="submit" class="btn btn-primary" name="btnSimpan" id="btnSimpan">Submit</button>
                                    {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
                                </div>
                            </form><!-- Vertical Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include('layout.footer')
</body>

</html>
