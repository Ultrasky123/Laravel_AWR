<?php
error_reporting(E_ALL);
include('lib/dbconnection.php');

$sqlLoadCell = mysqli_query($conn, "SELECT * FROM tmploadcell");

// Mengambil table status dan id_senjata
while ($dataLoadCell = mysqli_fetch_array($sqlLoadCell)) {
  $statusAbsen = $dataLoadCell['status'];
  $idSenjata = $dataLoadCell['id_senjata'];

//   Cek apakah status 1 = masuk, 0 = keluar
  $mode = "";
  if ($statusAbsen == 1) {
    $mode = "Masuk";
  } else if ($statusAbsen == 0) {
    $mode = "Keluar";
  }

//   Ngambil data dari table owner
  $cari_karyawan = mysqli_query($conn, "SELECT * FROM owner WHERE id_senjata='$idSenjata'");
  $jumlah_data = mysqli_num_rows($cari_karyawan);

  if ($jumlah_data > 0) {
    if ($statusAbsen !== "") {
      $data_karyawan = mysqli_fetch_array($cari_karyawan);
    //   Masukin data yang sesuai ke $nama
      $nama = $data_karyawan['nama_pengguna'];

      date_default_timezone_set('Asia/Jakarta');
      $tanggal = date('Y-m-d');
      $jam     = date('H:i:s');

    // Cek apakah ada data yang sesuai di table status
      $cari_absen = mysqli_query($conn, "SELECT * FROM status WHERE id_senjata='$idSenjata' AND tanggal='$tanggal'");
      $jumlah_absen = mysqli_num_rows($cari_absen);

    //   Proses masukin data ke table status
      if ($statusAbsen == 0 && $jumlah_absen == 0) {
        $insertKeluarQuery = "INSERT INTO status(id_senjata, tanggal, keluar) VALUES ('$idSenjata', '$tanggal', '$jam')";
        $resultKeluar = mysqli_query($conn, $insertKeluarQuery);
        if (!$resultKeluar) {
          die("Error: " . mysqli_error($conn));
        }
      } else if ($statusAbsen == 1 && $jumlah_absen > 0) {
        $updateQuery = "UPDATE status SET masuk='$jam', durasi=TIMEDIFF('$jam', keluar) WHERE id_senjata='$idSenjata' AND tanggal='$tanggal' AND durasi IS NULL";
        $result = mysqli_query($conn, $updateQuery);

        if (!$result) {
          die("Error: " . mysqli_error($conn));
        }
      }
    }
  }
}

// Ngambil data data yang sekiranya untuk dipanggil ke database
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');
$sql = mysqli_query($conn, "SELECT a.*, b.id_pengguna, b.nama_pengguna FROM status a
                            INNER JOIN owner b ON a.id_senjata = b.id_senjata
                            WHERE a.tanggal='$tanggal'");

$no = 0;

// Show to table
while ($row = mysqli_fetch_array($sql)) {
  $no++;
  echo "<tr>";
  echo "<td>" . $no . "</td>";
  echo "<td>" . $row['id_senjata'] . "</td>";
  echo "<td>" . $row['id_pengguna'] . "</td>";
  echo "<td>" . $row['nama_pengguna'] . "</td>";
  echo "<td>" . $row['tanggal'] . "</td>";
  echo "<td>" . $row['keluar'] . "</td>";
  echo "<td>" . $row['masuk'] . "</td>";
  echo "</tr>";
}
