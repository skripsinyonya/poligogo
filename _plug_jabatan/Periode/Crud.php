<?php
//	require '../../_config/config.php';
	class Crud
	{

		var $table = 'kunjungan';

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

	    	$id_kunjungan = $data['id_kunjungan'];
	    	$no_rm = $data['no_rm'];
	    	$nama_pasien = $data['nama_pasien'];
	    	$diagnosis = $data['diagnosis'];
	    	$tindakan = $data['tindakan'];
	    	$tanggal_kunjungan = $data['tanggal_kunjungan'];

	    	$query_cek = mysqli_query($mysqli, "select * from kunjungan where id_kunjungan='$id_kunjungan' asc");
	    	$fetch_cek = mysqli_num_rows($query_cek);

	    	if($fetch_cek > 0){

		    	$query = mysqli_query($mysqli, "insert into kunjungan values('id_kunjungan','$no_rm', '$nama_pasien', '$diagnosis', '$tindakan', '$tanggal_kunjungan' )");

		    	if($query == true){

		    		echo '200';

		    		header("Location: index.php");

		    	}else{
		    		echo '404';
		    		header("Location: index.php");
		    		
		    	}
	    	}else{

	    		echo "<script>alert('ID Kunjungan sudah tersedia');window.location='Index.php'</script>";
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
	    	$id_kunjungan = $_POST['id_kunjungan'];
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');

	    	$query = mysqli_query($mysqli, "delete from $this->table where id_kunjungan = '$id_kunjungan'");

	    	if(isset($query)){

	    		echo  "Data $id_kunjungan Telah berhasil di hapus";

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
	    	$query = mysqli_query($mysqli, "update $this->table set id_kunjungan = '".$data['id_kunjungan']."', no_rm = '".$data['no_rm']."', nama_pasien='".$data['nama_pasien']."', diagnosis='".$data['diagnosis']."', tindakan ='".$data['tindakan']."', tanggal_kunjungan ='".$data['tanggal_kunjungan']."'");

	    	if($query == true){

	    		echo "Berhasil mengedit data";

	    	}else{

	    		echo 'Galat';

	    	}
	    	
	    }

	    public function modal_edit($id){
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	$query = mysqli_query($mysqli, "select * from $this->table where id_kunjungan = '$id_kunjungan' ");
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