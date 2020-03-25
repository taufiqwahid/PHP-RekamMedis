<?php 
	$pilihRecord = $_POST['checked'];
	if (!isset($pilihRecord)) {
		echo "<script>alert('Tidak ada data yang dipilih!'); window.location='data.php';</script>";
	}else{
		$total = count($pilihRecord);
		require_once '../_config/config.php';
		foreach ($pilihRecord as $id) {
			$sql = "DELETE FROM tb_poliklinik WHERE id_poli ='$id'";
			$hapus = $conn->QUERY($sql);
		}
		if ($hapus) {
			echo "<script>alert('".$total." BERHASIL MENGHAPUS DATA!'); window.location='data.php';</script>";	
		}else{
			echo "<script>alert('GAGAL MENGHAPUS DATA!'); window.location='data.php';</script>".$conn->mysqli_error();	
		}
	}	
 ?>