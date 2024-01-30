<?php
include('lib/dbconnection.php');

// Menerima data dari Arduino
if (isset($_GET['id_senjata']) && isset($_GET['status']) && isset($_GET['berat'])) {
    $id_senjata = mysqli_real_escape_string($conn, $_GET['id_senjata']);
    $status = mysqli_real_escape_string($conn, $_GET['status']);
    $berat = mysqli_real_escape_string($conn, $_GET['berat']);

    // Periksa apakah baris dengan ID tersebut sudah ada di tabel tmploadcell
    $checkQuery = "SELECT * FROM tmploadcell WHERE id_senjata = '$id_senjata'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (!$checkResult) {
        echo "Error: " . $checkQuery . "<br>" . mysqli_error($conn);
    } else {
        if (mysqli_num_rows($checkResult) > 0) {
            // Jika baris dengan ID tersebut sudah ada, update status
            $updateQuery = "UPDATE tmploadcell SET status = '$status', berat = '$berat' WHERE id_senjata = '$id_senjata'";
            if (mysqli_query($conn, $updateQuery)) {
                echo "Status dan berat berhasil diperbarui dalam database.";
            } else {
                echo "Error: " . $updateQuery . "<br>" . mysqli_error($conn);
            }
        } else {
            // Jika baris dengan ID tersebut belum ada, masukkan data baru
            $insertQuery = "INSERT INTO tmploadcell (id_senjata, status, berat) VALUES ('$id_senjata', '$status', '$berat')";
            if (mysqli_query($conn, $insertQuery)) {
                echo "Data berhasil disimpan ke dalam database.";
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }
        }
    }
} else {
    echo "Parameter tidak lengkap. ID, berat, dan status diperlukan.";
}

// Tutup koneksi database
mysqli_close($conn);
?>