<?php 
    require_once'../_config/config.php';
    require '../_assets/libs/vendor/autoload.php';
	if (!isset($_SESSION['user'])) {
		echo "<script>window.location='".base_url('auth/login.php')."'</script>";		
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Aplikasi Rumah Sakit</title>
 	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
 	<link rel="stylesheet" href="<?= base_url('_assets/css/bootstrap.min.css'); ?>">
 	<link rel="stylesheet" href="<?= base_url('_assets/css/simple-sidebar.css'); ?>">
    <link rel="stylesheet" href="<?=base_url('_assets/libs/DataTables/datatables.min.css')?>">
 </head>
 <body>
	<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <h2><a href=""><span class="text-primary"><b>Rumah Sakit</b></span></a></h2>
                </li>
                <li>
                    <a href="<?=base_url('dashboard')?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?= base_url('pasien/data.php') ?>">Data Pasien</a>
                </li>
                <li>
                    <a href="<?=base_url('dokter/data.php'); ?>">Data Dokter</a>
                </li>
                <li>
                    <a href="<?=base_url('poliklinik/data.php'); ?>">Data Poliklinik</a>
                </li>
                <li>
                    <a href="<?=base_url('obat/data.php'); ?>">Data Obat</a>
                </li>
                <li>
                    <a href="<?=base_url('rekam_medis/data.php'); ?>">Rekam Medis</a>
                </li>
                <li class="sidebar-brand">
                    <a href="<?=base_url('auth/logout.php')?>" class="container"><button type="button" class=" btn btn-danger">Logout</button></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
            <script src="<?= base_url('_assets/js/jquery.js'); ?>"></script>
            <script src="<?= base_url('_assets/js/bootstrap.min.js'); ?>"></script>
            <script src="<?=base_url('_assets/libs/DataTables/datatables.min.js') ?>"></script>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">