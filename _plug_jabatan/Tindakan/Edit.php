<?php
	include 'Crud.php';
	$id_penyakit = $_POST['id_penyakit'];
	$data = array(
		'id_penyakit' => $_POST['id_penyakit'],
		'nama_penyakit' => $_POST['nama_penyakit'],
		'icd_x' => $_POST['icd_x'],
	);

	$crud = new Crud();
	$crud->edit($id, $data);

?>