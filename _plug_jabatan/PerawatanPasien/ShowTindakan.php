<?php
require 'Crud.php';
$crud = new crud();
$id = $_POST['id_tindakan'];
$tindakan = $crud->show_tindakan($id);
/*$crud->pre($tindakan);
die;*/
?>
<div class="form-group">
	<div class="col-md-3">
		<label>Nama Tindakan</label>
	</div>
	<div class="col-md-6">
		<input type="text" value="<?php echo $tindakan['nama_tindakan'];?>" class="form-control" disabled>
	</div>
</div>
<div class="form-group">
	<div class="col-md-3">
		<label>No RM</label>
	</div>
	<div class="col-md-6">
		<input type="text" value="<?php echo $tindakan['no_rm'];?>" class="form-control" disabled>
	</div>
</div>
<div class="form-group">
	<div class="col-md-3">
		<label>Nama Pasien</label>
	</div>
	<div class="col-md-6">
		<input type="text" value="<?php echo $tindakan['nama_pasien'];?>" class="form-control" disabled>
	</div>
</div>
<div class="form-group">
	<div class="col-md-3">
		<label>Status</label>
	</div>
	<div class="col-md-6">
		<input type="text" value="<?php echo $tindakan['status'];?>" class="form-control" disabled>
	</div>
</div>