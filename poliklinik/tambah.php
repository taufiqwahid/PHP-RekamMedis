<?php require_once '../_header.php' ?>

<div class="box">
	<h1>Poli Klinik</h1>
	 <h4>
	 	<small>Tambah Data Poli Klinik</small>
	 	<div class="pull-right">
	 		<a href="data.php" class="btn btn-info btn-xs">Data</a>
	 		<a href="generate.php" class="btn btn-info btn-xs">Tambah Data Lagi </a>
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
					<?php for ($i=1; $i<=@$_POST['tambahRecord']; $i++) { ?>
						<tr>
							<td><?= $i; ?></td>
							<td>
								<input type="text" name="nama-<?=$i;?>" class="form-control" required>
							</td>
							<td>
								<input type="text" name="gedung-<?=$i;?>" class="form-control" required>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<div class="form-group pull-right">
					<input type="submit" name="tambah" value="Simpan Semua" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>
</div>


<?php require_once '../_footer.php' ?>