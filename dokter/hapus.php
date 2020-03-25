<?php 
	require_once "../_config/config.php";
	$pilihRecord = $_POST['checked'];
	if (!isset($pilihRecord)) {
		echo "<script>alert('Tidak Ada Data Yang Dipilih!'); window.location='data.php';</script>";
	}else{
		foreach ($pilihRecord as $id) {
			$sql = "DELETE FROM tb_dokter WHERE id_dokter='$id' ";
			$hapus = $conn->QUERY($sql);
		}
		if ($hapus) {
			echo "<script>alert('".count($pilihRecord)." DATA BERHASIL DIHAPUS'); window.location='data.php';</script>";

		}else{
			echo "<script>alert('DATA GAGAL DIHAPUS ATAU DATA DOKTERNYA SEDANG DIGUNAKAN');window.location='data.php';</script>";
		}
	}
 ?>