<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, sshirink-to-fit=no">
  <script type="text/javascript" src="{{asset('jquery/jquery.min.js')}}"></script>

  <title>@lang('auth.tambah_data')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('img/satasrg1-modified.png')}}" rel="icon">

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

  <!-- pembacaan no kartu otmatis dengan js -->
  {{-- <script type="text/javascript">
    $(document).ready(function() {
      setInterval(function() {
        $("#norfid").load('nokartu.php')
      }, 0); // pembacaan file no kartu sesuai detik karena 0 jadi refresh langsung muncul
    });
  </script> --}}

{{-- <script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
            $.get('/process-status', function(data) {
                $('#cekstatus').html(data);
            });
        }, 1000); // refresh every second
    });
</script> --}}
</head>

<body>
    @include('layout.headertambah')

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('home', ['locale' => app()->getLocale()])  }}">
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
      <h1>@lang('auth.tambah_Data')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home', ['locale' => app()->getLocale()])}}">@lang('auth.dashboard')</a></li>
          <li class="breadcrumb-item">@lang('auth.halaman')</li>
          <li class="breadcrumb-item"><a href="{{route('access', ['locale' => app()->getLocale()])}}">@lang('auth.data_Pengguna')</a></li>
          <li class="breadcrumb-item active">@lang('auth.tambah_Data_Pengguna')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">@lang('auth.tambah_Data_Pengguna')</h5>
              <!--Data Akses -->
              {{-- <form method="POST" route="{{route('store')}}" class="row g-3 needs-validation"> --}}
                <form method="POST" action="{{route('store', ['locale' => app()->getLocale()])}}" class="row g-3 needs-validation">
                @csrf
                {{-- <div id="norfid"></div> --}}
                @php
                    $nokartu = \App\Models\tmprfids::first()->nokartu;
                @endphp
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">ID Tag</label>
                    <input type="text" name="nokartu" id="nokartu"
                    placeholder="@lang('auth.tempelkan_Kartu_RFID')" class="form-control" value="{{ $nokartu }}">
                </div>
                <!-- <div id="idsenjata"></div> -->
                <div class="col-12">
                  <label class="col-sm-2 col-form-label">@lang('auth.iD_Senjata')</label>
                  <div class="col">
                    <select class="form-select" aria-label="Default select example" name="id_senjata" id="id_senjata">
                      <option value="">@lang('auth.buka_pilihan_ini')</option>
                      @php
                      $ids = DB::table('tmploadcells')->distinct()->pluck('id_senjata');
                  @endphp

                  @foreach($ids as $id_senjata)
                      @php
                          $isUsed = DB::table('owners')->where('id_senjata', $id_senjata)->exists();
                      @endphp

                      @if(!$isUsed)
                          <option value="{{ $id_senjata }}">{{ $id_senjata }}</option>
                      @endif
                  @endforeach
                    </select>

                  </div>
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">@lang('auth.iD_Pengguna')</label>
                  <input type="text" class="form-control" name="id_pengguna" id="id_pengguna" required>
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">@lang('auth.data_Pengguna')</label>
                  <input type="text" class="form-control" name="nama_pengguna" id="nama_pengguna" required>
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">@lang('auth.pangkat')</label>
                  <input type="text" class="form-control" name="pangkat" id="pangkat" required>
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">@lang('auth.nRP')</label>
                  <input type="text" class="form-control" name="NRP" id="NRP" required>
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">@lang('auth.jabatan')</label>
                  <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">@lang('auth.kesatuan')</label>
                  <input type="text" class="form-control" name="kesatuan" id="kesatuan" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="btnSubmit" id="btnSubmit">@lang('auth.simpan')</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->
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
  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
