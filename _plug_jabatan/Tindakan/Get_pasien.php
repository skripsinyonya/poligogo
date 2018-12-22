<?php
require 'Crud.php';
$crud = new Crud;

$norm = $_POST['norm'];

$result = $crud->get_pasien_by($norm);
//$crud->pre($result);

?>

<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Nama Pasien</label>
			</div>
			<div class="col-md-6">
				<input type="text" readonly="" class="form-control" id="frm-pasien" required="" value="<?php echo $result['nama_pasien'];?>">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">NIK / No. KTP</label>
			</div>
			<div class="col-md-6">
				<input type="text" readonly="" class="form-control" id="frm-NIK" required="" value="<?php echo $result['no_kk'];?>">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Tempat / Tanggal Lahir</label>
			</div>
			<div class="col-md-6">
				<input type="text" readonly="" class="form-control" id="frm-ttl" required="" value="<?php echo $result['tempat_lahir'].' / '.$result['tanggal_lahir'];?>">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Jenis Kelamin</label>
			</div>
			<div class="col-md-6">
				<input type="text" readonly="" class="form-control" id="frm-jk" required="" value="<?php echo $result['jenis_kelamin'];?>">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-3">
				<label for="status">Status</label>
			</div>
			<div class="col-md-6">
				<?php
					$tanggal_lahir = $result['tanggal_lahir'];
					$date = date('Y-m-d');

					

					$status = $date - $tanggal_lahir;

					#$crud->pre(array($tanggal_lahir, $date, $status));
					if($status <= 10){

						$status = 'Anak';

					}else{

						$status = 'Dewasa';

					}

				?>
				<input type="text" name='status' class="form-control" readonly="" value="<?php echo $status;?>">
			</div>
		</div>