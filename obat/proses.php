<?php 
	require_once'../_config/config.php';
    require '../_assets/libs/vendor/autoload.php';
	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['tambah'])) {
	$uuid       = Uuid::uuid4()->toString();
	$nama       = trim($conn->real_escape_string($_POST['nama']));
	$keterangan = trim($conn->real_escape_string($_POST['keterangan']));
	$sql        = "INSERT INTO tb_obat(id_obat,nama_obat,ket_obat)VALUES('$uuid','$nama','$keterangan')";
	$tambah     = $conn->QUERY($sql);
	if ($tambah) {
		echo "<script>confirm('Berhasil Menambahkan Data');</script>";
		echo "<script>window.location='data.php';</script>";
	}else{
		echo "GAGAL MENAMBAHKAN DATA !".$conn->mysqli_error();
	}
}else if (isset($_POST['edit'])) {
	$id         = $_POST['id_obat'];
	$nama       = trim($conn->real_escape_string($_POST['nama']));
	$keterangan = trim($conn->real_escape_string($_POST['keterangan']));
	$sql        = "UPDATE tb_obat SET nama_obat='$nama', ket_obat='$keterangan' WHERE id_obat='$id'";
	$edit       = $conn->QUERY($sql);
	if ($edit) {
		echo "<script>window.location='data.php';</script>";
	}

}

?>