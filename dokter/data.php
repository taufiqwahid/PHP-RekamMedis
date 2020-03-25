<?php include_once'../_header.php' ?>

<div class="box">
	<a href="../dashboard">DASHBOARD</a>
	<h1>Dokter</h1>
	<h4>
		<small>Data Dokter</small>
		<div class="pull-right">
			<a href="" class="btn btn-default btn-xs">
				<i class="glyphicon glyphicon-refresh"></i>
			</a>
			<a href="tambah.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Tambah Dokter</i></a>
		</div>
	</h4>
	
	<form action="" method="post" name="proses">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="tableDokter">
				<thead>
					<tr>
						<th>
							<center>
								<input type="checkbox" id="pilih_semua" value="">
								<!-- <label for="pilih_semua">Pilih Semua</label> -->
							</center>
						</th>
						<th>No.</th>
						<!-- <th>ID Obat</th> -->
						<th>Nama Dokter</th>
						<th>Spesialis</th>
						<th>Alamat</th>
						<th>No. Telepon</th>
						<th>
							<center>
								<i class="glyphicon glyphicon-cog"></i>
							</center>
						</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$sql  = "SELECT * FROM tb_dokter ";
					$sql  = $conn->QUERY($sql);
					// echo "<pre>", print_r($data,1);
					$data = $sql->fetch_All(MYSQLI_ASSOC);
					// echo "<pre>", print_r($data,1);
				?>
				<?php if ($sql->num_rows){ ?>
					<?php foreach ($data as $no => $data): ?>
						<tr>
							<td align="center">
								<input type="checkbox" name="checked[]" class="pilih" value="<?=$data['id_dokter']; ?>">
							</td>
							<td><?= $no+1; ?></td>
							<td><?= $data['nama_dokter']; ?></td>
							<td><?= $data['spesialis']; ?></td>
							<td><?= $data['alamat']; ?></td>
							<td><?= $data['no_telp']; ?></td>
							<td align="center">
								<a href="edit.php?id=<?=$data['id_dokter']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
				<?php }else{
					echo "<tr><td colspan=\"7\" align= \"center\">Data Tidak Ditemukan</td></tr>";
				} ?>

				</tbody>
			</table>
		</div>
	</form>	
	<div class="box pull-right">
		<button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
	</div>
</div>
	<script>
		$(document).ready(function(){ //semua halaman

    		$('#tableDokter').DataTable({
		     	"columnDefs": [
		      		{
		      			"orderable": false, "targets": [0,1,6]
		      		}		      		
		      	],
		      	"order":[1,"asc"]
		      // "paging":   false,
		        // "ordering": false
		     //    "info":     false
		     // "pagingType": "full_numbers"
    		});

			$('#pilih_semua').on('click', function(){ //id yang di klik
				if (this.checked) { //jika checkbox di klik
					$('.pilih').each(function(){ // masing masing dari yang mempunyai class .pilih menjalankan function
						this.checked = true; // pada checkboxnya true
					})
				}else{
					$('.pilih').each(function(){
						this.checked = false;
					})
				}
			});
			
			$('.pilih').on('click', function(){ //pada tag yang mempunyai class .pilih
				if ($('.pilih:checked').length == $('.pilih').length) { //jika semua class .plih di checked/diklik yang nntinya akan jadi value 1 == sama dengan classpilih mempunyai jg panjang ato valuenya 1
					$('#pilih_semua').prop('checked',true) //perintah pilih semua akan bernilai true 
				}else{
					$('#pilih_semua').prop('checked',false)
				}
			})
		})
		function hapus(){
			var conf = confirm('Yakin akan menghapus data ?');
			if (conf) {
				document.proses.action = 'hapus.php';
				document.proses.submit();
			}
		}
	</script>

<?php include_once'../_footer.php'; ?>