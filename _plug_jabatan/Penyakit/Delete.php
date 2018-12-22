<?php
	require 'Crud.php';

	$crud = new crud;

	$id_penyakit = $_POST['id_penyakit'];
	$crud->hapus($id_penyakit);

?>