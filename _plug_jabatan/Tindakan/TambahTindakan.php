<?php
	//require '../../_config/config.php';

	require 'Crud.php';
	$crud = new Crud;
	$get_pasien = $crud->get_pasien();
	$no_icd = $crud->get_icd_cm();
	/*print_r($no_icd);
	die;*/

?>
<div class="panel-body">
	<form class="form-horizontal" id='frm-tambah' method="POST" enctype="multipart/form-data" action="Tambah.php">
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">No. RM</label>
			</div>
			<div class="col-md-6">
				<select name="no_rm" class="form-control" id="frm-norm">
					<?php
						foreach ($get_pasien as $key => $value) {
							echo "<option value='".$value['no_rm']."'>".$value['no_rm']."</option>";
						}
					?>
				</select>

				<!-- <input type="text" name="id_penyakit" class="form-control" id="frm-norm" required=""> -->
			</div>
		</div>
		<div id="show-pasien"></div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip"> Kode ICD </label>
			</div>
			<div class="col-md-6">
				<input type="text" name="icd_cm" class="form-control" id="frm-icdx" required="" value="<?php echo $no_icd;?>" readonly>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-3">
				<label for="namatindakan">Nama Tindakan</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="nama_tindakan" class="form-control">
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

	$(document).ready(function() {
        $("#frm-norm").change(function() {
            var norm = $('#frm-norm').val();
            
            $.ajax({
            	url: 'Get_pasien.php',
            	type: 'POST',
            	data: {norm: norm},
            	success:function(data){
            		$("#show-pasien").html(data);
            	}
            })            

        });
    });
	
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