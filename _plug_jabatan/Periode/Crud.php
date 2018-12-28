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

	    	$result = array();
	    	$query = mysqli_query($mysqli, "select * from $this->table, pasien where kunjungan.no_rm = pasien.no_rm");
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
	    	$diagnosis = $data['diagnosis'];
	    	$tindakan = $data['tindakan'];
	    	$kunjungan = $data['tanggal_kunjungan'];

	    	$query = mysqli_query($mysqli, "insert into kunjungan values('','$no_rm','$diagnosis','$tindakan','$kunjungan')");

	    	if(isset($query)){

	    		echo "<script>alert('Data Berhasil masuk');location.href='Index.php'</script>";

	    	}else{

	    		echo "<script>alert('Galat');location.href='Index.php'</script>";

	    	}


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

	    public function sekarang()
	    {
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	$query = mysqli_query($mysqli, 'SELECT now() as now');

	    	$result = mysqli_fetch_assoc($query);
	    	$result = $result['now'];
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

	    public function show_norm($norm)
	    {
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	$query = mysqli_query($mysqli, "select * from pasien where no_rm = '$norm' ");
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