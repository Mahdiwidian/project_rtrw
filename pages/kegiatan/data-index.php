<?php
include('../../config/koneksi.php');

// ambil dari database
$query = "SELECT * FROM kegiatan";

$hasil = mysqli_query($db, $query);

$data_kegiatan = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_kegiatan[] = $row;
}
