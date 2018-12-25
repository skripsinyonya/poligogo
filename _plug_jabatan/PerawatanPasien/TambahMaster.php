<?php

session_start();
	require '../../_config/config.php';
$date = date('Y-m-d');

?>
<div class="panel-body">
	<form class="form-horizontal" method="POST" id="frm-tambah" enctype="multipart/form-data" action="Tambah.php">
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">NIP</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="nip" class="form-control" id="frm-nip" readonly="" value="<?php echo $_SESSION['username'];?>">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">No Tindakan</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="id_tindakan" required="" class="form-control" id="frm-id_tindakan">
			</div>
		</div>
		<div id="show-tindakan"></div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Tanggal Di Rawat</label>
			</div>
			<div class="col-md-6">
				<input type="date" name="tanggal" min="<?php echo $date;?>" class="form-control" required="">
				<select name="waktu" class="form-control">
					<?php
						for ($i = 1; $i < 25 ; $i++) {
							echo "<option value='$i:00:00'> $i:00:00 </option>";
						}
					?>
				</select>
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
		$("#frm-id_tindakan").keyup(function() {
			var id_tindakan = $("#frm-id_tindakan").val();

			if(id_tindakan == ''){

				$("#show-tindakan").html('');

			}else{

				$.ajax({
					url: '<?php echo base_url('_plug_jabatan/PerawatanPasien/ShowTindakan.php');?>',
					type: 'POST',
					data: {id_tindakan: id_tindakan},
					success:function(data){
						$("#show-tindakan").html(data);
					}
				})			
			}
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