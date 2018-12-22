<?php
//	require '../../_config/config.php';
	class Crud
	{

		var $table = 'pasien';

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

	    	$no_rm = $data['no_rm'];
	    	$nama_pasien = $data['nama_pasien'];
	    	$jenis_kelamin = $data['jenis_kelamin'];
	    	$tempat_lahir = $data['tempat_lahir'];
	    	$tanggal = $data['tanggal_lahir'];
	    	$alamat = $data['alamat'];
	    	$nik = $data['nik'];
	    	$nama_kk = $data['nama_kk'];
	    	$no_kk = $data['no_kk'];
	    	$alergi = $data['alergi'];

	    	$query_cek = mysqli_query($mysqli, "select * from pasien where no_rm='$no_rm'");
	    	$fetch_cek = mysqli_num_rows($query_cek);

	    	if($fetch_cek > 0){

		    	$query = mysqli_query($mysqli, "insert into pasien values('no_rm', '$nama_pasien', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$nik', '$nama_kk', '$no_kk', '$alergi' )");

		    	if($query == true){

		    		echo '200';

		    		header("Location: index.php");

		    	}else{
		    		echo '404';
		    		header("Location: index.php");
		    		
		    	}
	    	}else{

	    		echo "<script>alert('Username / NOMOR RM sudah tersedia');window.location='Index.php'</script>";
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
	    	$id = $_POST['no_rm'];
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');

	    	$query = mysqli_query($mysqli, "delete from $this->table where no_rm = '$no_rm'");

	    	if(isset($query)){

	    		echo  "Data $no_rm Telah berhasil di hapus";

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
	    	$query = mysqli_query($mysqli, "update $this->table set no_rm = '".$data['no_rm']."', nama_pasien = '".$data['nama_pasien']."', jenis_kelamin='".$data['jenis_kelamin']."', tempat_lahir ='".$data['tempat_lahir']."', tanggal_lahir ='".$data['tanggal_lahir']."', alamat='".$data['alamat']."', nik='".$data['nik']."', nama_kk='".$data['nama_kk']."', no_kk='".$data['no_kk']."', alergi='".$data['alergi']."' where no_rm='$no_rm'");

	    	if($query == true){

	    		echo "Berhasil mengedit data";

	    	}else{

	    		echo 'Galat';

	    	}
	    	
	    }

	    public function modal_edit($id){
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	$query = mysqli_query($mysqli, "select * from $this->table where no_rm = '$no_rm' ");
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