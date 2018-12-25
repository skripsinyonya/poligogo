<?php
#require '../../_config/config.php';
require 'Crud.php';
$crud = new Crud;

$nip = $crud->get_nip($_POST['nip']); //get nip

$tanggal_dirawat = $_POST['tanggal'].' '.$_POST['waktu'];

$data = array(
	'nip_perawat' => $nip['nip'],
	'id_tindakan' => $_POST['id_tindakan'],
	'tanggal_dirawat' => $tanggal_dirawat,
);
 
 $crud->tambah($data);
//$crud->pre($crud->tambah($data));
?>