<?php include_once'../_header.php' ?>

		<div class="box">
	<a href="../dashboard">DASHBOARD</a>
	<h1>Obat</h1>
	<h4>
		<small>Data Obat</small>
		<div class="pull-right">
			<a href="" class="btn btn-default btn-xs">
				<i class="glyphicon glyphicon-refresh"></i>
			</a>
			<a href="tambah.php" class="btn btn-success btn-xs">
				<i class="glyphicon glyphicon-plus">Tambah Obat</i>
			</a>
		</div>
	</h4>
	
	<div style="margin-bottom: 20px; ">
		<form action="" class="form-inline" method="post">
			<div class="form-group">
				<input type="text" name="pencarian" class="form-control" placeholder="Pencarian">
			</div>	
			<div class="form-group">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
			</div>
		</form>
	</div>

	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>No.</th>
					<!-- <th>ID Obat</th> -->
					<th>Nama Obat</th>
					<th>Keterangan</th>
					<th><i class="glyphicon glyphicon-cog"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$batas = 3;
					$hal = @$_GET['hal'];
					
					if (empty($hal)) {
						$posisi = 0;
						$hal = 1;
					}else{
						$posisi= ($hal -1) *$batas;
					}

					$no = 1;
					if (isset($_SERVER['REQUEST_METHOD'])=="POST") {
						if (isset($_POST['pencarian'])) {
							$pencarian = trim($conn->real_escape_string($_POST['pencarian']));
						}

						if (isset($pencarian) != '') { // string pencarian ada
							$sql_obat = $conn->QUERY("SELECT * FROM tb_obat WHERE nama_obat LIKE '%$pencarian%' ");
							$query = $sql_obat;
							$queryJml = $sql_obat;
						}else{ //string pencarian tidak ada
							$sql_obat = $conn->QUERY("SELECT *FROM tb_obat LIMIT $posisi, $batas");
							$queryJml = $conn->QUERY("SELECT * FROM tb_obat");
							$no = $posisi+1;
						}
					}else {
						$sql_obat = $conn->QUERY("SELECT *FROM tb_obat LIMIT $posisi, $batas ");
						$queryJml = $conn->QUERY("SELECT * FROM tb_obat");
						$no = $posisi+1;
						echo $posisi."ELSE";
						echo $batas;
						echo "<pre>", print_r($sql_obat->fetch_All(MYSQLI_ASSOC),1);
					}
					// $sql_obat = $conn->QUERY("SELECT * FROM tb_obat") OR DIE (mysqli_error($conn));
					// $sql_obat = $conn->QUERY("SELECT *FROM tb_obat LIMIT $posisi, $batas ");

					// echo "<pre>", print_r($sql_obat,1);
					// echo "<pre>", print_r($sql_obat->fetch_All(MYSQLI_ASS),1);
					?>	
					<?php if ($sql_obat->num_rows > 0) { ?>
								
						<?php foreach ($sql_obat as $data) { ?>
							<tr>
								<td><?=$no++; ?></td>
								<td><?=$data['nama_obat']; ?></td>
								<td><?=$data['ket_obat']; ?></td>
								<td class="text-center">
									<a href="edit.php?id=<?=$data['id_obat'];?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
									<a href="hapus.php?id=<?=$data['id_obat'];?>" class="btn btn-warning btn-xs" onClick="return confirm('Apakah dia yakin ingin menghapus Data ? ')"><i class="glyphicon glyphicon-trash"></i></a>
								</td>
							</tr>
						<?php } ?> 
					<?php }else{ 
						echo "<tr><td colspan=\"4\" align=\"center\">Data Tidak Ditemukan</td></tr>";
					} ?>
			</tbody>
		</table>
	</div>
	<?php 
		if (isset($_POST['pencarian']) == '') {  ?>
			<div style="float:left;">
				<?php 
					$jml = $queryJml->num_rows;
					echo "Jumlah Data : <b>$jml</b>";
				 ?>
			</div>
			<div style="float:right;">
				<ul class="pagination pagination-sm" style="margin:0; ">
					<?php 
						$jml_hal = ceil($jml / $batas);
						// echo $hal;
						for ($i=1; $i <= $jml_hal; $i++) { 

							if ($i != $hal) { // jika nilai i tidak sama dengan value get hal nya maka tidak ada class activenya
								echo "<li><a href=\"?hal=$i\">$i</a></li>";						
							}else{ //lain jika nilai i sama dengan nilai get halnya maka ditambahkan class active boostrap
								echo "<li class=\"active\"><a>$i</a></li>";
							}
						}
					 ?>
				</ul>
			</div>
		<?php }else {
			echo "<div style=\"float:left;\">";
			$jml = $sql_obat->num_rows;
			echo "Data Hasil Pencarian : <b>$jml</b>";
			echo "</div>";	
		} ?>
	</div>
	
</div>
<?php include_once'../_footer.php'; ?>