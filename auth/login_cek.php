<?php
require_once "../_config/config.php";
session_start();

/*$server = "localhost"; //ganti sesuai server Anda
$username = "root"; //ganti sesuai username Anda
$password = ""; //ganti sesuai password Anda
$db_name = "db_poligigi"; //ganti sesuatu nama database Anda
$db = mysql_connect($root,$username,$password) or DIE("koneksi ke database gagal !!");
mysql_select_db($db_name) or DIE("nama database tersebut tidak ada !!");*/

/*$login = mysql_query("select * from pegawai where (username = '" . $_POST['username'] . "') and (password = '" . md5($_POST['password']) . "')",$db);*/
$user = !empty($_POST['user']) ? $_POST['user'] : null;
$pass = !empty($_POST['pass']) ? md5($_POST['pass']) : null;

$data = array($user, $pass);

$login = mysqli_query($con,"select * from master_pegawai where username = '".$user."' and password = '".$pass."'");

//$login = mysqli_query($con,"select * from master_pegawai, jabatan where master_pegawai.username = '".$user."' and master_pegawai.password = '".$pass."' and jabatan.id = master_pegawai.jabatan");
//jika menggunakan 2 tabel ( tabel master_pegawai, jabatan [id - nama])

//$login = $login['nama'];



$rowcount = mysqli_num_rows($login);
/*pre(array($data, $rowcount));
die;*/

	if ($rowcount === 1) {

		$login = mysqli_fetch_assoc($login);

		$_SESSION = array(
			'username' => $user,
			'nama' => $login['nama'],
			'jabatan' => $login['jabatan'],
			);
		/*pre($_SESSION);
		die;*/

		/*if($login['jabatan'] == 1){
			//masuk ke dokter
		}elseif($login['jabatan'] == 2){
			//perawat
		}elseif($login['jabatan'] == 3){
			//petugas rm
		}else{
			//admin
		}*/

		
		header("Location: ../index.php");

		//LEVELNYA



	}else{

		echo "<script>Username dan password anda salah</script>";
		header("Location:./login_index.php");
		session_destroy();

	}
?>
