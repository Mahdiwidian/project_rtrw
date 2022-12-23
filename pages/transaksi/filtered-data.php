<?php
include('../../config/koneksi.php');

// dynamic data transaksi
if (isset($_POST['value'])) {
  $type_trans = $_POST['value'];
} else {
  $type_trans = "";
}

switch ($type_trans) {
  case "income":
    $query_trans = "SELECT * FROM transaksi WHERE type = 'pemasukan'";
    break;
  case "outcome":
    $query_trans = "SELECT * FROM transaksi WHERE type = 'pengeluaran'";
    break;
  default:
    $query_trans = "SELECT * FROM transaksi";
    break;
}
$hasil_trans = mysqli_query($db, $query_trans);
$data_trans = array();

while ($row = mysqli_fetch_assoc($hasil_trans)) {
  $data_trans[] = $row;
}

if (isset($_POST['value'])) {
  echo json_encode($data_trans);
}

?>