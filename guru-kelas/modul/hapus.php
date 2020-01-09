<?php
include "../../koneksi.php";

//Hapus Siswa
if(isset($_GET['id_siswa'])){
	$id = $_GET['id_siswa'];
	$query = mysqli_query($koneksi,"DELETE FROM siswa WHERE id_siswa='$id'");    
	header('location:data-siswa?pesan=hapus-siswa');
	}
//End Hapus Siswa

?>