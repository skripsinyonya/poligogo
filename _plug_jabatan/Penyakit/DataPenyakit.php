<?php
require 'Crud.php';
$crud = new crud;
?>
<link href="<?php echo base_url();?>/_assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>id penyakit</th>
                                                    <th>Nama Penyakit</th>
                                                    <th>ICD X</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                /*$crud->pre($crud->get_data());
                                                die;*/

                                                foreach ($crud->get_data() as $key_data => $value_data) {
                                                        $key_data++;
                                                        echo "<tr>
                                                                <td>$key_data</td>
                                                                <td>".$value_data['id_penyakit']."</td>
                                                                <td>".$value_data['nama_penyakit']."</td>
                                                                <td>".$value_data['icd_x']."</td>
                                                                <td>
                                                                <a href='javascript:void(0);' data-toggle='modal' data-target='#exampleModalLong' id='ubah".$key_data."' data-id_penyakit='".$value_data['id_penyakit']."' data-nama_penyakit='".$value_data['nama_penyakit']."' data-icd_x='".$value_data['icd_x']."' title='Ubah data'>
                                                                    <span class='glyphicon glyphicon-pencil'></span>
                                                                </a>
                                                                    | 
                                                                <a href='javascript:void(0);' id='hapus".$key_data."' data-id_penyakit='".$value_data['id_penyakit']."'><span class='glyphicon glyphicon-trash'></span.</a></td>
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
            var id_penyakit= $('#modal-id_penyakit').val();
            var nama_penyakit = $('#modal-nama_penyakit').val();
            var icd_x = $('#modal-icd_x').val();
            $.ajax({
                url: 'Edit.php',
                type: 'POST',
                data: {id_penyakit : id_penyakit, nama_penyakit : nama_penyakit, icd_x : icd_x },
                success: function(data){
                    alert(data);
                    $("#datatables-master").load('<?php echo base_url('_plug_jabatan/Penyakit/DataMaster.php');?>');
                }
            })         
            
        });


            <?php
                foreach ($crud->get_data() as $key_data => $value_data) {
                    $key_data++;
                    ?>
                    $("#hapus<?php echo $key_data;?>").click(function(){
                        var id = $(this).data('id_penyakit');
                        var jawab = confirm('Yakin untuk menghapus data ?');
                        if(jawab === true){

                            var hapus = false;
                            if(!hapus){
                                hapus = true;
                                $.post('<?php echo base_url('_plug_jabatan/Penyakit/Delete.php');?>', {id: id}, function(data) {
                                    alert(data);
                                    $("#datatables-master").load('<?php echo base_url('_plug_jabatan/Penyakit/DataPenyakit.php');?>');
                                });
                                hapus = false;
                            }

                        }else{
                            return false;
                        }
                        //console.log(id);
                    });

                    $("#ubah<?php echo $key_data;?>").click(function() {
                        var id_penyakit= $(this).data('id_penyakit');
                        var nama_penyakit = $(this).data('nama_penyakit');
                        var icd_x = $(this).data('icd_x');
                        $.ajax({
                            url: 'Modal_edit.php',
                            type: 'POST',
                            data: {id_penyakit : id_penyakit, nama_penyakit : nama_penyakit, icd_x : icd_x },
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