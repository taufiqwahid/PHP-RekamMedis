<?php 
	require_once '../_config/config.php';
	$id    = $_GET['id'];
	$sql   = "DELETE FROM tb_obat WHERE id_obat='$id'";
	$hapus = $conn->QUERY($sql) OR DIE("<script>alert('KAMU GAGAL MENGHAPUS DATA');</script>
		<script>window.location='data.php';</script>");
	if ($hapus) {
		echo "<script>confirm('Berhasil di Hapus !!');</script>";
		echo "<script>window.location='data.php';</script>";
	}

 ?>