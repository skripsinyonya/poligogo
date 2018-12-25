<?php
session_start();
require 'Crud.php';

$crud = new Crud;

if (empty($_SESSION['username'])){

    header("Location:Auth/login_index.php");

}else{

   


}
$today = $crud->today();
/*echo ($today['now']);
die;*/
?>



<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> SI RM POLIGIGI RS BALUNG </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="<?php echo base_url();?>/_assets/css/vendor.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/_assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/_assets/css/app-green.css">
        <link href="<?php echo base_url();?>/_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <link href="<?php echo base_url();?>/_assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url();?>/_assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

        <script src="<?php echo base_url(''); ?>/_assets/datatables/js/dataTables.bootstrap.js"></script>

        <script src="<?php echo base_url(''); ?>/_assets/datatables/js/jquery.dataTables.min.js"></script>



        <!-- Theme initialization -->
    </head>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up">
                        <button class="collapse-btn" id="sidebar-collapse-btn"> <i class="fa fa-bars"></i> </button>
                    </div>
                    
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="dropdown">
                                <a href="#">
                                    <?php echo $_SESSION['jabatan'];?>
                                </a>
                                <!-- /.dropdown-user -->
                            </li>
                            <li class="profile dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                                    <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"> </div> <span class="name">

                                    <?php echo $_SESSION['nama'];?> <!-- <i class="fa fa-caret-down"></i> -->
                                </a>

                                <!-- <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"> </div> <span class="name">
                      John Doe -->
                    </span> </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="auth/Logout.php"> <i class="fa fa-power-off icon"></i> Logout </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>


                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <a href="<?php echo base_url();?>">
                                <i class="fa fa-plus"></i>
                                 &nbsp;SI RM POLIGIGI 
                                 </a>
                             </div>
                        </div>

                        <nav class="menu">
                            <ul class="nav metismenu" id="sidebar-menu">

                                <?php
                        if($_SESSION['jabatan'] == 'Master'){
                                echo '<li>
                            <a href="#"><i class="fa fa-users"></i> Master Jabatan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">


                        

                                <li class="menu-item-has-children dropdown">
                                    <a href="'.base_url('_plug_jabatan/Master').'"> Kelola Pegawai</a>
                                </li>';

                            echo '</ul>';
                        echo '</li>';




                            
                            echo '<div class="dropdown-divider"></div>';



                            //Tindakan
                            echo'            
                            <li>
                                <a href="#"><i class="fa fa-pencil-square-o"></i> Tindakan <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                               
                                    <li class="menu-item-has-children dropdown">
                                        <a href="'.base_url('_plug_jabatan/Pasien').'">Data Pasien</a>
                                    </li>
                                    <li>
                                        <a href="'.base_url('_plug_jabatan/Penyakit').'">Data Penyakit</a>
                                    </li>
                                    <li>
                                        <a href="'.base_url('_plug_jabatan/Tindakan').'">Data Tindakan</a>
                                    </li>
                            </ul>
                        </li>';

                            


                                //Transaksi
                            echo '<li>
                                <a href="#"><i class="fa fa-bar-chart"></i> Transaksi <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">';

                                        echo '<li class="menu-item-has-children dropdown">
                                                <a href="'.base_url('_plug_jabatan/PerawatanPasien').'">Perawatan Pasien</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url('_plug_jabatan/UpFotoRontgen').'"> Upload Foto Rontgen Gigi</a>
                                            </li>

                                    </ul>';

                            echo '</li>';

                            //Laporan
                            echo '<li><a href="#"><i class="fa fa-file-text-o"></i> Laporan <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">';

                                    echo '<li class="menu-item-has-children dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lap. Kunjungan Pasien</a>

                                            <ul class="nav nav-third-level dropdown">
                                                <li><a href="'.base_url('_plug_jabatan/Periode').'">Periode</a></li>
                                                <li><a href="'.base_url('_plug_jabatan/LapTindakan').'">Laporan Tindakan</a></li>
                                                <li><a href="'.base_url('_plug_jabatan/LapPenyakit').'">Laporan Penyakit</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Laporan RM</a>
                                            <ul class="nav nav-third-level">
                                                <li><a href="'.base_url('_plug_jabatan/UpFotoRontgen').'FormPerawatan">Form Perawatan</a></li>
                                                <li><a href="'.base_url('_plug_jabatan/LapFotoRontgen').'">Foto Rontgen Gigi</a></li>
                                            </ul>
                                        </li>

                                    </ul>';

                            echo '</li>';




                                }elseif ($_SESSION['jabatan'] == 'Dokter') {

                                    echo'            
                            <li>
                                <a href="#"><i class="fa fa-pencil-square-o"></i> Tindakan <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                               
                                    <li class="menu-item-has-children dropdown">
                                        <a href="'.base_url('_plug_jabatan/Pasien').'">Data Pasien</a>
                                    </li>
                                    <li>
                                        <a href="'.base_url('_plug_jabatan/Penyakit').'">Data Penyakit</a>
                                    </li>
                                    <li>
                                        <a href="'.base_url('_plug_jabatan/Tindakan').'">Data Tindakan</a>
                                    </li>
                            </ul>
                        </li>';

                            


                                //Transaksi
                            echo '<li>
                                <a href="#"><i class="fa fa-bar-chart"></i> Transaksi <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">';

                                        echo '<li class="menu-item-has-children dropdown">
                                                <a href="'.base_url('_plug_jabatan/Perawatan').'">Perawatan Pasien</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url('_plug_jabatan/UpFotoRontgen').'"> Upload Foto Rontgen Gigi</a>
                                            </li>

                                    </ul>';

                            echo '</li>';
                                    
                                }elseif ($_SESSION['jabatan'] == 'Petugas RM') {
                                    
                                    echo'            
                            <li>
                                <a href="#"><i class="fa fa-pencil-square-o"></i> Tindakan <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                    <li>
                                        <a href="'.base_url('_plug_jabatan/Penyakit').'">Data Penyakit</a>
                                    </li>
                            </ul>
                        </li>';

                            


                                //Transaksi
                            echo '<li>
                                <a href="#"><i class="fa fa-bar-chart"></i> Transaksi <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">';

                                        echo '<li class="menu-item-has-children dropdown">
                                                <a href="'.base_url('_plug_jabatan/Perawatan').'">Perawatan Pasien</a>
                                            </li>
                                    </ul>';

                            echo '</li>';

                            //Laporan
                            echo '<li><a href="#"><i class="fa fa-file-text-o"></i> Laporan <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">';


                            echo '<li class="menu-item-has-children dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Laporan RM</a>
                                            <ul class="nav nav-third-level">
                                                <li><a href="'.base_url('_plug_jabatan/FormPerawatan').'">Form Perawatan</a></li>
                                                <li><a href="'.base_url('_plug_jabatan/LapFotoRontgen').'">Foto Rontgen Gigi</a></li>
                                            </ul>
                                        </li>

                                    </ul>';

                                }else{

                                    //Perawat
                                   

                            //Laporan
                            echo '<li><a href="#"><i class="fa fa-file-text-o"></i> Laporan <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">';

                                    echo '<li class="menu-item-has-children dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lap. Kunjungan Pasien</a>

                                            <ul class="nav nav-third-level">
                                                <li><a href="'.base_url('_plug_jabatan/Periode').'">Periode</a></li>
                                                <li><a href="'.base_url('_plug_jabatan/LapTindakan').'">Laporan Tindakan</a></li>
                                                <li><a href="'.base_url('_plug_jabatan/LapPenyakit').'">Laporan Penyakit</a></li>
                                            </ul>
                                        </li>
                                    </ul>';
                                }
                            ?>
                            </ul>
                        </nav>
                    </div>
                    
                </aside>

        <div id="page-wrapper" style="margin-top: 70px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="font-size: large;">
                            Data Pegawai
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Data</a>
                                </li>
                                <li><a href="#tambah" data-toggle="tab">Tambah</a>
                                </li>
                                <!-- <li><a href="#messages" data-toggle="tab">Messages</a>
                                </li>
                                <li><a href="#settings" data-toggle="tab">Settings</a>
                                </li> -->
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4>Data Tab</h4>
                                   <div class="table-responsive" id="datatables-master">
                                        
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="tambah">
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->

    <script src="<?php echo base_url(''); ?>/_assets/js/vendor.js"></script>
<script src="<?php echo base_url(''); ?>/_assets/js/app.js"></script>

<script src="<?php echo base_url(''); ?>/_assets/js/jquery-1.10.2.js"></script>

    <!-- Page-Level Plugin Scripts - Panels and Wells -->

    <!-- Page-Level Plugin Scripts - Tables -->
    

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo base_url();?>/_assets/js/sb-admin.js"></script>


    <!-- Page-Level Demo Scripts - Panels and Wells - Use for reference -->
    <script src="<?php echo base_url();?>/_assets/js/vendor.js"></script>
        <script src="<?php echo base_url();?>/_assets/js/app.js"></script>
    <script>

    var PreviewImage = function(event){
            var Output = document.getElementById('prevGambar');
            Output.src= URL.createObjectURL(event.target.files[0]);
        };

    $('#datatables-master').load('<?php echo base_url('_plug_jabatan/Master/DataMaster.php');?>');
    $('#tambah').load('<?php echo base_url('_plug_jabatan/Master/TambahMaster.php');?>');
    </script>

</body>

</html>
