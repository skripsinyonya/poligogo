<?php
#require '../../_config/config.php';
require 'Crud.php';
$crud = new Crud;

	$no_rm = $_POST['no_rm'];
	$nama_pasien = $_POST['nama_pasien'];
	$jenis_kelamin = !empty($_POST['jenis_kelamin'][0]) ? $_POST['jenis_kelamin'][0] : $_POST['jenis_kelamin'][1];
	$tempat_tinggal = $_POST['tempat_tinggal'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
	$nik = $_POST['nik'];
	$nama_kk = $_POST['nama_kk'];
	$no_kk = ($_POST['no_kk']);
	$alergi = ($_POST['alergi']);

$date = date('Y-m-d');

//$query = mysqli_query($con, "insert into master_pegawai values('$nip', $nama $jabatan, $jenis, $tempat, $tanggal, $alamat, $no, $date, $username, $password, $gambar )");

		if($terUpload){

			$data = array(
				'no_rm' => $no_rm,
				'nama_pasien' => $nama_pasien,
				'jenis_kelamin' => $jenis_kelamin,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'alamat' => $alamat,
				'nik' => $nik,
				'nama_kk' => $nama_kk,
				'no_kk' => $no_kk,
				'alergi' => $alergi,
			);
			$crud->tambah($data);

		}else{
			echo "<script>alert('Re-Upload');window.location='Index.php'</script>";
		}
//$crud->pre($crud->tambah($data));
?>