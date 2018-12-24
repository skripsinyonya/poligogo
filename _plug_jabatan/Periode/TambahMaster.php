<?php
	require '../../_config/config.php';
?>
<div class="panel-body">
	<form class="form-horizontal" method="POST" id="frm-tambah" enctype="multipart/form-data" action="Tambah.php">
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">NIP</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="nip" class="form-control" id="frm-nip" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Nama</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="nama" class="form-control" id="frm-nama" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Jabatan</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="jabatan" class="form-control" id="frm-jabatan" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Jenis Kelamin</label>
			</div>
			<div class="col-md-6">
				<input type="radio" name="jk[]" value="Laki - laki" id="frm-jk1" checked> Laki - Laki
				<input type="radio" name="jk[]" value="Perempuan" id="frm-jk2"> Perempuan
			</div>
		 </div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Tempat Lahir</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="tempat" class="form-control" id="frm-tempatlahir" required="">
			</div>
		</div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="nip">Tanggal Lahir</label>
            </div>
            <div class="col-md-6">
                <input type="date" name="tanggal" max="<?php echo $today['now'];?>" required class="form-control" id="frm-tgl_lahir">
            </div>
        </div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="nip">Alamat</label>
            </div>
            <div class="col-md-6">
                <textarea name="alamat" class="form-control" rows="5" cols="5" required="" id="frm-alamat"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="nip">Telepon</label>
            </div>
            <div class="col-md-6">
                <input type="text" name="no" min="11" max="13" required="" required="" class="form-control" id="frm-no">
            </div>
        </div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="nip">Username</label>
            </div>
            <div class="col-md-6">
                <input type="text" name="username" class="form-control" id="frm-username" required="">
            </div>
        </div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="nip">Password</label>
            </div>
            <div class="col-md-6">
                <input type="text" name="password" class="form-control" id="frm-password" required="">
            </div>
        </div>
        <div class="form-group">
            <div class='col-md-3'>
                <label for="nip">Gambar</label>
            </div>
            <div class="col-md-6">
                <img src="<?php echo base_url('_assets/blank.png');?>" alt='gambar' style="width: auto; height: 250px;" id="prevGambar">
                <input type="file" name="gambar" id="frm-gambar" onchange="PreviewImage(event);" required="">
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

<script type="text/javascript">
	
	/*$(document).ready(function() {
	        
	        $('.btn-input').click(function() {
	            
	            //var data = $('#frm-tambah').serialize();
	            var nip = $("#frm-nip").val()
	            var nama = $('#frm-nama').val();
	            var jabatan = $('#frm-jabatan').val();
	            var jk = $('#frm-jk1').is(':checked') ? $('#frm-jk1').val() : $('#frm-jk2').val();
	            var tempat = $('#frm-tempatlahir').val();
	            var tanggal = $('#frm-tgl_lahir').val();
	            var alamat = $('#frm-alamat').val();
	            var no = $('#frm-no').val();
	            var username = $('#frm-username').val();
	            var password = $("#frm-password").val();
	            var gambar = $('#frm-gambar').val();

	            $.ajax({
	            	url: '<?php echo base_url("_plug_jabatan/Master/Tambah.php");?>',
	            	type: 'POST',
	            	data: {nip : nip, nama : nama, jabatan : jabatan, jk : jk, tempat : tempat, tanggal : tanggal, alamat : alamat, no : no, username : username, password : password, gambar : gambar},
	            	success: function(data){
	            		alert('Berhasil Masukkan data');
		            	$('#datatables-master').load('<?php echo base_url('_plug_jabatan/Master/DataMaster.php');?>');
	    				$('#tambah').load('<?php echo base_url('_plug_jabatan/Master/TambahMaster.php');?>');
	            	}
	            })
	            .done(function() {
	            })
	            .fail(function() {
	            	alert('Galat');
	            })
	            .always(function() {
	            	console.log("complete");
	            });
	            

	            //console.log(nama, jabatan, jk, tempat, tanggal, alamat, no, username, password, gambar);
	        });
	        
	    });*/
</script>