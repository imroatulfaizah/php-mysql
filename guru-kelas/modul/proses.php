<?php 
include "../../koneksi.php";

//Edit Siswa
if(isset($_POST['edit-siswa'])){
	$nis = $_POST['nis'];
	$status = $_POST['status'];
	$id_kelas = $_POST['id_kelas'];
	$semester = $_POST['semester'];	
	$thn2 = $_POST['thn2'];	

		$sql = "UPDATE siswa SET
		id_kelas = '$id_kelas',
		semester = '$semester',
		tahun_ajaran = '$thn2',
		status = '$status' WHERE nis ='$nis'
		";

		
		if(mysqli_query($koneksi,$sql)){
			header('location:data-siswa.php?pesan=sukses-edit-siswa');
			} 
			else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
			}

		
	mysqli_close($koneksi);
	}	
	
//End Edit Siswa


//Input Nilai

if(isset($_POST['in-nilai'])){
	$nis = $_POST['nis'];
	$ulangan_1 = $_POST['ulangan_1'];
	$ulangan_2 = $_POST['ulangan_2'];
	$ulangan_3 = $_POST['ulangan_3'];
	$uts = $_POST['uts'];
	$uas = $_POST['uas'];
	$kd_1 = $_POST['kd_1'];
	$kd_2 = $_POST['kd_2'];
	$kd_3 = $_POST['kd_3'];
	$kd_4 = $_POST['kd_4'];
	$doa = $_POST['doa'];
	$salam = $_POST['salam'];
	$tadarus = $_POST['tadarus'];
	$sholat = $_POST['sholat'];
	$jujur = $_POST['jujur'];
	$disiplin = $_POST['disiplin'];
	$tg_jawab = $_POST['tg_jawab'];
	$toleransi = $_POST['toleransi'];
	$gt_royong = $_POST['gt_royong'];
	$santun = $_POST['santun'];
	$percaya_diri = $_POST['percaya_diri'];

	$id_kelas = $_POST['id_kelas'];
	$id_mapel = $_POST['id_mapel'];
	$thn = $_POST['thn'];
	$semester = $_POST['semester'];
	
	$count = count($nis);
	
	mysqli_query($koneksi,"DELETE FROM nilai WHERE (id_kelas LIKE '$id_kelas' AND semester LIKE'$semester' AND id_mapel LIKE'$id_mapel' AND tahun_ajaran LIKE'$thn')");
		 
		 $query5 = "INSERT INTO nilai(id_nilai,nis,id_kelas,id_mapel,tahun_ajaran,semester,ulangan_1,ulangan_2,ulangan_3,uts,uas,kd_1,kd_2,kd_3,kd_4,doa,salam,tadarus,sholat,jujur,disiplin,tg_jawab,toleransi,gt_royong,santun,percaya_diri) VALUES";
		 
		 for( $i=0; $i < $count; $i++ )
			{
 			$query5 .= "('','{$nis[$i]}','$id_kelas','$id_mapel','$thn','$semester','{$ulangan_1[$i]}','{$ulangan_2[$i]}','{$ulangan_3[$i]}','{$uts[$i]}','{$uas[$i]}','{$kd_1[$i]}','{$kd_2[$i]}','{$kd_3[$i]}','{$kd_4[$i]}','{$doa[$i]}','{$salam[$i]}','{$tadarus[$i]}','{$sholat[$i]}','{$jujur[$i]}','{$disiplin[$i]}','{$tg_jawab[$i]}','{$toleransi[$i]}','{$gt_royong[$i]}','{$santun[$i]}','{$percaya_diri[$i]}')";
 			$query5 .= ",";
		}
		
		$query5 = rtrim($query5,",");
		
		$insert = mysqli_query($koneksi,$query5);
			
			if($insert){
			header('location:in-nilai.php?pesan=sukses-input-nilai');
			} 
			else {
    	echo "Error: " . $query5 . "<br>" . mysqli_error($koneksi);
			}
}		

//End Input Nilai

//Proses Edit Foto Saja

if(isset($_POST['edit-foto'])){
$nip = $_POST['nip'];
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

		$sql = "UPDATE guru_kelas SET
		nip ='$nip' $foto WHERE nip ='$nip'";

		
		if(mysqli_query($koneksi,$sql)){
			header('location:profil.php?pesan=sukses-edit-foto');
			} 
			else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
			}

    			}else{
        		// Jika ukuran file lebih dari 2MB, lakukan :
        		header('location:profil.php?pesan=gagal-input-gambar-kapasitas-guru');
    		}
		
	mysqli_close($koneksi);

}

//End Proses Edit Foto Saja

//Edit Profil Saja

if(isset($_POST['edit-profil'])){

	$nip = $_POST['nip'];
	$nama_guru = $_POST['nama_guru'];
	$tgl_lahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telp_guru'];

	$sql = "UPDATE guru_kelas SET
		nama_guru = '$nama_guru',
		tgl_lahir = '$tgl_lahir',
		agama = '$agama',
		alamat = '$alamat',
		telp_guru = '$telepon'
		WHERE nip ='$nip'
		";

		
		if(mysqli_query($koneksi,$sql)){
			header('location:profil.php?pesan=sukses-edit-profil');
			} 
			else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
			}

}

//End Edit Profil Saja
?>