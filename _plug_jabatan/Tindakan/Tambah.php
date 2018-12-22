<?php
#require '../../_config/config.php';
require 'Crud.php';
$crud = new Crud;

$nama = $_POST['nama_tindakan'];
$norm = $_POST['no_rm'];
$icdcm = $_POST['icd_cm'];
$status = $_POST['status'];

$gambar = time().$_FILES['gambar']['name'];
$type = $_FILES['gambar']['type'];
$size = $_FILES['gambar']['size'];
$tmp = $_FILES['gambar']['tmp_name'];
$dirUpload = '../../_images/Upload/';
$terUpload = move_uploaded_file($tmp, $dirUpload.$gambar);

$date = date('Y-m-d');

//$query = mysqli_query($con, "insert into master_pegawai values('$nip', $nama $jabatan, $jenis, $tempat, $tanggal, $alamat, $no, $date, $username, $password, $gambar )");
if($type == 'image/jpeg' || $type == 'image/png' || $type = 'image/jpg'){

	if($size <= 300000){

		if($terUpload){

			$data = array(
				'nama_tindakan' => $nama,
				'icd_cm' => $icdcm,
				'no_rm' => $norm,
				'foto_rontgen' => $gambar,
				'status' => $status
			);
			$crud->tambah($data);

		}else{
			echo "<script>alert('Re-Upload');window.location='Index.php'</script>";
		}

	}else{

		echo "<script>alert('Ukuran Harus kurang 300kb');window.location='Index.php';</script>";

	}

}else{
	echo "<script>alert('Type Harus jpeg,PNG,jpg')</script>";
	header('Index.php');
}

?>