<?php
#require '../../_config/config.php';
require 'Crud.php';
$crud = new Crud;

	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$jabatan = $_POST['jabatan'];
	$jenis = !empty($_POST['jk'][0]) ? $_POST['jk'][0] : $_POST['jk'][1];
	$tempat = $_POST['tempat'];
	$tanggal = $_POST['tanggal'];
	$alamat = $_POST['alamat'];
	$no = $_POST['no'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	//upload gambar
	$gambar = time().$_FILES['gambar']['name'];
	$type = $_FILES['gambar']['type'];
	$size = $_FILES['gambar']['size'];
	$tmp = $_FILES['gambar']['tmp_name'];
	$dirUpload = '../../_images/Upload/';
	$terUpload = move_uploaded_file($tmp, $dirUpload.$gambar);

$date = date('Y-m-d');

//$query = mysqli_query($con, "insert into master_pegawai values('$nip', $nama $jabatan, $jenis, $tempat, $tanggal, $alamat, $no, $date, $username, $password, $gambar )");
if($type == 'image/jpeg' || $type == 'image/png' || $type = 'image/jpg'){

	if($size <= 300000){

		if($terUpload){

			$data = array(
				'nip' => $nip,
				'nama' => $nama,
				'jabatan' => $jabatan,
				'jenis_kelamin' => $jenis,
				'tempat_tinggal' => $tempat,
				'tanggal_lahir' => $tanggal,
				'alamat' => $alamat,
				'no_telepon' => $no,
				'tanggal_daftar' => $date,
				'username' => $username,
				'password' => $password,
				'gambar' => $gambar,
			);
			$crud->tambah($data);

		}else{
			echo "<script>alert('Re-Upload');window.location='Index.php'</script>";
		}

	}else{

		echo "<script>alert('Ukuran Harus kurang 300kb');window.location='Index.php';</script>";

	}

}else{
	echo "<script>alert('Type Harus jpeg,PNG,jpg')</script>";
	header('Index.php');
}
 
//$crud->pre($crud->tambah($data));
?>