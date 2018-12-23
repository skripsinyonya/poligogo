<?php
	class Crud
	{

		var $table = 'tindakan';


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

	    	
	    	$nama_tindakan = $data['nama_tindakan'];
	    	$icd_cm = $data['icd_cm'];
	    	$no_rm = $data['no_rm'];
	    	$foto = $data['foto_rontgen'];
	    	$status = $data['status'];


	    	$query = mysqli_query($mysqli, "insert into tindakan values('', '$nama_tindakan', '$icd_cm','$no_rm','$foto','$status')");

	    	if($query == true){

	    		//echo '200';
	    		echo "<script>alert('Berhasil menambahkan data')</script>";
	    		header("Location: index.php");

	    	}else{
	    		echo '404';
	    		header("Location: index.php");
	    		
	    	}


	    }

	    public function hapus($id_tindakan)
	    {		
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');

	    	$query = mysqli_query($mysqli, "delete from $this->table where id_tindakan = '$id_tindakan'");

	    	if(isset($query)){

	    		echo  "Data $id_tindakan Telah berhasil di hapus";

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

	    public function modal_edit($id)
	    {
	    	
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	$query = mysqli_query($mysqli, 'select * from tindakan where id_tindakan ="'.$id.'"');

	    	$result = mysqli_fetch_assoc($query);
	    	return $result;

	    }

	    public function edit($id, $data)
	    {
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');
	    	$query = mysqli_query($mysqli, 'update tindakan set nama_tindakan="'.$data['nama_tindakan'].'" where id_tindakan = "'.$id.'"');

	    	#$numrows = mysqli_fetch_assoc($query);

	    	if($query == true){
	    		
	    		echo "Berhasil mengedit data";

	    	}else{

	    		echo 'Galat';

	    	}
	    }

	     function get_pasien()
	    {
	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');

	    	$query = mysqli_query($mysqli, "Select * from pasien");
	    	return $query;
	    }

	    function get_pasien_by($norm){

	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');

	    	$query = mysqli_query($mysqli, "Select * from pasien where no_rm = $norm");
	    	$result = mysqli_fetch_assoc($query);
	    	return $result;

	    }

	    function get_icd_cm(){

	    	$mysqli = mysqli_connect('localhost','root','','db_poligigi');

	    	$query = mysqli_query($mysqli, "Select right(icd_cm, 7) as no_icd from tindakan order by icd_cm desc");
	    	$result = mysqli_fetch_assoc($query);

	    	if(!empty($result)){

	    		$result = $result['no_icd'] + 1;

	    	}else{
	    		
	    		$result = '2010001';

	    	}

	    	return $result;

	    }

	    function pre($var){
	    	echo '<pre>';
	    	print_r($var);
	    	echo '</pre>';
	    }
	}

?>