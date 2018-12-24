<?php
	require 'Crud.php';

	$crud = new crud;

	$no_rm = $_POST['no_rm'];
	$crud->hapus($no_rm);

?>