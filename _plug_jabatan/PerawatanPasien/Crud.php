<?php
//	require '../../_config/config.php';
	class Crud
	{

		var $table = 'perawatan';

	    public function __construct()
	    {
			require '../../_config/config.php';
	    }

	    public function get_data(){

	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');

	    	$query = mysqli_query($mysqli, "SELECT * from perawatan_pasien");

	    	$result = array();
	    	#pre($query);
	    	while ($ress = mysqli_fetch_assoc($query)){
	    	    	
	    	    	$result[] = $ress;

	    	}
	    	return $result;

	    }

	    public function get_nip($username)
	    {
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');

	    	$query = mysqli_query($mysqli, "select * from master_pegawai where username = '$username' ");

	    	$result = mysqli_fetch_assoc($query);

	    	return $result;
	    }

	    public function show_tindakan($id)
	    {
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');

	    	$query = mysqli_query($mysqli, "select * from pasien_tindakan where id_tindakan = $id");
	    	$result = mysqli_fetch_assoc($query);

	    	return $result;
	    }

	    public function tambah($data)
	    {
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	//$date = date('Y-m-d');
	    	$now = mysqli_query($mysqli, "select now() as now");
	    	$now = mysqli_fetch_assoc($now);
	    	$now = $now['now'];

	    	$nip_perawat = $data['nip_perawat'];
	    	$id_tindakan = $data['id_tindakan'];
	    	$tanggal_masuk = $now;
	    	$tanggal_dirawat = $data['tanggal_dirawat'];
	    	/*pre(array($nip_perawat, $id_tindakan, $tanggal_masuk, $tanggal_dirawat));
	    	die;*/

	    	$query_cek = mysqli_query($mysqli, "select * from perawatan where id_tindakan='$id_tindakan'");
	    	$fetch_cek = mysqli_num_rows($query_cek);

	    	if($fetch_cek < 1){

		    	$query = mysqli_query($mysqli, "insert into perawatan values('','$nip_perawat', '$id_tindakan', '$tanggal_masuk', '$tanggal_dirawat')");

		    	if($query == true){

		    		//echo '200';
		    		echo "<script>alert('BERHASIL INPUT DATA');window.location='Index.php'</script>";

		    	}else{
					//echo '404';
		    		echo "<script>alert('GALAT !');window.location='Index.php'</script>";
		    		
		    	}
	    	}else{

	    		echo "<script>alert('NO TINDAKAN SUDAH DIMASUKKAN !');window.location='Index.php'</script>";
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

	    public function hapus($id)
	    {		
	    	//$id = $_POST['id_perawatan'];
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');

	    	$query = mysqli_query($mysqli, "delete from $this->table where id_perawatan = '$id'");

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
	    	$query = mysqli_query($mysqli, "update $this->table set id_tindakan = '".$data['id_tindakan']."', tanggal_dirawat = '".$data['tanggal_dirawat']."' where id_perawatan='$id'");

	    	if($query == true){

	    		echo "Berhasil mengedit data";

	    	}else{

	    		echo 'Galat';

	    	}
	    	
	    }

	    public function modal_edit($id){
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	$query = mysqli_query($mysqli, "select * from $this->table where id_perawatan = '$id' ");
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