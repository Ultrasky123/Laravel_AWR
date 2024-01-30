<?php
require 'lang.php';
include('lib/dbconnection.php');
error_reporting(0);

// Query untuk menampilkan data dari tabel senjata
$selectSenjataQuery = "SELECT * FROM tmploadcell";
$sql = mysqli_query($conn, $selectSenjataQuery);

$no = 0;
?>


<tr>
   <?php
   while ($row = mysqli_fetch_array($sql)) {
      $no++;
   ?>
      <td><?php echo $no; ?></td>
      <td><?php echo $row['id_senjata']; ?></td>
      <td><?php echo $row['status']; ?></td>
      <td><?php echo $row['berat']; ?></td>
</tr>
<?php
   }
?>

<?php
mysqli_close($conn);
?>