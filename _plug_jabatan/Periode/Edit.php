<?php
	include 'Crud.php';
	$id = $_POST['id'];
	$data = array(
		'diagnosis' => $_POST['diagnosis'],
		'tindakan' => $_POST['tindakan'],
	);

	$crud = new Crud();
	$crud->edit($id, $data);

?>