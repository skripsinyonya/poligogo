<?php
require 'Crud.php';
$crud = new crud;
?>

<div class="modal fade" id="modal-ubah" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Small Modal</h5>
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
                                                    <th>No</th>
                                                    <th>NIP Perawat</th>
                                                    <th>ID Tindakan</th>
                                                    <th>NO RM</th>
                                                    <th>NAMA PASIEN</th>
                                                    <th>Tanggal Terdaftar</th>
                                                    <th>Tanggal Dirawat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                /*$crud->pre($crud->get_data());
                                                die;*/

                                                if(!empty($crud->get_data())){
                                                    foreach ($crud->get_data() as $key_data => $value_data) {
                                                        $tanggal = explode('-', $value_data['tanggal_masuk']);
                                                        $tanggal2 = explode('-', $value_data['tanggal_dirawat']);
                                                        $bulan = $tanggal[1];
                                                        $bulan2 = $tanggal2[1];


                                                        $exp_tanggal1 = explode(' ', $value_data['tanggal_dirawat']);

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

                                                        if($bulan2 == 1){

                                                            $bulan2 = 'Jan';

                                                        }elseif ($bulan2 == 2) {
                                                            $bulan2 = "Feb";
                                                        }elseif ($bulan2 == 3) {
                                                            $bulan2 = "Mar";
                                                        }elseif ($bulan2 == 4) {
                                                            $bulan2 = "Apr";
                                                        }elseif ($bulan2 == 5) {
                                                            $bulan2 = "Mei";
                                                        }elseif ($bulan2 == 6) {
                                                            $bulan2 = "Jun";
                                                        }elseif ($bulan2 == 7) {
                                                            $bulan2 = "Jul";
                                                        }elseif ($bulan2 == 8) {
                                                            $bulan2 = "Agu";
                                                        }elseif ($bulan2 == 9) {
                                                            $bulan2 = "Sep";
                                                        }elseif ($bulan2 == 10) {
                                                            $bulan2 = "Okt";
                                                        }elseif ($bulan2 == 11) {
                                                            $bulan2 = "Nov";
                                                        }else{
                                                            $bulan2 = "Des";
                                                        }


                                                        $key_data++;
                                                        echo "<tr>
                                                                <td>$key_data</td>
                                                                <td>".$value_data['nip']."</td>
                                                                <td>".$value_data['id_tindakan']."</td>
                                                                <td>".$value_data['no_rm']."</td>
                                                                <td>".$value_data['nama_pasien']."</td>
                                                                <td>".$value_data['tanggal_masuk']."
                                                                <td>".$value_data['tanggal_dirawat']."</td>
                                                                <td>
                                                                    <a href='javascript:void(0);' data-toggle='modal' data-target='#modal-ubah' id='ubah".$key_data."' data-id='".$value_data['id_perawatan']."' data-nip='".$value_data['nip']."' data-tindakan='".$value_data['id_tindakan']."' data-tanggal_rawat='".$exp_tanggal1[0]."' data-waktu_rawat='".$exp_tanggal1[1]."' title='Ubah data'>
                                                                    <span class='glyphicon glyphicon-pencil'></span>
                                                                    </a>
                                                                    | 
                                                                    <a href='javascript:void(0);' id='hapus".$key_data."' data-id='".$value_data['id_perawatan']."'><span class='glyphicon glyphicon-trash'></span></a>&nbsp;
                                                                </td>
                                                        </tr>";
                                                    }
                                                }else{

                                                    echo 'Tidak ada Data';
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
           var id = $('#modal-id_perawatan').val();
           var nip = $("#modal-nip").val();
           var id_tindakan = $("#modal-id_tindakan").val();
           var tanggal = $("#modal-tanggal").val();
           var waktu = $("#modal-waktu").val();
            $.ajax({
                url: 'Edit.php',
                type: 'POST',
                data: {id : id, nip : nip, id_tindakan : id_tindakan, tanggal : tanggal, waktu : waktu},
                success: function(data){
                    alert(data);
                    //$("#datatables-master").load('<?php echo base_url('_plug_jabatan/PerawatanPasien/DataMaster.php');?>');
                    window.location = 'Index.php';
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
                                $.post('<?php echo base_url('_plug_jabatan/PerawatanPasien/Delete.php');?>', {id: id}, function(data) {
                                    alert(data);
                                    $("#datatables-master").load('<?php echo base_url('_plug_jabatan/PerawatanPasien/DataMaster.php');?>');
                                });
                                hapus = false;
                            }

                        }else{
                            return false;
                        }
                        //console.log(id);
                    });

                    $("#ubah<?php echo $key_data;?>").click(function() {
                        var id = $(this).data('id');
                        var nip = $(this).data('nip');
                        var tindakan = $(this).data('tindakan');
                        var tanggal = $(this).data('tanggal_rawat');
                        var waktu = $(this).data('waktu_rawat');
                        $.ajax({
                            url: 'Modal_edit.php',
                            type: 'POST',
                            data: {id : id , nip : nip, tindakan : tindakan, tanggal : tanggal, waktu : waktu},
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