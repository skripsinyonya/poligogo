<?php
require 'Crud.php';
$crud = new crud;
?>
<link href="<?php echo base_url();?>/_assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No RM</th>
                                                    <th>Nama Pasien</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Alamat</th>
                                                    <th>NIK</th>
                                                    <th>Nama KK</th>
                                                    <th>No KK</th>
                                                    <th>Alergi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                /*$crud->pre($crud->get_data());
                                                die;*/

                                                    foreach ($crud->get_data() as $key_data => $value_data) {
                                                        $tanggal = explode('-', $value_data['tanggal_lahir']);
                                                        $bulan = $tanggal[1];

                                                        if($bulan == 1){

                                                            $bulan = 'Jan';

                                                        }elseif ($bulan == 2) {
                                                            $bulan = "Feb";
                                                        }elseif ($bulan == 3) {
                                                            $bulan = "Mar";
                                                        }elseif ($bulan == 4) {
                                                            $bulan = "Apr";
                                                        }elseif ($bulan == 5) {
                                                            $bulan = "Mei";
                                                        }elseif ($bulan == 6) {
                                                            $bulan = "Jun";
                                                        }elseif ($bulan == 7) {
                                                            $bulan = "Jul";
                                                        }elseif ($bulan == 8) {
                                                            $bulan = "Agu";
                                                        }elseif ($bulan == 9) {
                                                            $bulan = "Sep";
                                                        }elseif ($bulan == 10) {
                                                            $bulan = "Okt";
                                                        }elseif ($bulan == 11) {
                                                            $bulan = "Nov";
                                                        }else{
                                                            $bulan = "Des";
                                                        }

                                                        $key_data++;
                                                        echo "<tr>
                                                                <td>$key_data</td>
                                                                <td>".$value_data['no_rm']."</td>
                                                                <td>".$value_data['nama_pasien']."</td>
                                                                <td>".$value_data['jenis_kelamin']."</td>
                                                                <td> tempat_lahir, tanggal lahir: ".$value_data['tempat_lahir'].", ".$tanggal[2]."-".$bulan."-".$tanggal[0]."<br></td>
                                                                <td>".$value_data['alamat']."</td>
                                                                <td>".$value_data['nik']."</td>
                                                                <td>".$value_data['nama_kk']."</td>
                                                                <td>".$value_data['no_kk']."</td>
                                                                <td>".$value_data['alergi']."</td>
                                                                <td>
                                                                    <a href='javascript:void(0);' data-toggle='modal' data-target='#exampleModalLong' id='ubah".$key_data."' data-no_rm='".$value_data['no_rm']."' data-nama_pasien='".$value_data['nama_pasien']."' data-jk='".$value_data['jenis_kelamin']."' data-tempat='".$value_data['tempat_lahir']."' data-tanggal='".$value_data['tanggal_lahir']."' data-alamat='".$value_data['alamat']."' data-nik='".$value_data['nik']."' data-nama_kk='".$value_data['nama_kk']."' data-no_kk='".$value_data['no_kk']."' data-alergi='".$value_data['alergi']."'title='Ubah data'>
                                                                    <span class='glyphicon glyphicon-pencil'></span>
                                                                    </a>
                                                                    | 
                                                                    <a href='javascript:void(0);' id='hapus".$key_data."' data-no_rm='".$value_data['no_rm']."'><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
                                                                </td>
                                                        </tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        <script src="<?php echo base_url();?>/_assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>/_assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function(){

        //edit
        $("#btn-modaledit").click(function() {
            var no_rm= $('#modal-no_rm').val();
            var nama_pasien = $('#modal-nama_pasien').val();
            var jk = $('#modal-jk1').is(':checked') ? $('#modal-jk1').val() : $('#modal-jk2').val();
            var tempat_lahir = $('#modal-tempat_lahir').val();
            var tanggal_lahir = $('#modal-tgl_lahir').val();
            var alamat = $('#modal-alamat').val();
            var nik = $('#modal-nik').val();
            var nama_kk = $('#modal-nama_kk').val();
            var no_kk = $('#modal-no_kk').val();
            var alergi = $('#modal-alergi').val();
            $.ajax({
                url: 'Edit.php',
                type: 'POST',
                data: {no_rm : no_rm, nama_pasien : nama_pasien, jenis_kelamin : jk, tempat_lahir : tempat_lahir, tanggal_lahir : tanggal_lahir, alamat : alamat, nik : nik, nama_kk : nama_kk, no_kk : no_kk, alergi : alergi},
                success: function(data){
                    alert(data);
                    $("#datatables-master").load('<?php echo base_url('_plug_jabatan/Pasien/DataMaster.php');?>');
                }
            })         
            
        });

            <?php
                foreach ($crud->get_data() as $key_data => $value_data) {
                    $key_data++;
                    ?>
                    $("#hapus<?php echo $key_data;?>").click(function(){
                        var no_rm = $(this).data('no_rm');
                        var jawab = confirm('Yakin untuk menghapus data ?');
                        if(jawab === true){

                            var hapus = false;
                            if(!hapus){
                                hapus = true;
                                $.post('<?php echo base_url('_plug_jabatan/Pasien/Delete.php');?>', {no_rm: no_rm}, function(data) {
                                    alert(data);
                                    $("#datatables-master").load('<?php echo base_url('_plug_jabatan/Pasien/DataMaster.php');?>');
                                });
                                hapus = false;
                            }

                        }else{
                            return false;
                        }
                        //console.log(id);
                    });

                    $("#ubah<?php echo $key_data;?>").click(function() {
                        var no_rm= $(this).data('no_rm');
                        var nama_pasien = $(this).data('nama_pasien');
                        var jk = $(this).data('jenis_kelamin');
                        var tempat_lahir = $(this).data('tempat_lahir');
                        var tanggal_lahir = $(this).data('tanggal_lahir');
                        var alamat = $(this).data('alamat');
                        var nik = $(this).data('nik');
                        var nama_kk = $(this).data('nama_kk');
                        var no_kk = $(this).data('no_kk');
                        var alergi = $(this).data('alergi');
                        $.ajax({
                            url: 'Modal_edit.php',
                            type: 'POST',
                            data: {no_rm: no_rm, nama_pasien : nama_pasien, jenis_kelamin : jk, tempat_lahir : tempat_lahir, tanggal_lahir : tanggal_lahir, alamat : alamat, nik : nik, nama_kk : nama_kk, no_kk : no_kk, alergi : alergi},
                            success : function(data){
                                $(".fetch-data").html(data);
                            }
                        })                        
                    });
                    <?php
                }
        ?>


    }); 
</script>