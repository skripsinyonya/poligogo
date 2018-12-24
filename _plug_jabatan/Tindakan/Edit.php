<?php
	include 'Crud.php';
	$id_tindakan = $_POST['id_tindakan'];
	$data = array(
		'id_tindakan' => $_POST['id_tindakan'],
		'nama_tindakan' => $_POST['nama_tindakan'],
		'icd_cm' => $_POST['icd_cm'],
	);

	$crud = new Crud();
	$crud->edit($id_tindakan, $data);

?>