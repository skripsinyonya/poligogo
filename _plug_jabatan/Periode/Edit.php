<?php
	include 'Crud.php';
	$id = $_POST['id'];
	$data = array(
		'nip' => $_POST['nip'],
		'nama' => $_POST['nama'],
		'jabatan' => $_POST['jabatan'],
		'jenis_kelamin' => $_POST['jenis_kelamin'],
		'tempat_lahir' => $_POST['tempat_lahir'],
		'tanggal_lahir' => $_POST['tanggal_lahir'],
		'alamat' => $_POST['alamat'],
		'no_telepon' => $_POST['no_telepon'],
	);

	$crud = new Crud();
	$crud->edit($id, $data);

?>