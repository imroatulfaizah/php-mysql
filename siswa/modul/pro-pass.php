<?php
include '../../koneksi.php'; 

if(isset($_POST['r-pass'])){
$nis = $_POST['nis'];
$passwordlama  = $_POST['oldPass'];
$passwordbaru1 = $_POST['newPass1'];
$passwordbaru2 = $_POST['newPass2'];
$password_md5 = md5($passwordlama);
$passwordnew = md5($passwordbaru1);
$query = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$nis'");
$data  = mysqli_fetch_array($query);



if ($data['password'] == $password_md5)

{
	if ($passwordbaru1 == $passwordbaru2)
	
	{
				
		$passwordbaruenkrip = $passwordnew;
		
		$query1 = mysqli_query($koneksi,"UPDATE siswa SET password = '$passwordbaruenkrip' WHERE nis = '$nis'");


if ($query1) echo header('location:r-pass.php?pesan=sukses-edit-pass');

	}

else 
echo header('location:r-pass.php?pesan=pas-tak-sama');

	}

else 
echo header('location:r-pass.php?pesan=pas-lama-salah');

}

?>