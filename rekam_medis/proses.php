<?php 	
	require_once '../_config/config.php';
	require "../_assets/libs/vendor/autoload.php";

	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

	if (isset($_POST['tambah'])) {
		$uuid = Uuid::uuid4()->toString();
		$pasien = trim($conn->real_escape_string($_POST['pasien']));
		$keluhan = trim($conn->real_escape_string($_POST['keluhan']));
		$dokter = trim($conn->real_escape_string($_POST['dokter']));
		$diagnosa = trim($conn->real_escape_string($_POST['diagnosa']));
		$poli = trim($conn->real_escape_string($_POST['poli']));
		
		$tgl = trim($conn->real_escape_string($_POST['tgl']));
		$sql = "INSERT INTO tb_rekammedis (id_rm,id_pasien,keluhan,id_dokter,diagnosa,id_poli,tgl_periksa)VALUES('$uuid','$pasien','$keluhan','$dokter','$diagnosa','$poli','$tgl')";
		$tambah = $conn->QUERY($sql);
		if ($tambah) {
			echo "<script>alert('BERHASIL MENAMBAHKAN DATA REKAM MEDIS PASIEN');</script>";	
		}
		$obat = $_POST['obat'];
		foreach ($obat as $obt) {
			$conn->QUERY("INSERT INTO tb_obat_rm (id_rm,id_obat) VALUES ('$uuid','$obt')");
		}
		echo "<script>window.location='data.php'</script>";
	}

 ?>