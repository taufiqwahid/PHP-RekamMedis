<?php 
	$pilihRecord = @$_POST['checked'];
	// echo "<pre>", print_r($pilihRecord,1);
	if (!isset($pilihRecord)) {
		echo "<script>alert('Tidak ada data yang dipilih!'); window.location='data.php';</script>";
	}else{
		 require_once '../_header.php' ?>

		<div class="box">
			<h1>Poli Klinik</h1>
			<h4>
				<small>Edit Data Poli Klinik</small>
				<div class="pull-right">
					<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
				</div>
			</h4>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<form action="proses.php" method="post">
						<input type="hidden" name="total" value="<?= @$_POST['tambahRecord']; ?>">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama PoliKlinik</th>
									<th>Gedung</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$no = 1;
									foreach ($pilihRecord as $no => $id) {
										$sql_poli = "SELECT *  FROM tb_poliklinik WHERE id_poli = '$id'";
										$sql_poli = $conn->QUERY($sql_poli);
										$data = $sql_poli->fetch_array(MYSQLI_ASSOC);
										// echo "<pre>", print_r($data,1);
								 ?>
								<tr>
									<input type="hidden" name="id[]" value="<?=$data['id_poli']; ?>">
									<td><?= $no+1;?></td>
									<td>
										<input type="text" name="nama[]" class="form-control"  value="<?=$data['nama_poli']; ?>" required>
									</td>
									<td>
										<input type="text" name="gedung[]" class="form-control" value="<?=$data['gedung']; ?>" required>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<div class="form-group pull-right">
							<input type="submit" name="edit" value="Simpan Semua" class="btn btn-success">
						</div>
					</form>
				</div>
			</div>
		</div>

<?php 
	require_once '../_footer.php'; 
	}?>