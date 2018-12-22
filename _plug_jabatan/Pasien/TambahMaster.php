<?php
	require '../../_config/config.php';
?>
<div class="panel-body">
	<form class="form-horizontal" method="POST" id="frm-tambah" enctype="multipart/form-data" action="Tambah.php">
		<div class="form-group">
			<div class='col-md-3'>
				<label for="no_rm">NO RM</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="no_rm" class="form-control" id="frm-no_rm" required="">
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
	            	url: '<?php echo base_url("_plug_jabatan/Pasien/Tambah.php");?>',
	            	type: 'POST',
	            	data: {nip : nip, nama : nama, jabatan : jabatan, jk : jk, tempat : tempat, tanggal : tanggal, alamat : alamat, no : no, username : username, password : password, gambar : gambar},
	            	success: function(data){
	            		alert('Berhasil Masukkan data');
		            	$('#datatables-master').load('<?php echo base_url('_plug_jabatan/Pasien/DataMaster.php');?>');
	    				$('#tambah').load('<?php echo base_url('_plug_jabatan/Pasien/TambahMaster.php');?>');
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