<?php require_once('../_header.php');?>
<div class="box">
	<h1>Dokter</h1>
	<h4>
		<small>Tambah Data Dokter</small>
		<div class="pull-right">
			<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
		</div>
	</h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="proses.php" method="post">
				<div class="form-group">
					<label for="pasien">Pasien</label>
					<select name="pasien" id="pasien" class="form-control" required="">
						<option value="">- Pilih -</option>
						<?php
							$sql = $conn->QUERY("SELECT * FROM pasien");
							foreach ($sql as $data) {
								echo '<option value="'.$data['id_pasien'].'">'.$data['nama_pasien'].'</option>';
							}							
						 ?>
					</select>
				</div>
				<div class="form-group">
					<label for="keluhan">Keluhan</label>
					<textarea name="keluhan" id="keluhan" class="form-control" required="">Masukkan Keluhan Disini!</textarea>
				</div>
				<div class="form-group">
					<label for="dokter">Dokter</label>
					<select name="dokter" id="dokter" class="form-control" required="">
						<option value="">- Pilih -</option>
						<?php
							$sql = $conn->QUERY('SELECT * FROM tb_dokter');
							foreach ($sql as $data) {
								echo '<option value="'.$data['id_dokter'].'">'.$data['nama_dokter'].'</option>';
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="diagnosa">Diagnosa</label>
					<textarea name="diagnosa" id="diagnosa" class="form-control" required=""></textarea>
				</div>
				<div class="form-group">
					<label for="poli">PoliKlinik</label>
					<select name="poli" id="poli" class="form-control" required="">
						<option value="">- Pilih -</option>
						<?php
							$sql = $conn->QUERY('SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC');
							foreach ($sql as $data) {
								echo '<option value="'.$data['id_poli'].'">'.$data['nama_poli'].'</option>';
							}
						 ?>
					</select>
				</div>
				<div class="form-group">
					<label for="obat">Obat</label>
					<select name="obat[]" id="obat" class="form-control" multiple="" size="5">
						<option value="">- Pilih -</option>
						<?php
							$sql = $conn->QUERY('SELECT * FROM tb_obat');
							foreach ($sql as $data) {
								echo '<option value="'.$data['id_obat'].'">'.$data['nama_obat'].'</option>';
							}
						 ?>
					</select>
				</div>
				<div class="form-group">
					<label for="tgl">Tanggal Periksa</label>
					<input type="date" value="<?=date('Y-m-d') ?>" name="tgl" id="tgl" class="form-control" required="">
				</div>
				<div class="form-group pull-right">
					<input type="submit" name="tambah" value="Simpan" class="btn btn-success ">
					<input type="reset" name="reset" value="Reset" class="btn btn-default">
				</div>
			</form>
		</div>
	</div>
</div>
<script src="../_assets/libs/vendor/ckeditor/ckeditor/ckeditor.js"></script>
<script>CKEDITOR.replace( 'keluhan',{
	uiColor:'#EC971F',
	height:'10%'
} );</script>
<?php require_once('../_footer.php'); ?>