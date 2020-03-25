<?php 
	require_once '../_config/config.php';
	require '../_assets/libs/vendor/autoload.php';

	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

	if (isset($_POST['tambah'])) {
		$total = $_POST['total'];
		for ($i=1; $i <=$total; $i++) { 
			$uuid   = Uuid::uuid4()->toString();
			$nama   = trim($conn->real_escape_string($_POST['nama-'.$i]));
			$gedung = trim($conn->real_escape_string($_POST['gedung-'.$i]));
			$sql    = "INSERT INTO tb_poliklinik (id_poli,nama_poli,gedung) VALUES ('$uuid','$nama','$gedung')";
			$tambah = $conn->QUERY($sql);
		}
		if ($tambah) {
			echo "<script>alert('".$total." Data berhasil ditambahkan'); window.location='data.php';</script>";
		}else{
			echo "<script>alert('".$total."Data GAGAL Ditambahkan'); window.location='generate.php';</script>".$conn->mysqli_error();
		}
	}else if(isset($_POST['edit'])){ 
		$total = count($_POST['id']);
		for ($i=0; $i<$total; $i++) { 
			$id     = $_POST['id'][$i];
			$nama   =$_POST['nama'][$i];			
			$gedung =$_POST['gedung'][$i];
			$sql    = "UPDATE tb_poliklinik SET nama_poli='$nama', gedung='$gedung' WHERE id_poli='$id'";
			$edit   = $conn->QUERY($sql);
		}
		if ($conn->affected_rows) {
			echo "<script>alert('".$total." Data berhasil Ubah');window.location='data.php';</script>";
		}else{
			echo "<script>alert('Data GAGAL Ditambahkan'); window.location='data.php';</script>".$conn->mysqli_error();
		}
	}


 ?>