<?php
#require '../../_config/config.php';
require 'Crud.php';
$crud = new Crud;

			$id_penyakit = $_POST['id_penyakit'];
	    	$nama_penyakit = $_POST['nama_penyakit'];
	    	$icd_x = $_POST['icd_x'];
	    	

//$query = mysqli_query($con, "insert into master_pegawai values('$nip', $nama $jabatan, $jenis, $tempat, $tanggal, $alamat, $no, $date, $username, $password, $gambar )");

$data = array(
	'id_penyakit' => $id_penyakit,
	'nama_penyakit' => $nama_penyakit,
	'icd_x' => $icd_x,
);
$crud->tambah($data);

//$crud->pre($crud->tambah($data));
?>