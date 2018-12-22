<?php
require 'Crud.php';
$crud = new Crud();
$id_penyakit = $_POST['id_penyakit'];
$data = $crud->modal_edit($id_penyakit);
//$crud->pre($crud->modal_edit($id));
?>
<form class="form-horizontal" method="POST" id="modal-tambah" enctype="multipart/form-data">
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">ID Penyakit</label>
			</div>
			<div class="col-md-6">
				<input type="hidden" value="<?php echo $id_penyakit;?>" name="id_penyakit" id="modal-id_penyakit">
				<input type="text" name="id_penyakit" class="form-control" id="modal-id_penyakit" value="<?php echo $data['id_penyakit'];?>" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Nama Penyakit</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="modal-nama_penyakit" class="form-control" id="modal-nama_penyakit" value="<?php echo $data['nama_penyakit'];?>" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">ICD X</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="icd_x" class="form-control" id="icd_x" required="" value="<?php echo $data['icd_x'];?>">
			</div>
		</div>
		
    </form>