<?php
date_default_timezone_set('Asia/Jakarta');
//session_start();

$con = mysqli_connect('localhost','root','','db_poligigi');
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}

function base_url($url = null){
	$base_url = "http://localhost/poligogo";
	if($url != null){
		return $base_url."/".$url;
	} else {
		return $base_url;
	}
}

function pre($var){
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}
?>