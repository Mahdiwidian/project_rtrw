<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data file
$filename = $_FILES["file"]["name"];
$file_basename = substr($filename, 0, strripos($filename, '.'));
$file_ext = substr($filename, strripos($filename, '.'));
$filesize = $_FILES["file"]["size"];
$allowed_file_types = array('.jpg','.png','.jpeg','.gif','.JPG','.JPEG  ');

if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000))
{
	// Ubah nama file
	$newfilename = md5($file_basename) . $file_ext;
	// if (file_exists("../../assets/upload/" . $newfilename))
	// {
	// 	// Jika file sudah ada
	// 	echo "<script>window.alert('File sudah ada!'); window.location.href='../kegiatan/create.php'</script>";
	// }
	// else
	// {
		
	// }
	move_uploaded_file($_FILES["file"]["tmp_name"], "../../assets/upload/" . $newfilename);

	// ambil data dari form
	$path_kegiatan = $newfilename;
	$caption_kegiatan = htmlspecialchars($_POST['caption_kegiatan']);
	$tautan_kegiatan = htmlspecialchars($_POST['tautan_kegiatan']);

	$id_user = $_SESSION['user']['id_user'];

	// query
	$query = "INSERT INTO `kegiatan` (`path_kegiatan`, `caption_kegiatan`, `tautan_kegiatan`, `id_user`, `created_at`) VALUES ('$path_kegiatan', '$caption_kegiatan', '$tautan_kegiatan', '$id_user', CURRENT_TIMESTAMP);";

	$hasil = mysqli_query($db, $query);

	// cek keberhasilan pendambahan data
	if ($hasil == true) {
	echo "<script>window.alert('Tambah kegiatan berhasil'); window.location.href='../kegiatan'</script>";
	} else {
	echo "<script>window.alert('Tambah kegiatan gagal!'); window.location.href='../kegiatan'</script>";
	}
}
elseif (empty($file_basename))
{
	// file belum dipilih
	echo "<script>window.alert('Pilih file untuk diunggah'); window.location.href='../kegiatan/create.php'</script>";
}
elseif ($filesize > 2000000)
{
	// ukuran file terlalu besar
	echo "<script>window.alert('File yang diunggah terlalu besar!'); window.location.href='../kegiatan/create.php'</script>";
}
else
{
	// format file bukan gambar
	echo "<script>window.alert('Format file salah'); window.location.href='../kegiatan/create.php'</script>";
	unlink($_FILES["file"]["tmp_name"]);
}
