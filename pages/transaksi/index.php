<?php include('../_partials/top.php') ?>

<h1 class="page-header">Kas Warga</h1>

<?php include('data-index.php') ?>

<div style="margin: 26px;">
  <form>
    <select onchange="filter()" id="filterType" style="margin-right: 34px;width: 150px;">
      <option value="all" selected>All</option>
      <option value="income">Pemasukan</option>
      <option value="outcome">Pengeluaran</option>
    </select><input type="date" onchange="filter()" id="filterDate" value="<?php echo date('Y-m-d'); ?>" style="width: 150px;margin-bottom: 16px;" />
    <div id="showData">
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
    </div>
  </form>
</div>

<?php if (isset($_POST['typeDropdown'])) var_dump($_POST['typeDropdown']) ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- <script>
  $('document').ready(function() {
    $('#typeDropdown').on('change', function() {
      $('#filterForm').submit(), function(res) {
        console.log(res)
      };
    });
  });
</script> -->
<script>
  function filter() {
    var filterData = {
      type: $("#filterType").val(),
      date: $("#filterDate").val(),
    };

    $.ajax({
      type: "POST",
      url: "transaksi/filter-index.php",
      dataType: "JSON",
      data: filterData,
      dataType: "json",
      success: function(data) {
        var html = '';
        var i, valueMoney, classColor;

        if (data.length <= 0) {
          html += '<p>No Data Found</p>';
        } else {
          for (i = 0; i < data.length; i++) {
            if (data[i].type == 'pemasukan') {
              valueMoney = data[i].nominal
              classColor = 'color: rgb(55,211,41)'
            } else {
              valueMoney = '-' + data[i].nominal
              classColor = 'color: rgb(203,58,49)'
            }

            html += '<div class="panel panel-primary" style="margin-bottom: 8px;">' +
              '<div class="panel-body">' +
              '<div style="display: flex; justify-content: space-between;">' +
              '<h4>Rp ' + valueMoney + '</h4>' +
              '<span style="' + classColor + '">' + data[i].type + '</span>' +
              '</div>' +
              '<p class="panel-text">' + data[i].description + '</p>' +
              '</div>' +
              '</div>';
          }
        }

        $('#showData').html(html);
      }
    });
  }
</script>

<?php include('../_partials/bottom.php') ?>