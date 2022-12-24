<?php include('../_partials/top.php') ?>

<h1 class="page-header">Kas Warga</h1>

<?php include('_partials/menu.php') ?>

<?php include('data-index.php') ?>

<div style="margin-top: 26px;">
  <div style="margin-bottom: 20px">
    <span style='color: rgb(55,211,41); font-size: 20px ;font-weight: 700; margin-right: 20px;'>Pemasukan : Rp <?= $data_nominal_trans['Total'] ?></span>
    <span style='color: rgb(203,58,49); font-size: 20px ;font-weight: 700; margin-right: 20px;'>Pengeluaran : Rp <?= $data_nominal_pengeluaran_trans['Total'] ?></span>
  </div>
  <form>
    <select onchange="filter()" id="filterType" style="margin-right: 34px;width: 150px;">
      <option value="all" selected>All</option>
      <option value="income">Pemasukan</option>
      <option value="outcome">Pengeluaran</option>
    </select>
    From: <input type="date" onchange="filter()" id="filterDate" value="<?php echo date('Y-m-d'); ?>" style="width: 150px;margin-bottom: 16px;margin-right: 10px" />
    End: <input type="date" onchange="filter()" id="filterDate2" value="<?php echo date('Y-m-d'); ?>" style="width: 150px;margin-bottom: 16px;" />
    <div id="showData"></div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
  filter();
  function filter() {
    var host = window.location.pathname;

    $('#filterDate2')[0].min = $('#filterDate').val();
    if($('#filterDate2').val() < $('#filterDate').val()){
      console.log('masuk')
      $('#filterDate2').val($('#filterDate').val());
    }

    var filterData = {
      type: $("#filterType").val(),
      date: $("#filterDate").val(),
      date2: $("#filterDate2").val(),
    };

    var urlPath = `${host}/filtered-data.php`.replace('index.php', '')

    $.ajax({
      type: "POST",
      url: urlPath,
      dataType: "JSON",
      data: filterData,
      dataType: "json",
      success: function(data) {
        var html = '';
        var i, valueMoney, classColor;

        if (data.length <= 0) {
          html += '<p>No Data Found</p>';
        } else {
          var first = true;
          for (i = 0; i < data.length; i++) {
            if (data[i].type == 'pemasukan') {
              valueMoney = data[i].nominal
              classColor = 'color: rgb(55,211,41)'
            } else {
              valueMoney = '-' + data[i].nominal
              classColor = 'color: rgb(203,58,49)'
            }
            
            var distinctDate = (data[i-1]?.transaction_date != data[i].transaction_date 
              || data[i-1]?.transaction_date == undefined);

            html += (distinctDate ? `<p style="font-weight: bold;">${data[i].transaction_date}</p>` : '') +
              '<div class="panel panel-primary" style="margin-bottom: 8px;">' +
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