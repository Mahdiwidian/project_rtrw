<?php include('../_partials/top.php') ?>

<h1 class="page-header">Kegiatan</h1>
<?php include('_partials/menu.php') ?>

<form action="store.php" method="post" enctype="multipart/form-data">
<h3>Data Kegiatan</h3>
<table class="table table-striped table-middle">
  <tr>
    <th width="20%">Path</th>
    <td width="1%">:</td>
    <td><input type="file" class="form-control" name="file" required></td>
  </tr>
  <tr>
    <th>Caption</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="caption_kegiatan" required></td>
  </tr>
  <tr>
    <th>Tautan</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="tautan_kegiatan"></td>
  </tr>
</table>

<button type="submit" class="btn btn-primary btn-lg">
  <i class="glyphicon glyphicon-floppy-save"></i> Simpan
</button>
</form>

<?php include('../_partials/bottom.php') ?>
