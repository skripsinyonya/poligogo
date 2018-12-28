<?php
#require '../../_config/config.php';
require 'Crud.php';
$crud = new Crud;

$now = $crud->sekarang();
$data = array(
	'no_rm' => $_POST['no_rm'],
	'diagnosis' => $_POST['diagnosis'],
	'tindakan' => $_POST['tindakan'],
	'tanggal_kunjungan' => $now,
);

$crud->tambah($data);
//$crud->pre($data);
?>