<?php
include "../../koneksi.php";

//Hapus Guru
if(isset($_GET['nip'])){
	$nip = $_GET['nip'];
	$query = mysqli_query($koneksi,"DELETE FROM guru_kelas WHERE nip='$nip'");  
	//$q1 = mysqli_query($koneksi,"SELECT foto FROM guru_kelas WHERE nip='$nip'");
	//$d1 = mysqli_fetch_array($q1);  
	//unlink($d1['foto']);
	header('location:data-guru.php?pesan=hapus-guru');
	}
//End Hapus Guru

//Hapus Siswa
if(isset($_GET['nis'])){
	$nis = $_GET['nis'];
	$query = mysqli_query($koneksi,"DELETE FROM siswa WHERE nis='$nis'");    
	header('location:data-siswa.php?pesan=hapus-siswa');
	}
//End Hapus Siswa

//Hapus Kelas
if(isset($_GET['id_kelas'])){
	$id = $_GET['id_kelas'];
	$query = mysqli_query($koneksi,"DELETE FROM kelas WHERE id_kelas='$id'");    
	header('location:data-kelas.php?pesan=sukses-hapus-kelas');
	}
//End Hapus Siswa

//Hapus Mapel
if(isset($_GET['id_mapel'])){
	$id = $_GET['id_mapel'];
	$query = mysqli_query($koneksi,"DELETE FROM mapel WHERE id_mapel='$id'");
	mysqli_query($koneksi,"DELETE FROM mapel_detail WHERE id_mapel='$id'");    
	header('location:data-mapel.php?pesan=sukses-hapus-mapel');
	}
//End Hapus Mapel

?>