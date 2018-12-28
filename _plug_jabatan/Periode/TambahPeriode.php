<?php
	require '../../_config/config.php';
?>
<div class="panel-body">
	<form class="form-horizontal" method="POST" id="frm-tambah" enctype="multipart/form-data" action="Tambah.php">
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">No RM</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="no_rm" class="form-control" id="frm-no_rm" required="">
			</div>
		</div>
		<div id="show-no_rm"></div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Diagnosis</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="diagnosis" class="form-control" id="frm-diagnosis" required="">
			</div>
		</div>
		<div class="form-group">
			<div class='col-md-3'>
				<label for="nip">Tindakan</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="tindakan" class="form-control" id="frm-tindakan" required="">
			</div>
		</div>
        <div class="form-group">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary btn-input">Tambah Kunjungan Pasien</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
	
	$(document).ready(function() {

		$("#frm-no_rm").keyup(function() {
			var norm = $("#frm-no_rm").val();
			$.ajax({
				url: 'Show_noRM.php',
				type: 'POST',
				data: {norm: norm},
				success:function(data){
					$("#show-no_rm").html(data);
				}
			})
		});

	});

</script>