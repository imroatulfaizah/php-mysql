<?php 
include "../../koneksi.php";

//Input Guru
if(isset($_POST['in-guru'])){
	
	$nip = $_POST['nip'];
	$nama_guru = $_POST['nama_guru'];
	$tgl_lahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telp_guru'];
	$status = $_POST['status'];
	$level = $_POST['level'];
	$id_kelas = $_POST['id_kelas'];

	// Ambil Data yang Dikirim dari Form
	$nama_file = $_FILES['foto']['name'];
	$ukuran_file = $_FILES['foto']['size'];
	$tipe_file = $_FILES['foto']['type'];
	$tmp_file = $_FILES['foto']['tmp_name'];
 
	// Set path folder tempat menyimpan gambarnya
	$path = "../../upload/".$nama_file;
	
		$query = mysqli_query($koneksi,"SELECT nip FROM guru_kelas WHERE nip='$nip'");
		if(mysqli_num_rows($query)> 0){
		header('location:in-guru.php?pesan=gagal-input-guru');
		}
		else
		{
		if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg" || $tipe_file == "image/gif" || $tipe_file == "image/GIF" || $tipe_file == "image/PNG" || $tipe_file == "image/JPG" || $tipe_file == "image/JPEG"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    		// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
    		if($ukuran_file <= 2000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        		// Jika ukuran file kurang dari sama dengan 2MB, lakukan :
        		// Proses upload
        			if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            			// Jika gambar berhasil diupload, Lakukan : 
            			// Proses simpan ke Database
            			$sql = "INSERT INTO guru_kelas(nip,nama_guru,password,alamat,tgl_lahir,agama,telp_guru,status,foto,level,id_kelas) VALUES ('$nip','$nama_guru',md5('$nip'),'$alamat','$tgl_lahir','$agama','$telepon','$status','../../upload/$nama_file','$level','$id_kelas')";

							if(mysqli_query($koneksi,$sql)){
								header('location:in-guru.php?pesan=sukses-input-guru');
								} 
							else {
    					echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
						}

        			}else{
            		// Jika gambar gagal diupload, Lakukan :
            		header('location:in-guru.php?pesan=gagal-input-gambar-guru');
        			}
    			}else{
        		// Jika ukuran file lebih dari 2MB, lakukan :
        		header('location:in-guru.php?pesan=gagal-input-gambar-kapasitas-guru');
    		}
		}else{
    	// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
    	header('location:in-guru.php?pesan=gagal-input-gambar-salah-guru');
	}

		}
	mysqli_close($koneksi);
	}
//End Input Guru

//edit Guru
if(isset($_POST['edit-guru'])){
	$nip = $_POST['nip'];
	$nama_guru = $_POST['nama_guru'];
	$tgl_lahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telp_guru'];
	$status = $_POST['status'];
	$id_kelas = $_POST['id_kelas'];

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
		nama_guru = '$nama_guru',
		tgl_lahir = '$tgl_lahir',
		agama = '$agama',
		alamat = '$alamat',
		telp_guru = '$telepon',
		status = '$status',
		id_kelas = '$id_kelas'
		$foto WHERE nip ='$nip'
		";

		
		if(mysqli_query($koneksi,$sql)){
			header('location:data-guru.php?pesan=sukses-edit-guru');
			} 
			else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
			}

    			}else{
        		// Jika ukuran file lebih dari 2MB, lakukan :
        		header('location:data-guru.php?pesan=gagal-input-gambar-kapasitas-guru');
    		}
		
	mysqli_close($koneksi);
	}	
		

//End Edit Guru


//Input Siswa
if(isset($_POST['in-siswa'])){
	
	$nis = $_POST['nis'];
	$nama_siswa = $_POST['nama_siswa'];
	$tgl_lahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telp_siswa'];
	$thn1 = $_POST['thn1'];
	$thn2 = $_POST['thn2'];
	$id_kelas = $_POST['id_kelas'];
	$sem = $_POST['semester'];
	
	// Ambil Data yang Dikirim dari Form
	$nama_file = $_FILES['foto']['name'];
	$ukuran_file = $_FILES['foto']['size'];
	$tipe_file = $_FILES['foto']['type'];
	$tmp_file = $_FILES['foto']['tmp_name'];
 
	// Set path folder tempat menyimpan gambarnya
	$path = "../../upload/".$nama_file;
	
		$query = mysqli_query($koneksi,"SELECT nis FROM siswa WHERE nis='$nis'");
		if(mysqli_num_rows($query)> 0){
		header('location:in-siswa.php?pesan=gagal-input-siswa');
		}
		else
		{
		if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg" || $tipe_file == "image/gif" || $tipe_file == "image/GIF" || $tipe_file == "image/PNG" || $tipe_file == "image/JPG" || $tipe_file == "image/JPEG"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    		// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
    		if($ukuran_file <= 2000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        		// Jika ukuran file kurang dari sama dengan 2MB, lakukan :
        		// Proses upload
        			if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            			// Jika gambar berhasil diupload, Lakukan : 
            			// Proses simpan ke Database
            			$sql = "INSERT INTO siswa(nis,password,nama_siswa,tgl_lahir,agama,alamat,telp_siswa,status,foto,id_kelas,level,tahun_angkatan,semester,tahun_ajaran) VALUES ('$nis',md5('$nis'),'$nama_siswa','$tgl_lahir','$agama','$alamat','$telepon','Pelajar','../../upload/$nama_file','$id_kelas','siswa','$thn1','$sem','$thn2')";

							if(mysqli_query($koneksi,$sql)){
								header('location:in-siswa.php?pesan=sukses-input-siswa');
								} 
							else {
    					echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
						}

        			}else{
            		// Jika gambar gagal diupload, Lakukan :
            		header('location:in-siswa.php?pesan=gagal-input-gambar-siswa');
        			}
    			}else{
        		// Jika ukuran file lebih dari 2MB, lakukan :
        		header('location:in-siswa.php?pesan=gagal-input-gambar-kapasitas-siswa');
    		}
		}else{
    	// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
    	header('location:in-siswa.php?pesan=gagal-input-gambar-salah-siswa');
	}

		}
	mysqli_close($koneksi);
	}
