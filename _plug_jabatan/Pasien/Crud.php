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
	    	$tanggal_lahir = $data['tanggal_lahir'];
	    	$alamat = $data['alamat'];
	    	$nik = $data['nik'];
	    	$nama_kk = $data['nama_kk'];
	    	$no_kk = $data['no_kk'];
	    	$alergi = $data['alergi'];

	    	$query_cek = mysqli_query($mysqli, "select * from pasien where nik='$nik'");
	    	$fetch_cek = mysqli_num_rows($query_cek);

	    	if($fetch_cek < 1){

		    	$query = mysqli_query($mysqli, "insert into pasien values('$no_rm', '$no_kk', '$nama_kk', '$nik', '$nama_pasien', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$alergi' )");

		    	if($query == true){

		    		echo '200';
		    		echo "<script>alert('Berhasil Menambahkan data')</script>";
		    		header("Location: index.php");

		    	}else{
		    		echo '404';
		    		echo "<script>alert('Galat')</script>";
		    		header("Location: index.php");
		    		
		    	}
	    	}else{

	    		echo "<script>alert('NIK SUDAH TERDAFTAR');window.location='Index.php'</script>";
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

	    public function hapus($no_rm)
	    {		
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
	    	$query = mysqli_query($mysqli, "update $this->table set no_rm = '".$data['no_rm']."', nama_pasien = '".$data['nama_pasien']."', jenis_kelamin='".$data['jenis_kelamin']."', tempat_lahir ='".$data['tempat_lahir']."', tanggal_lahir ='".$data['tanggal_lahir']."', alamat='".$data['alamat']."', nik='".$data['nik']."', nama_kk='".$data['nama_kk']."', no_kk='".$data['no_kk']."', alergi='".$data['alergi']."' where no_rm ='$id'");

	    	if($query == true){

	    		echo "Berhasil mengedit data";

	    	}else{

	    		echo 'Galat';

	    	}
	    	
	    }

	    public function modal_edit($id){
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	$query = mysqli_query($mysqli, "select * from $this->table where no_rm = '$id' ");
	    	$result = mysqli_fetch_assoc($query);
	    	return $result;
	    }

	    public function get_norm()
	    {
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	$query = mysqli_query($mysqli, "Select right(no_rm, 6) as no_rm from pasien order by no_rm desc");
	    	$result = mysqli_fetch_assoc($query);

	    	if($result['no_rm'] <= 10){

	    		$result = '00000'.($result['no_rm'] + 1);

	    	}elseif($result['no_rm'] <= 100){

	    		$result = '0000'.($result['no_rm'] + 1);

	    	}elseif($result['no_rm'] <= 1000){

	    		$result = '000'.($result['no_rm'] + 1);

	    	}elseif($result['no_rm'] <= 10000){

	    		$result = '00'.($result['no_rm'] + 1);

	    	}elseif($result['no_rm'] <= 100000){

	    		$result = '0'.($result['no_rm'] + 1);

	    	}else{
	    		
	    		$result = '000001';

	    	}

	    	return $result;
	    }

	    public function cari($cari)
	    {
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	$query = mysqli_query($mysqli, "SELECT * FROM `pasien` WHERE (nik like '%$cari%' OR no_rm LIKE '%$cari%' OR nama_pasien like '%$cari%')");

	    	$result = array();
	    	while ($ress = mysqli_fetch_assoc($query)) {
	    	    	
	    	    	$result[] = $ress;

	    	}

	    	$count = count($result);

	    	$result = $count > 0 ? $result : null;

	    	return $result;


	    }

	    function pre($var){
	    	echo '<pre>';
	    	print_r($var);
	    	echo '</pre>';
	    }
	}

?>