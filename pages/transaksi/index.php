<?php include('../_partials/top.php') ?>

<h1 class="page-header">Kas Warga</h1>

<?php include('data-index.php') ?>

<div style="margin: 26px;">
  <form method="POST">
    <select name="typeDropdown" id='typeDropdown' style="margin-right: 34px;width: 150px;">
      <option value="all" selected>All</option>
      <option value="income">Pemasukan</option>
      <option value="outcome">Pengeluaran</option>
    </select><input type="date" style="width: 150px;margin-bottom: 16px;" />
    <p style="font-weight: bold;">12/18/2022</p>
    <?php foreach ($data_trans as $trans) : ?>
      <div class="panel panel-primary" style="margin-bottom: 8px;">
        <div class="panel-body">
          <div style="display: flex; justify-content: space-between;">
            <h4>Rp <?php echo $trans['type'] == 'pemasukan' ? '' : '-' ?><?= $trans['nominal'] ?></h4><span style="<?php echo $trans['type'] == 'pemasukan' ? 'color: rgb(55,211,41)' : 'color: rgb(203,58,49)' ?>"><?= $trans['type'] ?></span>
          </div>
          <p class="panel-text"><?= $trans['description'] ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </form>
</div>

<?php if (isset($_POST['typeDropdown'])) var_dump($_POST['typeDropdown']) ?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
  $('document').ready(function() {
    $('#typeDropdown').on('change', function(e) {
      if (isNaN(this.value))
        // alert("Please enter a number", e);
        console.log($data_trans)
      else {
        alert('value', $data_trans);
      }
    });
  });
</script> -->

<?php include('../_partials/bottom.php') ?>