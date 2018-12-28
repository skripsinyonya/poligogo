<?php
require 'Crud.php';
$crud = new Crud();
$id = $_POST['norm'];
$id = $id['id_kunjungan'];
$data = $crud->modal_edit($id);
/*$crud->pre($data);
die;*/
?>
<form class="form-horizontal" method="POST" id="modal-tambah" enctype="multipart/form-data">
	<div class="form-group">
		<div class='col-md-3'>
			<label for="nip">NO RM</label>
		</div>
		<div class="col-md-6">
			<input type="hidden" value="<?php echo $id;?>" name="id" id="modal-id_kunjungan">
			<input type="text" name="nip" class="form-control" id="modal-no_rm" value="<?php echo $data['no_rm'];?>" required="" readonly>
		</div>
	</div>
	<div class="form-group">
		<div class='col-md-3'>
			<label for="nip">Diagnosis</label>
		</div>
		<div class="col-md-6">
			<input type="text" name="nip" class="form-control" id="modal-diagnosis" value="<?php echo $data['diagnosis'];?>" required="">
		</div>
	</div>
	<div class="form-group">
		<div class='col-md-3'>
			<label for="nip">Tindakan</label>
		</div>
		<div class="col-md-6">
			<input type="text" name="nip" class="form-control" id="modal-tindakan" value="<?php echo $data['tindakan'];?>" required="">
		</div>
	</div>
</form>