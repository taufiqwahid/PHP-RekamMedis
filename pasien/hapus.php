<?php 
require_once '../_config/config.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM pasien WHERE id_pasien='$id'";
	$hapus = $conn->QUERY($sql) or die;
	if ($hapus) {
		echo "<script>alert('DATA TELAH ANDA HAPUS!!');window.location='data.php';</script>";
	}else{
		echo "<script>alert('ANDA GAGAL MENGHAPUS DATA!!');window.location='data.php';</script>";
	}
 ?>