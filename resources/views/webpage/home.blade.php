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
    @include('layout.headerhome')

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('home', ['locale' => app()->getLocale()]) }}">
                    <i class="bi bi-grid"></i>
                    <span>@lang('auth.dashboard')</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">@lang('auth.halaman')</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('board', ['locale' => app()->getLocale()])}}">
                    <i class="bi bi-clipboard"></i>
                    <span>@lang('auth.papan_Status_Senjata')</span>
                </a>
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('access', ['locale' => app()->getLocale()])}}">
                    <i class="fa-solid fa-person-rifle"></i>
                    <span>@lang('auth.data_Pengguna')</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('weapon', ['locale' => app()->getLocale()])}}">
                    <i class="fa-solid fa-gun"></i>
                    <span>@lang('auth.data_Senjata')</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>@lang('auth.dashboard')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item active">@lang('auth.dashboard')</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col">
                    <div class="row">

                        <!-- Recent -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">@lang('auth.hari_ini')</a></li>
                                        <li><a class="dropdown-item" href="#">@lang('auth.bulan_ini')</a></li>
                                        <li><a class="dropdown-item" href="#">@lang('auth.tahun_ini')</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">@lang('auth.status_Penggunaan_Senjata')
                                        <span>@lang('auth.qwe|_Hari_ini')</span>
                                    </h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">@lang('auth.iD_Senjata')</th>
                                                <th scope="col">@lang('auth.iD_Pengguna')</th>
                                                <th scope="col">@lang('auth.nama_Pengguna')</th>
                                                <th scope="col">@lang('auth.tanggal')</th>
                                                <th scope="col">@lang('auth.waktu_Keluar')</th>
                                                <th scope="col">@lang('auth.waktu_Masuk')</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dataTable">
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div><!-- End Recent -->

                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>

    </main><!-- End #main -->

    @include('layout.footer')
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
        $.ajax({
            url: "http://localhost:8000/api/home-status/show",
            method: "GET",
            success: function(data) {
                // Assuming the response is an object with keys 'code', 'message', and 'data'
                var code = data.code;
                var message = data.message;
                var datas = data.data;

                // Now you can use the variables code, message, and datas in your code
                console.log(code, message, datas);

                // Assuming you have a table with id 'dataTable' in your HTML
                var dataTable = $('#dataTable');

                // Clear the table
                dataTable.empty();

                // Loop through the datas and append to the table
                $.each(datas, function(index, item) {
                    // console.log(item);
                    dataTable.append('<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + item.id_senjata + '</td>' +
                        '<td>' + item.id_pengguna + '</td>' +
                        '<td>' + item.nama_pengguna + '</td>' +
                        '<td>' + item.tanggal + '</td>' +
                        '<td>' + item.keluar + '</td>' +
                        '<td>' + item.masuk + '</td>' +
                    '</tr>');
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle error response
                console.log("Error: ", textStatus, errorThrown);
            }
        });
    </script>
</body>

</html>
