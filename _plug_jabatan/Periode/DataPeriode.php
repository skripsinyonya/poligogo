<?php
require 'Crud.php';
$crud = new crud;
?>
<link href="<?php echo base_url();?>/_assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>ID Kunjungan</th>
                                                    <th>NO RM</th>
                                                    <th>Nama Pasien</th>
                                                    <th>Diagnosis</th>
                                                    <th>Tindakan</th>
                                                    <th>Detail</th>
                                                    <th>Tanggal Kunjungan</th>
                                                    <th>Aksi</th>
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
                                                                <td>".$value_data['diagnosis']."</td>
                                                                <td>".$value_data['tindakan']."</td>
                                                                <td> Tempat, Tanggal lahir: ".$value_data['tempat_lahir'].", ".$tanggal[2]."-".$bulan."-".$tanggal[0]."<br>
                                                                Alamat : ".$value_data['alamat']."<br></td>
                                                                <td>".$value_data['tanggal_kunjungan']."</td>
                                                                <td>
                                                                    <a href='javascript:void(0);' data-toggle='modal' data-target='#exampleModalLong' id='ubah".$key_data."' data-id='".$value_data['id_kunjungan']."' data-norm='".$value_data['no_rm']."' data-nama='".$value_data['nama_pasien']."' title='Ubah data'>
                                                                    <span class='glyphicon glyphicon-pencil'></span>
                                                                    </a>
                                                                    | 
                                                                    <a href='javascript:void(0);' id='hapus".$key_data."' data-id='".$value_data['id_kunjungan']."'><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
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
            var id= $('#modal-id').val();
            var nip = $('#modal-nip').val();
            var nama = $('#modal-nama').val();
            var jabatan = $('#modal-jabatan').val();
            var jk = $('#modal-jk1').is(':checked') ? $('#modal-jk1').val() : $('#modal-jk2').val();
            var tempat = $('#modal-tempatlahir').val();
            var tanggal = $('#modal-tgl_lahir').val();
            var alamat = $('#modal-alamat').val();
            var no = $('#modal-no').val();
            $.ajax({
                url: 'Edit.php',
                type: 'POST',
                data: {id : id, nip : nip, nama : nama, jabatan : jabatan, jenis_kelamin : jk, tempat_lahir : tempat, tanggal_lahir : tanggal, alamat : alamat, no_telepon : no},
                success: function(data){
                    alert(data);
                    $("#datatables-master").load('<?php echo base_url('_plug_jabatan/Master/DataMaster.php');?>');
                }
            })         
            
        });

            <?php
                foreach ($crud->get_data() as $key_data => $value_data) {
                    $key_data++;
                    ?>
                    $("#hapus<?php echo $key_data;?>").click(function(){
                        var id = $(this).data('id');
                        var jawab = confirm('Yakin untuk menghapus data ?');
                        if(jawab === true){

                            var hapus = false;
                            if(!hapus){
                                hapus = true;
                                $.post('<?php echo base_url('_plug_jabatan/Master/Delete.php');?>', {id: id}, function(data) {
                                    alert(data);
                                    $("#datatables-master").load('<?php echo base_url('_plug_jabatan/Master/DataMaster.php');?>');
                                });
                                hapus = false;
                            }

                        }else{
                            return false;
                        }
                        //console.log(id);
                    });

                    $("#ubah<?php echo $key_data;?>").click(function() {
                        var id= $(this).data('id');
                        var nip = $(this).data('nip');
                        var nama = $(this).data('nama');
                        var jabatan = $(this).data('jabatan');
                        var jk = $(this).data('jk');
                        var tempat = $(this).data('tempat');
                        var tanggal = $(this).data('tanggal');
                        var alamat = $(this).data('alamat');
                        var no = $(this).data('no');
                        $.ajax({
                            url: 'Modal_edit.php',
                            type: 'POST',
                            data: {id: id, nip : nip, nama : nama, jabatan : jabatan, jenis_kelamin : jk, tempat_lahir : tempat, tanggal_lahir : tanggal, alamat : alamat, no_telepon : no},
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