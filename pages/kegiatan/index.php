<?php include('../_partials/top.php') ?>

<h1 class="page-header">Kegiatan</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-index.php') ?>

<div class="row">
  <?php foreach ($data_kegiatan as $kegiatan): ?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a href="../../assets/upload/<?php echo $kegiatan['path_kegiatan'] ?>" data-lightbox="kegiatan" data-title="<?php echo $kegiatan['caption_kegiatan'] ?>">
        <img src="../../assets/upload/<?php echo $kegiatan['path_kegiatan'] ?>">
      </a>
      <div class="caption">
        <p><?php echo $kegiatan['caption_kegiatan'] ?></p>
        <p><small><?php echo $kegiatan['tautan_kegiatan'] ?></small></p>
        <p>
          <a href="../../assets/upload/<?php echo $kegiatan['path_kegiatan'] ?>" data-lightbox="kegiatan2" data-title="<?php echo $kegiatan['caption_kegiatan'] ?>" class="btn btn-primary btn-sm" role="button">
            <i class="glyphicon glyphicon-zoom-in"></i>
          </a>
          <a href="delete.php?id_kegiatan=<?php echo $kegiatan['id_kegiatan'] ?>&path_kegiatan=<?php echo $kegiatan['path_kegiatan'] ?>" class="btn btn-danger btn-sm" role="button" onclick="return confirm('Yakin hapus foto ini?')">
            <i class="glyphicon glyphicon-trash"></i>
          </a>
        </p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<?php include('../_partials/bottom.php') ?>
