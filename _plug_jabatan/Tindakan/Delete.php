<?php
	require 'Crud.php';

	$crud = new crud;

	$id_tindakan = $_POST['id_tindakan'];
	$crud->hapus($id_tindakan);

?>