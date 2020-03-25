<?php 
	require_once'../_config/config.php';
    require '../_assets/libs/vendor/autoload.php';
	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['tambah'])) {
	$uuid      = Uuid::uuid4()->toString();
	$nama      = trim($conn->real_escape_string($_POST['nama']));
	$spesialis = trim($conn->real_escape_string($_POST['spesialis']));
	$alamat    = trim($conn->real_escape_string($_POST['alamat']));
	$telp      = trim($conn->real_escape_string($_POST['telp']));
	$sql = "INSERT INTO tb_dokter(id_dokter,nama_dokter,spesialis,alamat,no_telp)
			VALUES('$uuid','$nama','$spesialis','$alamat','$telp')";
	$tambah = $conn->QUERY($sql);
	if ($tambah) {
		echo "<script>confirm('Berhasil Menambahkan Data');</script>";
		echo "<script>window.location='data.php';</script>";
	}else{
		echo "GAGAL MENAMBAHKAN DATA !".$conn->mysqli_error();
	}
}else if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$nama      = trim($conn->real_escape_string($_POST['nama']));
	$spesialis = trim($conn->real_escape_string($_POST['spesialis']));
	$alamat    = trim($conn->real_escape_string($_POST['alamat']));
	$telp      = trim($conn->real_escape_string($_POST['telp']));
	$sql = "UPDATE tb_dokter SET nama_dokter='$nama',spesialis='$spesialis',alamat='$alamat',no_telp='$telp' WHERE id_dokter='$id'";
	$edit = $conn->QUERY($sql);
	if ($edit) {
		echo "<script>confirm('Berhasil Mengubah Data');</script>";
		echo "<script>window.location='data.php';</script>";
	}else{
		echo "GAGAL MENGUBAH DATA !".$conn->mysqli_error();
	}
}

?>