<?php
	include 'Crud.php';
	$no_rm = $_POST['no_rm'];
	$data = array(
		'no_rm' => $no_rm,
		'no_kk' => $_POST['no_kk'],
		'nama_kk' => $_POST['nama_kk'],
		'nik' => $_POST['nik'],
		'nama_pasien' => $_POST['nama_pasien'],
		'jenis_kelamin' => $_POST['jenis_kelamin'],
		'tempat_lahir' => $_POST['tempat_lahir'],
		'tanggal_lahir' => $_POST['tanggal_lahir'],
		'alamat' => $_POST['alamat'],
		'alergi' => $_POST['alergi'],
	);

	$crud = new Crud();
	$crud->edit($no_rm, $data);

?>