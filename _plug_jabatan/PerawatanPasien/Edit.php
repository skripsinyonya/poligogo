<?php
	include 'Crud.php';
	$id = $_POST['id'];
	$tanggal = $_POST['tanggal'].' '.$_POST['waktu'];
	$data = array(
		'id_tindakan' => $_POST['id_tindakan'],
		'tanggal_dirawat' => $tanggal,
	);

	$crud = new Crud();
	$crud->edit($id, $data);

?>