<?php
require 'Crud.php';
$crud = new Crud();
$id = $_POST['id'];
$data = $crud->modal_edit($id);
//$crud->pre($crud->modal_edit($id));
?>
<form class="form-horizontal" method="POST" id="modal-tambah" enctype="multipart/form-data">
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">NIP</label>
			</div>
			<div class="col-md-6">
				<input type="hidden" value="<?php echo $id;?>" name="id" id="modal-id">
				<input type="text" name="nip" class="form-control" id="modal-nip" value="<?php echo $data['nip'];?>" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Nama</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="nama" class="form-control" id="modal-nama" value="<?php echo $data['nama'];?>" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Jabatan</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="jabatan" class="form-control" id="modal-jabatan" required="" value="<?php echo $data['jabatan'];?>">
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
				<input type="text" name="tempat" class="form-control" id="modal-tempatlahir" required="" value="<?php echo $data['tempat_lahir'];?>">
			</div>
		</div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="nip">Tanggal Lahir</label>
            </div>
            <div class="col-md-6">
                <input type="date" name="tanggal" max="<?php echo $today['now'];?>" required class="form-control" id="modal-tgl_lahir" value="<?php echo $data['tanggal_lahir'];?>">
            </div>
        </div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="nip">Alamat</label>
            </div>
            <div class="col-md-6">
                <textarea name="alamat" class="form-control" rows="5" cols="5" required="" id="modal-alamat"><?php echo $data['alamat'];?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="nip">Telepon</label>
            </div>
            <div class="col-md-6">
                <input type="text" name="no" min="11" max="13" required="" required="" class="form-control" id="modal-no" value="<?php echo $data['no_telepon'];?>">
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