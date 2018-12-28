<?php
require 'Crud.php';
$crud = new crud;
?>
<div class="modal fade" id="Modal-ubah" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Ubah Kunjungan Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body fetch-data">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id='btn-inpedit'>Confirm</button>
            </div>
        </div>
    </div>
</div>

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
                                                                    <a href='javascript:void(0);' data-toggle='modal' data-target='#Modal-ubah' id='ubah".$key_data."' data-id_kunjungan='".$value_data['id_kunjungan']."' data-norm='".$value_data['no_rm']."' data-nama='".$value_data['nama_pasien']."' data-diagnosis='".$value_data['diagnosis']."' title='Ubah data'>
                                                                    <span class='glyphicon glyphicon-pencil'></span>
                                                                    </a>
                                                                    | 
                                                                    <a href='javascript:void(0);' id='hapus".$key_data."' data-id_kunjungan='".$value_data['id_kunjungan']."'><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
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
        $("#btn-inpedit").click(function() {
           var id = $("#modal-id_kunjungan").val();
           var norm = $("#modal-no_rm").val();
           var diagnosis = $("#modal-diagnosis").val();
           var tindakan = $("#modal-tindakan").val();
            $.ajax({
                url: 'Edit.php',
                type: 'POST',
                data: {id : id, norm : norm, diagnosis : diagnosis, tindakan : tindakan},
                success: function(data){
                    alert(data);
                    //$("#datatables-master").load('<?php echo base_url('_plug_jabatan/Periode/DataPeriode.php');?>');
                    window.location = 'Index.php';
                }
            })         
            
        });

            <?php
                foreach ($crud->get_data() as $key_data => $value_data) {
                    $key_data++;
                    ?>
                    $("#hapus<?php echo $key_data;?>").click(function(){
                        var id = $(this).data('id_kunjungan');
                        var jawab = confirm('Yakin untuk menghapus data ?');
                        if(jawab === true){

                            var hapus = false;
                            if(!hapus){
                                hapus = true;
                                $.post('<?php echo base_url('_plug_jabatan/Periode/Delete.php');?>', {id: id}, function(data) {
                                    alert(data);
                                     window.location = 'Index.php';
                                    //$("#datatables-master").load('<?php echo base_url('_plug_jabatan/Periode/DataPeriode.php');?>');
                                });
                                hapus = false;
                            }

                        }else{
                            return false;
                        }
                        //console.log(id);
                    });

                    $("#ubah<?php echo $key_data;?>").click(function() {

                      var norm = $(this).data(norm);
                      var id_kunjungan = $(this).data(id_kunjungan);
                      var nama = $(this).data(nama);
                      var diagnosis = $(this).data(diagnosis);

                        $.ajax({
                            url: 'Modal_edit.php',
                            type: 'POST',
                            data: {norm : norm, id_kunjungan : id_kunjungan, nama:nama, diagnosis : diagnosis},
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