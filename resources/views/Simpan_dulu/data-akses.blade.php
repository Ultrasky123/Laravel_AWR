<?php
require 'lang.php';
include('lib/dbconnection.php');

$sql = mysqli_query($conn, "SELECT * FROM owner");

$no = 0;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, sshirink-to-fit=no">
  <script type="text/javascript" src="jquery/jquery.min.js"></script>

  <title><?= __('Dashboard - Penyimpanan Senjata Otomatis') ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Logo G - STAS RG.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  <?php include "header.php"; ?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="home.php">
          <i class="bi bi-grid"></i>
          <span><?= __('Dashboard') ?></span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading"><?= __('Halaman') ?></li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="papan.php">
          <i class="bi bi-clipboard"></i>
          <span><?= __('Papan Status Senjata') ?></span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link" href="data-akses.php">
          <i class="fa-solid fa-person-rifle"></i>
          <span><?= __('Data Pengguna') ?></span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="data-senjata.php">
          <i class="fa-solid fa-gun"></i>
          <span><?= __('Data Senjata') ?></span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?= __('Data Pengguna') ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php"><i class="bi bi-house-door"></i></a></li>
          <li class="breadcrumb-item"><?= __('Halaman') ?></li>
          <li class="breadcrumb-item active"><?= __('Data Pengguna') ?></li>
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
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#"><?= __('Hari ini') ?></a></li>
                    <li><a class="dropdown-item" href="#"><?= __('Bulan ini') ?></a></li>
                    <li><a class="dropdown-item" href="#"><?= __('Tahun ini') ?></a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title"><?= __('Data Pengguna') ?> <span><?= __(' | Hari ini') ?></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col"><?= __('ID Senjata') ?></th>
                        <th scope="col"><?= __('ID Pengguna') ?></th>
                        <th scope="col"><?= __('Nama Pengguna') ?></th>
                        <th scope="col"><?= __('Pangkat') ?></th>
                        <th scope="col"><?= __('NRP') ?></th>
                        <th scope="col"><?= __('Jabatan') ?></th>
                        <th scope="col"><?= __('Kesatuan') ?></th>
                        <th scope="col"><?= __('Aksi') ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        while ($row = mysqli_fetch_array($sql)) {
                          $no++;
                        ?>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row['id_senjata']; ?></td>
                          <td><?php echo $row['id_pengguna']; ?></td>
                          <td><?php echo $row['nama_pengguna']; ?></td>
                          <td><?php echo $row['pangkat']; ?></td>
                          <td><?php echo $row['NRP']; ?></td>
                          <td><?php echo $row['jabatan']; ?></td>
                          <td><?php echo $row['kesatuan']; ?></td>
                          <td>
                            <a href="edit.php?id_senjata=<?php echo $row['id_senjata']; ?>"><?= __('Edit') ?></a> |
                            <a href="hapus.php?id_senjata=<?php echo $row['id_senjata']; ?>"><?= __('Hapus') ?></a>
                          </td>
                      </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                  </table>
                  <a href="tambah-akses.php">
                    <button class="btn btn-primary"><?= __('Tambah Data') ?></button>
                  </a>
                </div>

              </div>
            </div><!-- End Recent -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <?php include "footer.php"; ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://kit.fontawesome.com/878a3fab63.js" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>