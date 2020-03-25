<?php 
	require_once'../_config/config.php';
    require '../_assets/libs/vendor/autoload.php';
	use Ramsey\Uuid\Uuid;
	use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['tambah'])) {
	$uuid      = Uuid::uuid4()->toString();
	$identitas = trim($conn->real_escape_string($_POST['identitas']));
	$nama      = trim($conn->real_escape_string($_POST['nama']));
	$jk        = trim($conn->real_escape_string($_POST['jk']));
	$alamat    = trim($conn->real_escape_string($_POST['alamat']));
	$telp      = trim($conn->real_escape_string($_POST['telp']));
	$cekIdentitas = $conn->QUERY("SELECT * FROM pasien WHERE nomor_identitas='$identitas'");
	if ($cekIdentitas->num_rows > 0) {
		echo "<script>alert('NOMOR IDENTITAS SUDAH ADA');window.location='data.php';</script>";
	}else{
		$sql = "INSERT INTO pasien (id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, alamat, no_telp)VALUES('$uuid','$identitas','$nama','$jk','$alamat','$telp')";
		$tambah = $conn->QUERY($sql);
		if ($tambah) {
			echo "<script>confirm('Berhasil Menambahkan Data');</script>";
			echo "<script>window.location='data.php';</script>";
		}else{
			echo "GAGAL MENAMBAHKAN DATA !".$conn->mysqli_error();
		}
	}
}else if (isset($_POST['edit'])) {
	$id        = $_POST['id'];
	$identitas = trim($conn->real_escape_string($_POST['identitas']));
	$nama      = trim($conn->real_escape_string($_POST['nama']));
	$jk        = trim($conn->real_escape_string($_POST['jk']));
	$alamat    = trim($conn->real_escape_string($_POST['alamat']));
	$telp      = trim($conn->real_escape_string($_POST['telp']));
	$cekIdentitas = $conn->QUERY("SELECT * FROM pasien WHERE nomor_identitas='$identitas' AND id_pasien!='$id'");
	if ($cekIdentitas->num_rows == 1) {
		echo "<script>alert('NOMOR IDENTITAS PASIEN TIDAK BOLEH SAMA DENGAN PASIEN LAINNYA ');window.location='data.php';</script>";
	}else{
		$sql = "UPDATE pasien SET nomor_identitas='$identitas', nama_pasien='$nama', jenis_kelamin='$jk', alamat='$alamat', no_telp='$telp' WHERE id_pasien='$id' ";
		$edit = $conn->QUERY($sql);

		if ($edit) {
			echo "<script>confirm('Berhasil Mengubah Data');</script>";
			echo "<script>window.location='data.php';</script>";
		}else{
			echo "GAGAL MENGUBAH DATA !";
		}
	}
}else if(isset($_POST['import'])){
	$file = $_FILES['file']['name'];
	$ekstensi = explode(".", $file);
	$file_name = "file-".round(microtime(true)).".".end($ekstensi);
	$sumber = $_FILES['file']['tmp_name'];
	$target_dir = "../_file/";
	$target_file = $target_dir.$file_name;
	move_uploaded_file($sumber, $target_file);

	$obj = PHPExcel_IOFactory::load($target_file);
	$all_data = $obj->getActiveSheet()->toArray(null, true, true, true);
	for ($i=3; $i < count($all_data); $i++) { 
		$identitas = $all_data[$i]['A'];
		$cekIdentitas = $conn->QUERY("SELECT * FROM pasien WHERE nomor_identitas='$identitas'");
		
		if ($cekIdentitas->num_rows == 1) {
			echo "<script>alert('NOMOR IDENTITAS PASIEN TIDAK BOLEH SAMA DENGAN PASIEN LAINNYA ');window.location='data.php';</script>";
		}else{
			$sql = "INSERT INTO pasien (id_pasien,nomor_identitas,nama_pasien,jenis_kelamin,alamat,no_telp) VALUES ";
			for ($i=3; $i <= count($all_data); $i++) { 
				$uuid = Uuid::uuid4()->toString();
				$identitas = $all_data[$i]['A'];
				$nama = $all_data[$i]['B'];
				$jk = $all_data[$i]['C'];
				$alamat = $all_data[$i]['D'];
				$telp = $all_data[$i]['E'];
				$sql .= " ('$uuid','$identitas','$nama','$jk','$alamat','$telp'),";
			}
			
			$sql = substr($sql, 0,-1);
			$conn->QUERY($sql)or die ("<script>alert('GAGAL MENGIMPORT EXCEL KE DATABASE!! ');window.location='data.php';</script>");	
			unlink($target_file);
			echo "<script>window.location='data.php';</script>";
		}
	}
}

?>