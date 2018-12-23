<?php
require 'Crud.php';
$crud = new Crud();
$id_tindakan = $_POST['id_tindakan'];
$data = $crud->modal_edit($id_tindakan);
$foto = $data['foto_rontgen'];

/*$crud->pre($data);
die;*/
?>
<form class="form-horizontal" method="POST" id="modal-tambah" enctype="multipart/form-data">
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">ICD CM</label>
			</div>
			<div class="col-md-6">
				<input type="hidden" value="<?php echo $id_tindakan;?>" name="id_tindakan" id="modal-id_tindakan">
				<input type="text" name="icd_cm" readonly="" class="form-control" id="modal-icd_cm" required="" value="<?php echo $data['icd_cm'];?>">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Nama tindakan</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="nama_tindakan" class="form-control" id="modal-nama_tindakan" value="<?php echo $data['nama_tindakan'];?>" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Status</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="status" readonly="" class="form-control" id="modal-status" required="" value="<?php echo $data['status'];?>">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Foto Rontgent</label>
			</div>
			<div class="col-md-6">
				<?php

					if(!empty($foto)){
					
						echo '<img src="'.base_url('_images/Upload/'.$foto).'">';

					}else{

						echo '<img src="'.base_url('_images/blank.png').'">';

					}

				?>
			</div>
		</div>
		
    </form>