<?php include('../_partials/top.php') ?>

<h1 class="page-header">Kas Warga</h1>

<?php include('data-index.php') ?>


<div style="margin: 26px;"><select style="margin-right: 34px;width: 150px;">
        <option value="all" selected>All</option>
        <option value="income">Pemasukan</option>
        <option value="outcome">Pengeluaran</option>
    </select><input type="date" style="width: 150px;margin-bottom: 16px;" />
    <p style="font-weight: bold;">12/18/2022</p>
    <div class="panel panel-primary" style="margin-bottom: 8px;">
        <div class="panel-body">
            <div style="display: flex; justify-content: space-between;">
                <h4>Rp 10.000</h4><span style="color: rgb(55,211,41);">Pemasukan</span>
            </div>
            <p class="panel-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
        </div>
    </div>
    <div class="panel panel-primary" style="margin-bottom: 8px;">
        <div class="panel-body">
            <div style="display: flex; justify-content: space-between;">
                <h4>Rp -10.000</h4><span style="color: rgb(203,58,49);">Pengeluaran</span>
            </div>
            <p class="panel-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
        </div>
    </div>
</div>


<?php include('../_partials/bottom.php') ?>
