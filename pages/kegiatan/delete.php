<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$id_kegiatan = htmlspecialchars($_GET['id_kegiatan']);
$path_kegiatan = htmlspecialchars($_GET['path_kegiatan']);

// delete database
$query = "DELETE FROM kegiatan WHERE id_kegiatan = $id_kegiatan";

$hasil = mysqli_query($db, $query);

// delete file
exec("rm ../../assets/upload/".$path_kegiatan);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.location.href='../kegiatan'</script>";
} else {
  echo "<script>window.alert('Foto gagal dihapus!'); window.location.href='../kegiatan'</script>";
}
