<?php
	require '../../_config/config.php';
?>
<div class="panel-body">
	<form class="form-horizontal" id='frm-tambah' method="POST" enctype="multipart/form-data" action="Tambah.php">
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">ID Penyakit</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="id_penyakit" class="form-control" id="frm-idpenyakit" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Nama Penyakit</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="nama_penyakit" class="form-control" id="frm-namapenyakit" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">ICD X</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="icd_x" class="form-control" id="frm-icdx" required="">
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
	            	url: '<?php echo base_url("_plug_jabatan/Penyakit/Tambah.php");?>',
	            	type: 'POST',
	            	data: {nip : nip, nama : nama, jabatan : jabatan, jk : jk, tempat : tempat, tanggal : tanggal, alamat : alamat, no : no, username : username, password : password, gambar : gambar},
	            	success: function(data){
	            		alert('Berhasil Masukkan data');
		            	$('#datatables-master').load('<?php echo base_url('_plug_jabatan/Penyakit/DataMaster.php');?>');
	    				$('#tambah').load('<?php echo base_url('_plug_jabatan/Penyakit/TambahMaster.php');?>');
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