<?php

include 'Crud.php';
$crud = new Crud();
$no_rm = isset($_POST['norm']) ? $_POST['norm'] : null;
$data = $crud->show_norm($no_rm);

	if(!empty($data)){
		?>
		<div class="form-group">
			<div class="col-md-3">
				<label>NIK</label>
			</div>
			<div class="col-md-6">
				<label><input type="text" disabled value="<?php echo $data['nik'];?>" class="form-control"></label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-3">
				<label>Nama Pasien</label>
			</div>
			<div class="col-md-6">
				<label><input type="text" disabled value="<?php echo $data['nama_pasien'];?>" class="form-control"></label>
			</div>
		</div>
		<?php
	}
?>

