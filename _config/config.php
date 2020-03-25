<?php 
date_default_timezone_set('Asia/jakarta');
session_start();

include_once 'koneksi.php';

$conn = new mysqli($conn['host'],$conn['user'],$conn['pass'],$conn['db']);
if ($conn->connect_error) {
	DIE("GAGAL TERHUBUNG KE DATABASE");
}

function base_url($url = null){
	$base_url = "http://localhost/WEB%20RS%20REKAM%20MEDIS/";
	if ($url!=null) {
		return $base_url."".$url;
	}else{
		return $base_url;
	}
}

function tgl($tgl){
	$tanggal = substr($tgl, 8,2);
	$bulan = substr($tgl, 5,2);
	$tahun = substr($tgl, 0,4);
	return $tanggal."/".$bulan."/".$tahun;
}


?>
