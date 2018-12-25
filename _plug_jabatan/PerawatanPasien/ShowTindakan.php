<?php
require 'Crud.php';
$crud = new crud();
$id = $_POST['id_tindakan'];
$crud->pre($crud->show_tindakan($id));
?>
