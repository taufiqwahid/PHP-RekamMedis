<?php 
	require_once'../_config/config.php';
	// $id=$_GET['id'];
	$sql = "DELETE FROM tb_rekammedis WHERE id_rm='$_GET[id]' ";
	$sql = $conn->QUERY($sql);
	if ($sql) {
		echo "<script>alert('BERHASIL MENGHAPUS DATA REKAM MEDIS PASIEN');window.location='data.php';</script>";
	}else{
		echo "<script>alert('GAGAL MENGHAPUS DATA REKAM MEDIS PASIEN');window.location='data.php';</script>";
	}


 ?>