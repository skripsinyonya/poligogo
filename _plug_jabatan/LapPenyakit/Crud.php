<?php
//	require '../../_config/config.php';
	class Crud
	{

		var $table = 'master_pegawai';

	    public function __construct()
	    {
			require '../../_config/config.php';
	    }

	    public function get_data(){

	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');

	    	$query = mysqli_query($mysqli, "select * from $this->table");
	    	while ($ress = mysqli_fetch_assoc($query)) {
	    	    	
	    	    	$result[] = $ress;

	    	}
	    	return $result;

	    }

	    public function tambah($data)
	    {
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	//$date = date('Y-m-d');

	    	$nip = $data['nip'];
	    	$nama = $data['nama'];
	    	$jabatan = $data['jabatan'];
	    	$jenis = $data['jenis_kelamin'];
	    	$tempat = $data['tempat_tinggal'];
	    	$tanggal = $data['tanggal_lahir'];
	    	$alamat = $data['alamat'];
	    	$no = $data['no_telepon'];
	    	$date = $data['tanggal_daftar'];
	    	$username = $data['username'];
	    	$password = $data['password'];
	    	$gambar = $data['gambar'];

	    	$query_cek = mysqli_query($mysqli, "select * from master_pegawai where nip='$nip' and username='$username'");
	    	$fetch_cek = mysqli_num_rows($query_cek);

	    	if($fetch_cek > 0){

		    	$query = mysqli_query($mysqli, "insert into master_pegawai values('','$nip', '$nama', '$jabatan', '$jenis', '$tempat', '$tanggal', '$alamat', '$no', '$date', '$username', '$password', '$gambar' )");

		    	if($query == true){

		    		echo '200';

		    		header("Location: index.php");

		    	}else{
		    		echo '404';
		    		header("Location: index.php");
		    		
		    	}
	    	}else{

	    		echo "<script>alert('Username / NIP sudah tersedia');window.location='Index.php'</script>";
	    		//header("Location: index.php");

	    	}


	    	//return $data;

	    	/*$post = array(
	    		'nip' => $nip,
	    		'nama' => $nama,
	    		'jabatan' => $jabatan,
	    		'jenis' => $jenis,
	    		'tempat' => $tempat,
	    		'tanggal' => $tanggal,
	    		'alamat' => $alamat,
	    		'no' => $no,
	    		'date' => $date,
	    		'username' => $username,
	    		'password' => $password,
	    		'gambar' => $gambar,
	    	);

	    	pre($post);*/

	    }

	    public function hapus()
	    {		
	    	$id = $_POST['id'];
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');

	    	$query = mysqli_query($mysqli, "delete from $this->table where id = '$id'");

	    	if(isset($query)){

	    		echo  "Data $id Telah berhasil di hapus";

	    	}else{
	    		echo  'galat';
	    	}

	    }

	    public function today(){

	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	$query = mysqli_query($mysqli, 'SELECT CURRENT_DATE as now');

	    	$result = mysqli_fetch_assoc($query);
	    	return $result;
	    }

	    public function edit($id, $data)
	    {
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');	    	
	    	$query = mysqli_query($mysqli, "update $this->table set nip = '".$data['nip']."', nama = '".$data['nama']."', jabatan='".$data['jabatan']."', jenis_kelamin='".$data['jenis_kelamin']."', tempat_lahir ='".$data['tempat_lahir']."', tanggal_lahir ='".$data['tanggal_lahir']."', alamat='".$data['alamat']."', no_telepon='".$data['no_telepon']."' where id='$id'");

	    	if($query == true){

	    		echo "Berhasil mengedit data";

	    	}else{

	    		echo 'Galat';

	    	}
	    	
	    }

	    public function modal_edit($id){
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	$query = mysqli_query($mysqli, "select * from $this->table where id = '$id' ");
	    	$result = mysqli_fetch_assoc($query);
	    	return $result;
	    }

	    function pre($var){
	    	echo '<pre>';
	    	print_r($var);
	    	echo '</pre>';
	    }
	}

?>