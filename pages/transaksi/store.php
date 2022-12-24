<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$type = htmlspecialchars($_POST['type']);
$nominal = htmlspecialchars($_POST['nominal']);
$desc = htmlspecialchars($_POST['description']);

$id_user = $_SESSION['user']['id_user'];

// masukkan ke database

$query = "INSERT INTO transaksi (`type`, `nominal`, `description`, `id_user`, `created_at`, `updated_at`) VALUES ('$type', '$nominal', '$desc', '$id_user', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000');";

$hasil = mysqli_query($db, $query);

// id terakhir
// mysqli_insert_id($db)

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Tambah Transaksi Berhasil'); window.location.href='../transaksi/create.php'</script>";
} else {
  echo "<script>window.alert('Tambah Transaksi Berhasil'); window.location.href='../transaksi/create.php'</script>";
}
