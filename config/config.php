<?php
session_start();
class Config{
	function koneksi(){
		$conn= new mysqli ('localhost','root','','db_sisteminformasikasirswasthi');
		if($conn ->connect_error){
			$conn =die("koneksi gagal: ". $conn ->connect_error);
		}
		return $conn;
	}
	function auten(){
		if(isset($_SESSION['login']['email'])){
			return true;
		}else{
			return false;
		}
	}
	function site_url(){
		return "http://localhost/SIKAS2/";
	}
}
?>



