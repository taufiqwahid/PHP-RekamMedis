<?php 
	require_once('../_header.php');
?>


<div class="box">
	<h1>Obat</h1>
	<h4>
		<small>Tambah Data Obat</small>
		<div class="pull-right">
			<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
		</div>
	</h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="proses.php" method="post">
				<div class="form-group">
					<label for="nama">Nama Obat</label>
					<input type="text" name="nama" id="nama" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<input type="text" name="keterangan" id="keterangan" class="form-control" required="">
				</div>
				<div class="form-group pull-right">
					<input type="submit" name="tambah" value="Simpan" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>
</div>
<?php require_once('../_footer.php'); ?>