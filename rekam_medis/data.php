<?php include_once'../_header.php' ?>

<div class="box">
	<a href="../dashboard">DASHBOARD</a>
	<h1>Rekam Medis</h1>
	<h4>
		<small>Data Rekam Medis</small>
		<div class="pull-right">
			<a href="" class="btn btn-default btn-xs">
				<i class="glyphicon glyphicon-refresh"></i>
			</a>
			<a href="tambah.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Tambah Rekam Medis</i></a>
		</div>
	</h4>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="tableRekamMedis">
				<thead>
					<tr>
						<th>
							<center>No.</center>
						</th>
						<th>Tanggal Periksa</th>
						<th>Nama Pasien</th>
						<th>Keluhan</th>
						<th>Nama Dokter</th>
						<th>Diagnosa</th>
						<th>Nama Poli</th>
						<th>Data Obat</th>
						<th>
							<center><i class="glyphicon glyphicon-cog"></i></center>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$sql = "SELECT * FROM tb_rekammedis
							INNER JOIN pasien ON tb_rekammedis.id_pasien = pasien.id_pasien
							INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_dokter
							INNER JOIN tb_poliklinik ON tb_rekammedis.id_poli = tb_poliklinik.id_poli
					";
					$sql = $conn->QUERY($sql);
					echo "<pre>", print_r($sql->fetch_all(MYSQLI_ASSOC),1);
					foreach ($sql as $no => $data) { ?>
						<tr>
							<td><center><?=$no+1 ?></center></td>
							<td><?=tgl($data['tgl_periksa']); ?></td>
							<td><?=$data['nama_pasien'] ?></td>
							<td><?=$data['keluhan'] ?></td>
							<td><?=$data['nama_dokter'] ?></td>
							<td><?=$data['diagnosa'] ?></td>
							<td><?=$data['nama_poli'] ?></td>
							<td>
								<?php 
									$sql_obat = "SELECT * FROM tb_obat_rm INNER JOIN tb_obat ON tb_obat_rm.id_obat=tb_obat.id_obat WHERE id_rm='$data[id_rm]'";
									$sql_obat=$conn->QUERY($sql_obat);
									// echo "<pre>", print_r($sql_obat->fetch_all(MYSQLI_ASSOC),1);
									foreach ($sql_obat as $obat) {
										echo $obat['nama_obat']."<br>";
									}
								 ?>
							 </td>
							<td>
								<center>
									<a href="hapus.php?id=<?=$data['id_rm'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Menghapus Data ?');">
										<i class="glyphicon glyphicon-trash"></i>
									</a>
								</center>
							</td>	
						</tr>	
					<?php } ?>
				</tbody>
		</table>
	<script>
		$(document).ready(function() {
		    $('#tableRekamMedis').DataTable();
		} );

	</script>
</div>
<?php include_once'../_footer.php'; ?>