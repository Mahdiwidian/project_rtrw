<?php
include('../../config/koneksi.php');

// dynamic data transaksi
$type_trans = $_POST['type'];
$date_trans = $_POST['date'];
$date_trans2 = $_POST['date2'];

switch ($type_trans) {
    case "income":
        $query_trans = "SELECT * FROM transaksi WHERE type = 'pemasukan' AND date(created_at) BETWEEN '$date_trans 00:00:00' AND '$date_trans2 23:59:00' ORDER BY created_at";
        break;
    case "outcome":
        $query_trans = "SELECT * FROM transaksi WHERE type = 'pengeluaran' AND date(created_at) BETWEEN '$date_trans 00:00:00' AND '$date_trans2 23:59:00' ORDER BY created_at";
        break;
    default:
        $query_trans = "SELECT * FROM transaksi WHERE date(created_at) BETWEEN '$date_trans 00:00:00' AND '$date_trans2 23:59:00' ORDER BY created_at";
        break;
}
$hasil_trans = mysqli_query($db, $query_trans);
$data_trans = array();

while ($row = mysqli_fetch_assoc($hasil_trans)) {
    $data_trans[] = $row;
}


echo json_encode($data_trans);