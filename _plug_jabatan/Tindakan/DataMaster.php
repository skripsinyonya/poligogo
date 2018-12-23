<?php
require 'Crud.php';
$crud = new crud;
?>
<div class="modal fade" id="Modal-ubah" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" aria-hidden="true">
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
                                                    <th>ID Tindakan</th>
                                                    <th>Nama Tindakan</th>
                                                    <th>ICD CM</th>
                                                    <th>Tindakan</th>
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
                                                                <td>".$value_data['id_tindakan']."</td>
                                                                <td>".$value_data['nama_tindakan']."</td>
                                                                <td>".$value_data['icd_cm']."</td>
                                                                <td>".$value_data['status']."</td>
                                                                <td>
                                                                <a href='javascript:void(0);' data-toggle='modal' data-target='#Modal-ubah' id='ubah".$key_data."' data-id_tindakan='".$value_data['id_tindakan']."' data-nama_tindakan='".$value_data['nama_tindakan']."' data-icd_cm='".$value_data['icd_cm']."' title='Ubah data'>
                                                                    <span class='glyphicon glyphicon-pencil'></span>
                                                                </a>
                                                                    | 
                                                                <a href='javascript:void(0);' id='hapus".$key_data."' data-id_tindakan='".$value_data['id_tindakan']."'><span class='glyphicon glyphicon-trash'></span.</a></td>
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
            var id_tindakan= $('#modal-id_tindakan').val();
            $.ajax({
                url: 'Edit.php',
                type: 'POST',
                data: {id_tindakan : id_tindakan },
                success: function(data){
                    alert(data);
                    $("#datatables-master").load('<?php echo base_url('_plug_jabatan/Tindakan/DataMaster.php');?>');
                }
            })         
            
        });

        $("#btn-inpedit").click(function() {
            var id_tindakan = $('#modal-id_tindakan').val();
            var icd_cm = $("#modal-icd_cm").val();
            var nama_tindakan = $("#modal-nama_tindakan").val();
           
           $.ajax({
               url: '<?php echo base_url('_plug_jabatan/Tindakan/Edit.php')?>',
               type: 'POST',
               data: {id_tindakan : id_tindakan, icd_cm : icd_cm, nama_tindakan : nama_tindakan},
               success:function(data){
                alert(data);
                window.location = 'Index.php';
                /*$("#datatables-master").load('<?php echo base_url('_plug_jabatan/Tindakan/DataMaster.php');?>');*/
               }
           })           
        });


            <?php
                foreach ($crud->get_data() as $key_data => $value_data) {
                    $key_data++;
                    ?>
                    $("#hapus<?php echo $key_data;?>").click(function(){
                        var id = $(this).data('id_tindakan');
                        var jawab = confirm('Yakin untuk menghapus data ?');
                        if(jawab === true){

                            var hapus = false;
                            if(!hapus){
                                hapus = true;
                                $.post('<?php echo base_url('_plug_jabatan/Tindakan/Delete.php');?>', {id_tindakan: id}, function(data) {
                                    alert(data);
                                    $("#datatables-master").load('<?php echo base_url('_plug_jabatan/Tindakan/DataMaster.php');?>');
                                });
                                hapus = false;
                            }

                        }else{
                            return false;
                        }
                        //console.log(id);
                    });

                    $("#ubah<?php echo $key_data;?>").click(function() {
                        var id_tindakan= $(this).data('id_tindakan');
                        var nama_tindakan = $(this).data('nama_tindakan');
                        var icd_cm = $(this).data('icd_cm');
                        $.ajax({
                            url: 'Modal_edit.php',
                            type: 'POST',
                            data: {id_tindakan : id_tindakan, nama_tindakan : nama_tindakan, icd_cm : icd_cm },
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