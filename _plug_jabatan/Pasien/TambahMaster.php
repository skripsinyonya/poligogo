<?php
	//require '../../_config/config.php';
	require 'Crud.php';
	$crud = new Crud();

?>
<div class="panel-body">
	<form class="form-horizontal" method="POST" id="frm-tambah" enctype="multipart/form-data" action="Tambah.php">
		<div class="form-group">
			<div class='col-md-3'>
				<label for="no_rm">NO RM</label>
			</div>
			<div class="col-md-6">
				<input type="text" readonly name="no_rm" class="form-control" id="frm-no_rm" required="" value="<?php echo $crud->get_norm();?>">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nama_pasien">Nama Pasien</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="nama_pasien" class="form-control" id="frm-nama_pasien" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="jenis_kelamin">Jenis Kelamin</label>
			</div>
			<div class="col-md-6">
				<input type="radio" name="jenis_kelamin[]" value="Laki - laki" id="frm-jenis_kelamin1" checked> Laki - Laki
				<input type="radio" name="jenis_kelamin[]" value="Perempuan" id="frm-jenis_kelamin2"> Perempuan
			</div>
		 </div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="tempat_lahir">Tempat Lahir</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="tempat_lahir" class="form-control" id="frm-tempatlahir" required="">
			</div>
		</div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="tanggal_lahir">Tanggal Lahir</label>
            </div>
            <div class="col-md-6">
                <input type="date" name="tanggal_lahir" max="<?php echo $today['now'];?>" required class="form-control" id="frm-tanggal_lahir">
            </div>
        </div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="alamat">Alamat</label>
            </div>
            <div class="col-md-6">
                <textarea name="alamat" class="form-control" rows="5" cols="5" required="" id="frm-alamat"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="nik">NIK</label>
            </div>
            <div class="col-md-6">
                <input type="text" name="nik" min="11" max="13" required="" required="" class="form-control" id="frm-nik">
            </div>
        </div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="nama_kk">Nama KK</label>
            </div>
            <div class="col-md-6">
                <input type="text" name="nama_kk" class="form-control" id="frm-nama_kk" required="">
            </div>
        </div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="no_kk">No KK</label>
            </div>
            <div class="col-md-6">
                <input type="text" name="no_kk" class="form-control" id="frm-no_kk" required="">
            </div>
        </div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="alergi">Alergi</label>
            </div>
            <div class="col-md-6">
                <input type="text" name="alergi" class="form-control" id="frm-alergi" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary btn-input">Tambah Data</button>
            </div>
        </div>
    </form>
</div>

