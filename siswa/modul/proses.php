<?php 
include "../../koneksi.php";

//Proses Edit Foto Siswa Saja

if(isset($_POST['edit-foto-siswa'])){
$nis = $_POST['nis'];
$ukuran_file = $_FILES['foto']['size'];
	$nama_gambar=$_FILES['foto']['name'];

	$uploaddir='../../upload/';
	$alamatfile=$uploaddir.$nama_gambar;
  if($nama_gambar==""){
		$foto="";
	}else{
		$foto=", foto='$alamatfile'";
	}

	if($ukuran_file <= 2000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        		// Jika ukuran file kurang dari sama dengan 2MB, lakukan :
        		// Proses upload
		if (move_uploaded_file($_FILES['foto']['tmp_name'],$alamatfile)){
			
		}

		$sql = "UPDATE siswa SET
		nis = '$nis' $foto WHERE nis ='$nis'";

		
		if(mysqli_query($koneksi,$sql)){
			header('location:profil.php?pesan=sukses-edit-foto');
			} 
			else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
			}

    			}else{
        		// Jika ukuran file lebih dari 2MB, lakukan :
        		header('location:profil.php?pesan=gagal-input-gambar-kapasitas-siswa');
    		}
		
	mysqli_close($koneksi);

}

//End Proses Edit Foto Saja

if(isset($_POST['edit-profil-siswa'])){

	$nis= $_POST['nis'];
	$nama_siswa = $_POST['nama_siswa'];
	$tgl_lahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telp_siswa'];
	$status = $_POST['status'];

	$sql = "UPDATE siswa SET
		nama_siswa = '$nama_siswa',
		tgl_lahir = '$tgl_lahir',
		agama = '$agama',
		alamat = '$alamat',
		telp_siswa = '$telepon' WHERE nis='$nis'
		";

		
		if(mysqli_query($koneksi,$sql)){
			header('location:profil.php?pesan=sukses-edit-profil');
			} 
			else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
			}

}
?>