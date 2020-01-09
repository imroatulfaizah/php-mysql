<?php 
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Login Admin | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar">
<meta name="author" content="Malik">
<title>Login Guru | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar</title>
<link href="../asset/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../images/favicon.png" />
</head>

<body style="background-image: url('../images/back.jpg');">
	<div class="login-kotak" style="background: #fff;">
    	<div class="login-kotak-dalam">
        	<img src="../images/baner.png" width="500px" height="100px;">
        </div>
        <div class="login-kotak-bawah">
        <form action="cek-login.php" name="login" method="post" enctype="multipart/form-data">
            <div class="label"><h2>LOGIN GURU KELAS</h2></div>
            	<?php
                      if (!empty($_GET['pesan']) && $_GET['pesan'] == 'log-gagal') {
                           echo '<div class="label-eror">
                                Username / Password Anda Salah
                                </div>';
                          }
                      if (!empty($_GET['pesan']) && $_GET['pesan'] == 'tidak-aktif') {
                           echo '<div class="label-eror">
                                Akun Anda Sudah Di Nonaktifkan
                                </div>';
                          }    
				?>
            <div class="input-login"><input type="text" placeholder="NIP" name="nip" required autofocus style="vertical-align:middle" class="in-text"></div>
            
            <div class="input-login"><input type="password" placeholder="Password" name="password" required style="vertical-align:middle" class="in-text" ></div>
            
            <div class="input-login1"><button type="submit" name="login" class="button b-login" style="vertical-align:middle"><span>Login </span></button></div>
            
            <div class="input-login1"><a href="../" class="button b-reset" style="width:190px"><span>Batal </span></a></div>
        </form>    
        </div>
        
        <div class="created">
        <br>
        	Created By <a href="" style="text-decoration: none;">MalikFajar91</a>
        </div>
    </div>
</body>
</html>