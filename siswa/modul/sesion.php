<?php
include "../timeout.php";

error_reporting(0);
session_start();

if(!isset($_SESSION['nis'])){
    echo '<script language="javascript">window.location = "../../"</script>';
}

if($_SESSION['level']!="siswa"){
    echo '<script language="javascript">window.location = "page_404.html"</script>';
}


 //fungsi cek waktu session. jika bernilai false atau tidak true
 if (!login_check()) {
  //alihkan user ke halaman logout
  ?><script language="javascript">document.location.href='logout.php';</script><?php
  exit(0);
 }

?>