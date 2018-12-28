<?php
	require 'Crud.php';

	$crud = new crud;

	$id = $_POST['id'];
	$crud->hapus($id);

?>