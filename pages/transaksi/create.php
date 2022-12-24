<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Kas</h1>
<?php include('_partials/menu.php') ?>

<form action="store.php" method="post">
<table class="table table-striped table-middle">  
  <tr>
    <th>ID Kepala Keluarga</th>
    <td>:</td>
    <td>
      <select class="form-control selectlive" name="type" required>
        <option value="" selected disabled>- pilih -</option>
        <option value="pemasukan">Pemasukan</option>
        <option value="pengeluaran">Pengeluaran</option>
      </select>
    </td>
  </tr>
  <tr>
    <th width="20%">Nominal</th>
    <td width="1%">:</td>
    <td><input type="text" class="form-control" name="nominal" required></td>
  </tr>
  <tr>
    <th width="20%">Description</th>
    <td width="1%">:</td>
    <td><input type="text" class="form-control" name="description" required></td>
  </tr>
</table>

<button type="submit" class="btn btn-primary btn-lg">
  <i class="glyphicon glyphicon-floppy-save"></i> Simpan
</button>
</form>

<?php include('../_partials/bottom.php') ?>