//End Input Siswa


//Edit Siswa
if(isset($_POST['edit-siswa'])){
	$nis = $_POST['nis'];
	$nama_siswa = $_POST['nama_siswa'];
	$tgl_lahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telp_siswa'];
	$status = $_POST['status'];
	$id_kelas = $_POST['id_kelas'];
	$thn1 = $_POST['thn1'];
	$thn2 = $_POST['thn2'];
	$sem = $_POST['semester'];

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
		nama_siswa = '$nama_siswa',
		tgl_lahir = '$tgl_lahir',
		agama = '$agama',
		alamat = '$alamat',
		telp_siswa = '$telepon',
		id_kelas = '$id_kelas',
		tahun_angkatan = '$thn1',
		tahun_ajaran = '$thn2',
		semester = '$sem',
		status = '$status' $foto WHERE nis ='$nis'
		";

		
		if(mysqli_query($koneksi,$sql)){
			header('location:data-siswa.php?pesan=sukses-edit-siswa');
			} 
			else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
			}

    			}else{
        		// Jika ukuran file lebih dari 2MB, lakukan :
        		header('location:data-siswa.php?pesan=gagal-input-gambar-kapasitas-siswa');
    		}
		
	mysqli_close($koneksi);
	}	
		

//End Edit Siswa


// Input Kelas

if(isset($_POST['in-kelas'])){
	
	$nama_kelas = $_POST['nama_kelas'];
	
	$query = mysqli_query($koneksi,"SELECT nama_kelas FROM kelas WHERE nama_kelas='$nama_kelas'");
		if(mysqli_num_rows($query)> 0){
		header('location:in-kelas?pesan=gagal-input-kelas');
		}
		else
		{
	$sql = mysqli_query($koneksi,"INSERT INTO kelas(id_kelas,nama_kelas) VALUES('','$nama_kelas')");
	
	if($sql){
		header('location:in-kelas.php?pesan=sukses-input-kelas');
		}
		}
	
	}

// End Input Kelas

// Edit Kelas

if(isset($_POST['edit-kelas'])){
	$id_kelas = $_POST['id_kelas'];
	$nama_kelas = $_POST['nama_kelas'];
	
	$query = mysqli_query($koneksi,"SELECT nama_kelas FROM kelas WHERE nama_kelas='$nama_kelas'");
		if(mysqli_num_rows($query)> 0){
		header('location:data-kelas.php?pesan=gagal-edit-kelas');
		}
		else
		{
	$sql = mysqli_query($koneksi,"UPDATE kelas SET id_kelas='$id_kelas',nama_kelas='$nama_kelas' WHERE id_kelas='$id_kelas'");
	
	if($sql){
		header('location:data-kelas.php?pesan=sukses-edit-kelas');
		}
		}
	
	}

// End Edit Kelas

// Input Mapel

if(isset($_POST['in-mapel'])){
	
	$nama_mapel = $_POST['nama_mapel'];
	$kel	= $_POST['kel'];
	
	$query = mysqli_query($koneksi,"SELECT nama_mapel FROM mapel WHERE nama_mapel='$nama_mapel'");
		if(mysqli_num_rows($query)> 0){
		header('location:in-mapel.php?pesan=gagal-input-mapel');
		}
		else
		{
	mysqli_query($koneksi,"INSERT INTO mapel(id_mapel,nama_mapel) VALUES('','$nama_mapel')");
	
	$q1 = mysqli_query($koneksi,"SELECT * FROM mapel where nama_mapel='$nama_mapel'");
	$d1 = mysqli_fetch_array($q1);
				
	$jml=count($kel);
	for($i=0; $i<$jml; $i++) {
		mysqli_query($koneksi,"INSERT INTO mapel_detail(id_mapel,id_kelas) VALUES('$d1[id_mapel]','$kel[$i]')");
	}
	
		header('location:in-mapel.php?pesan=sukses-input-mapel');
		}
	
	}

// End Input Mapel

// Edit Mapel

if(isset($_POST['edit-mapel'])){
	$id_mapel = $_POST['id_mapel'];
	$nama_mapel = $_POST['nama_mapel'];
	$kel	= $_POST['kel'];
	
	mysqli_query($koneksi,"UPDATE mapel SET id_mapel='$id_mapel',nama_mapel='$nama_mapel' WHERE id_mapel='$id_mapel'");
	
	mysqli_query($koneksi,"DELETE FROM mapel_detail WHERE id_mapel='$id_mapel'");		
	$jml=count($kel);
	for($i=0; $i<$jml; $i++) {
		mysqli_query($koneksi,"INSERT INTO mapel_detail(id_mapel,id_kelas) VALUES('$id_mapel','$kel[$i]')");
	}

		header('location:data-mapel.php?pesan=sukses-edit-mapel');
		
	
	}

// End Edit Mapel

?>