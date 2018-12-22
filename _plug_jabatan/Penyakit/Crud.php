<?php
	class Crud
	{

		var $table = 'penyakit';


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

	    	$id_penyakit = $data['id_penyakit'];
	    	$nama_penyakit = $data['nama_penyakit'];
	    	$icd_x = $data['icd_x'];


	    	$query = mysqli_query($mysqli, "insert into penyakit values('$id_penyakit', '$nama_penyakit', '$icd_x')");

	    	if($query == true){

	    		echo '200';

	    		header("Location: index.php");

	    	}else{
	    		echo '404';
	    		header("Location: index.php");
	    		
	    	}


	    }

	    public function hapus()
	    {		
	    	$id_penyakit = $_POST['id_penyakit'];
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');

	    	$query = mysqli_query($mysqli, "delete from $this->table where id_penyakit = '$id_penyakit'");

	    	if(isset($query)){

	    		echo  "Data $id_penyakit Telah berhasil di hapus";

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

	    public function edit()
	    {
	    	
	    }

	    function pre($var){
	    	echo '<pre>';
	    	print_r($var);
	    	echo '</pre>';
	    }
	}

?>