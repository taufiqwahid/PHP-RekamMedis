<?php 
	require_once('../_header.php');
?>


<div class="box">
	<h1>Dokter</h1>
	<h4>
		<small>Edit Data Dokter</small>
		<div class="pull-right">
			<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
		</div>
	</h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<?php 
				$id   = @$_GET['id'];
				
				$sql  = "SELECT * FROM tb_dokter WHERE id_dokter='$id'";
				$sql  = $conn->QUERY($sql);
				$data = $sql->fetch_All(MYSQLI_ASSOC);
				foreach ($sql as $data) {
			 ?>
			<form action="proses.php" method="post">
				<input type="hidden" name="id" value="<?=$data['id_dokter']; ?>">
				<div class="form-group">
					<label for="nama">Nama Dokter</label>
					<input type="text" name="nama" id="nama" class="form-control" required="" value="<?=$data['nama_dokter']; ?>">
				</div>
				<div class="form-group">
					<label for="spesialis">Spesialis</label>
					<input type="text" name="spesialis" id="spesialis" class="form-control" required="" value="<?=$data['spesialis']; ?>">
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<textarea name="alamat" id="alamat" class="form-control" required=""><?=$data['alamat']; ?></textarea>
				</div>
				<div class="form-group">
					<label for="telp">No. Telepon</label>
					<input type="number" name="telp" id="telp" class="form-control" required="" value="<?=$data['no_telp']; ?>">
				</div>
				<div class="form-group pull-right">
					<input type="submit" name="edit" value="Simpan" class="btn btn-success">
				</div>
			</form>
			<?php } ?>
		</div>
	</div>
</div>
<?php require_once('../_footer.php'); ?>