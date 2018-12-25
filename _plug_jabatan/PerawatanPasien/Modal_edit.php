<?php
require 'Crud.php';
$crud = new Crud();
$id = $_POST['id'];
$data = $crud->modal_edit($id);
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
/*$crud->pre($crud->modal_edit($id));
die;*/
?>
<form class="form-horizontal" method="POST" id="modal-tambah" enctype="multipart/form-data">
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">NIP</label>
			</div>
			<div class="col-md-6">
				<input type="hidden" name="" id="modal-id_perawatan" value="<?php echo $data['id_perawatan'];?>">
				<input type="text" name="nip" class="form-control" id="modal-nip" readonly="" value="<?php echo $data['nip_perawat'];?>">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">No Tindakan</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="id_tindakan" required="" value="<?php echo $data['id_tindakan'];?>" class="form-control" id="modal-id_tindakan">
			</div>
		</div>
		<div id="show-tindakan"></div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Tanggal Di Rawat</label>
			</div>
			<div class="col-md-6">
				<input type="date" name="tanggal" min="<?php echo $date;?>" class="form-control" id="modal-tanggal" required="" value="<?php echo $tanggal;?>">
				<select name="waktu" class="form-control" id="modal-waktu">
					<?php
						echo "<option value='$waktu'> $waktu</option>";
						for ($i = 1; $i < 25 ; $i++) {
							
							if($waktu == $i.':00:00'){
							}else{
								echo "<option value='$i:00:00'> $i:00:00 </option>";	
							}
							
						}
					?>
				</select>
			</div>
		</div>
</form>