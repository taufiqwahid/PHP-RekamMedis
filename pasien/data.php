<?php include_once'../_header.php' ?>

<div class="box">
	<a href="../dashboard">DASHBOARD</a>
	<h1>Pasien</h1>
	<h4>
		<small>Data Pasien</small>
		<div class="pull-right">
			<a href="" class="btn btn-default btn-xs">
				<i class="glyphicon glyphicon-refresh"></i>
			</a>
			<a href="tambah.php" class="btn btn-success btn-xs">
				<i class="glyphicon glyphicon-plus"></i> Tambah Pasien
			</a>
			<a href="import.php" class="btn btn-info btn-xs">
				<i class="glyphicon glyphicon-import"></i> Import Data
			</a>
		</div>
	</h4>
	
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="tablePasien" >
				<thead>
					<tr>
						<!-- <th>
							<center>
								<input type="checkbox" id="pilih_semua" value="">
							</center>
						</th> -->
						<!-- <th>ID Pasien</th> -->
						<th>Nomor Identitas</th>
						<th>Nama Pasien</th>
						<th>Jenis Kelamin</th>
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
					<script>
						$(document).ready(function() {
						    $('#tablePasien').DataTable( {
						        "processing": true,
						        "serverSide": true,
						        "ajax": 'data_pasien.php',
						        "dom" : 'Bfrtip',
						        buttons: [
						        {
						        	extend : 'pdfHtml5',
						        	title : 'Data Pasien'
						        },
						        {
						        	extend : 'excelHtml5',
						        	title : 'Data Pasien'
						        },
						        {
						        	extend : 'csvHtml5',
						        	title : 'Data Pasien'
						        },
						            'copyHtml5'
						        ],
						        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "ALL"]],
						        "columnDefs":[
							        {
							        	"searchable" : false,
							        	"orderable" : false,
							        	"scrollY":true,
							        	"targets" : 5,
							        	"render" : function(data, type, row){
							        		var btn = "<center><a href=\"edit.php?id="+ data +"\" class=\"btn btn-warning btn-xs\" ><i class=\"glyphicon glyphicon-edit\"></i></a>  <a href=\"hapus.php?id="+data+"\" onclick=\"return confirm('Yakin Ingin Menghapus Data ini')\" class= \"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
							        		return btn;
							        	}
							        }
						        ]
						    } );
						} );
					</script>
				</tbody>
				<!-- <tfoot>
					<tr>
						<th>Nomor Identitas</th>
						<th>Nama Pasien</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>No. Telepon</th>
						<th>
							<center>
								<i class="glyphicon glyphicon-cog"></i>
							</center>
						</th>
					</tr>
				</tfoot> -->
			</table>
		</div>
	<div class="box pull-right">
		<button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
	</div>
</div>
<?php include_once'../_footer.php'; ?>