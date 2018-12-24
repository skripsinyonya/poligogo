<?php
require 'Crud.php';
$crud = new Crud();
$no_rm = $_POST['no_rm'];
$data = $crud->modal_edit($no_rm);

$date = date('Y-m-d');
//$crud->pre($crud->modal_edit($id));
?>
<form class="form-horizontal" method="POST" id="modal-tambah" enctype="multipart/form-data">
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">NO RM</label>
			</div>
			<div class="col-md-6">
				<input type="hidden" value="<?php echo $no_rm;?>" name="id" id="modal-id">
				<input type="text" name="no_rm" class="form-control" id="modal-no_rm" value="<?php echo $data['no_rm'];?>" required="" readonly>
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">NIK</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="nik" readonly class="form-control" id="modal-nik" value="<?php echo $data['nik'];?>" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">No KK</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="no_kk" class="form-control" id="modal-no_kk" required="" value="<?php echo $data['no_kk'];?>">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Nama kk</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="nama_kk" class="form-control" id="modal-nama_kk" value="<?php echo $data['nama_kk'];?>" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Nama</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="nama_pasien" class="form-control" id="modal-nama_pasien" value="<?php echo $data['nama_pasien'];?>" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Jenis Kelamin</label>
			</div>
			<div class="col-md-6">
				<?php
					if($data['jenis_kelamin'] == 'Laki - laki'){

						echo '<input type="radio" name="jk[]" value="Laki - laki" id="modal-jk1" checked> Laki - Laki';
						echo '<input type="radio" name="jk[]" value="Perempuan" id="modal-jk2"> Perempuan';
						
					}else{

						echo "<input type='radio' name='jk[]' value='Laki - laki' id='modal-jk1'> Laki - laki";
						echo '<input type="radio" name="jk[]" value="Perempuan" id="modal-jk2" checked> Perempuan';
						
					}
				?>
			</div>
		 </div>
		 <div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Tempat Lahir</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="tempat_lahir" class="form-control" id="modal-tempat_lahir" required="" value="<?php echo $data['tempat_lahir'];?>">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Tanggal Lahir</label>
			</div>
			<div class="col-md-6">
				<input type="date" name="tanggal_lahir" class="form-control" id="modal-tanggal_lahir" required="" value="<?php echo $data['tanggal_lahir'];?>" max="<?php echo $date;?>">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Alamat</label>
			</div>
			<div class="col-md-6">
				<textarea name='alamat' id="modal-alamat" class="form-control" rows="5"><?php echo $data['alamat'];?></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Alergi</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="jabatan" class="form-control" id="modal-alergi" required="" value="<?php echo $data['alergi'];?>">
			</div>
		</div>
		
        <!-- <div class="form-group">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary btn-input">Tambah Data</button>
            </div>
        </div> -->
    </form>