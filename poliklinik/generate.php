<?php require_once '../_header.php' ?>

<div class="box">
	<h1>Poli Klinik</h1>
	 <h4>
	 	<small>Data Poli Klinik</small>
	 	<div class="pull-right">
	 		<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
	 	</div>
	 </h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="tambah.php" method="post">
				<div class="form-group">
					<label for="tambahRecord">Banyak Record yang Akan Ditambahkan</label>
					<input type="text" name="tambahRecord" id="tambahRecord" maxlength="2" pattern="[0-9]+" class="form-control" required>
				</div>
				<div class="form-group pull-right">
					<input type="submit" name="generate" value="Genarate" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>
</div>



<?php require_once '../_footer.php' ?>