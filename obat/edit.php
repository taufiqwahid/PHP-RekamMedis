<?php 
	require_once '../_config/config.php';
	require_once '../_header.php';
 ?>

 <h1>OBAT</h1>
 <h4>
 	<small>Edit Data Obat</small>
 	<div class="pull-right">
	 	<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-right"></i> Kembali</a>
 	</div>
 </h4>
 <?php
	$id     = $_GET['id']; 	
	$sql    = "SELECT * FROM tb_obat WHERE id_obat='$id'";
	$edit   = $conn->QUERY($sql);
	$tampil = $edit->fetch_object();
 	// $tampil = $edit->fetch_array();
  ?>
 <div class="row">
 	<div class="col-lg-6 col-lg-offset-3">
	 	<form action="proses.php" method="post">
	 		<div class="form-group">
	 			<!-- DATA ID -->
	 			<input type="hidden" value="<?= $tampil->id_obat;?>" name="id_obat">
	 			<!-- END DATA ID -->
	 			<label for="nama">Nama Obat</label>
	 			<input type="text" name="nama" id="nama" class="form-control" value="<?= $tampil->nama_obat; ?>">
	 		</div>
	 		<div class="form-group">
	 			<label for="keterangan">Keterangan</label>
	 			<input type="text" class="form-control" name="keterangan" value="<?= $tampil->ket_obat; ?>">
	 		</div>
	 		<div class="form-group pull-right">
	 			<input type="submit" class="btn btn-success" value="Edit Data" name="edit">
	 		</div>
	 	</form>
	 </div>
 </div>
 <?php require_once '../_footer.php'; ?>
 