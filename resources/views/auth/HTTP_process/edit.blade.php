<!-- proses penyimpanan -->
<?php
require 'lang.php';
include('lib/dbconnection.php');

// baca id data yang akan diedit
$id_senjata = $_GET['id_senjata'];

// baca data akses berdasarkan id
$cari = mysqli_query($conn, "SELECT * FROM owner WHERE id_senjata='$id_senjata'");
$hasil = mysqli_fetch_array($cari);

// jika tombol simpan di klik
if (isset($_POST['btnSimpan'])) {

    // baca isi inputan form
    $nokartu = $_POST['nokartu'];
    $id_pengguna = $_POST['id_pengguna'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $NRP = $_POST['NRP'];
    $pangkat = $_POST['pangkat'];
    $jabatan = $_POST['jabatan'];
    $kesatuan = $_POST['kesatuan'];

    // simpan ke tabel akses
    $sql = "UPDATE owner set id_pengguna='$id_pengguna', nokartu='$nokartu', nama_pengguna='$nama_pengguna', NRP='$NRP', pangkat='$pangkat', jabatan='$jabatan', kesatuan='$kesatuan' WHERE id_senjata='$id_senjata'";
    // jika berhasil tersimpan, tampilan pesan tersimpan

    // kembali ke data akses
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                  alert('Data Berhasil Diubah');
                  location.replace('data-akses.php');
              </script>";
    } else {
        echo "<script>
                  alert('Data Gagal Diubah');
                  location.replace('data-akses.php');
              </script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, sshirink-to-fit=no">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>

    <title>Tambah Akses - Penyimpanan Senjata Otomatis</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/stasrg1-modified.png" rel="icon">

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
    <title>Tambah Data Akses</title>

</head>

<body>
    <?php include "header.php"; ?>

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="home.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Halaman</li>

            <li class="nav-item">
                <a class="nav-link " href="data-akses.php">
                    <i class="bi bi-person"></i>
                    <span>Data Akses</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="data-senjata.php">
                    <i class="bi bi-question-circle"></i>
                    <span>Data Senjata</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

        </ul>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tambah Data Akses</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                    <li class="breadcrumb-item">Halaman</li>
                    <li class="breadcrumb-item"><a href="data-akses.php">Data Akses</a></li>
                    <li class="breadcrumb-item active">Tambah Data Akses</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Akses</h5>
                            <!--Data Akses -->
                            <form method="POST" class="row g-3 needs-validation">
                                <div class="col-12">
                                    <label class="form-label">No Kartu</label>
                                    <input type="text" class="form-control" name="nokartu" id="nokartu" value="<?php echo $hasil['nokartu']; ?>">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">ID Pengguna</label>
                                    <input type="text" class="form-control" name="id_pengguna" id="id_pengguna" value="<?php echo $hasil['id_pengguna']; ?>">
                                </div>
                                <div class=" col-12">
                                    <label class="form-label">ID Senjata</label>
                                    <input type="text" class="form-control" name="id_senjata" id="id_senjata" value="<?php echo $hasil['id_senjata']; ?>">
                                </div>
                                <div class=" col-12">
                                    <label for="inputPassword4" class="form-label">Nama Pengguna</label>
                                    <input type="text" class="form-control" name="nama_pengguna" id="nama_pengguna" value="<?php echo $hasil['nama_pengguna']; ?>">
                                </div>
                                <div class=" col-12">
                                    <label for="inputPassword4" class="form-label">Pangkat</label>
                                    <input type="text" class="form-control" name="pangkat" id="pangkat" value="<?php echo $hasil['pangkat']; ?>">
                                </div>
                                <div class=" col-12">
                                    <label for="inputAddress" class="form-label">NRP</label>
                                    <input type="text" class="form-control" name="NRP" id="NRP" value="<?php echo $hasil['NRP']; ?>">
                                </div>
                                <div class=" col-12">
                                    <label for="inputPassword4" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?php echo $hasil['jabatan']; ?>">
                                </div>
                                <div class=" col-12">
                                    <label for="inputPassword4" class="form-label">Kesatuan</label>
                                    <input type="text" class="form-control" name="kesatuan" id="kesatuan" value="<?php echo $hasil['kesatuan']; ?>">
                                </div>
                                <div class=" text-center">
                                    <button type="submit" class="btn btn-primary" name="btnSimpan" id="btnSimpan">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- Vertical Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <?php include "footer.php"; ?>
</body>

</html>