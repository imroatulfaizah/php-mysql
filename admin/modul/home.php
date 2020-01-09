<?php
include "sesion.php";
include "../../koneksi.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Home | Aplikasi Penilaian Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar">
<meta name="author" content="Malik">
<title>Home | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar</title>
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.png" />
<link href="../../asset/style.css" type="text/css" rel="stylesheet">
<!-- Bootstrap Core CSS -->
<link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery Version 1.11.1 -->
<script src="../../asset/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../../asset/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include "header.php"; ?>
<div class="container" style="margin-top:70px;">
  <div class="row">
  <div class="col-sm-12" style="margin:10px;">
    <img src="../../images/baner.png" class="img-responsive" width="100%">
    </div>
<div class="col-sm-12">
  <h3>Selamat Datang, <b style="color: red;"><i><?php echo $_SESSION['nama']?></i></b></h3>
  <p>Ini adalah sistem informasi penilaian akademik kurikulum 2013 berbasis web.</p>
</div>    
    <div class="col-md-6">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Latar Belakang</div>
                        
                        <div class="panel-body" style="overflow:auto;">
                        
                           <center> <h4> SISTEM INFORMASI PENILAIAN AKADEMIK<br> KURIKULUM 2013 <br>

                                    </h4></center>

 

    <p style="text-align:justify;">SDN Tangkil 3 Wlingi Blitar merupakan salah satu sekolah yang telah menerapkan Kurikulum 2013. Penilaian siswa di SDN Tangkil 3 Wlingi Blitar menggunakan aplikasi Microsoft Excel dengan setiap wali kelas berbeda file aplikasi yang digunakan. Proses penilaian siswa dilakukan dengan pengimputan nilai oleh wali kelas, kemudian wali kelas dapat mencetak rapor, dan rapor ditandatangani oleh kepala sekolah serta file aplikasi penilaian siswa disimpan masing-masing wali kelas.<br>
Proses tersebut dirasa masih kurang efektif dan bersifat individu karena setiap wali kelas menggunakan file aplikasi yang berbeda dan penyimapanan data penilaian siswa tidak terpusat. Menurut Kepala Sekolah SDN Tangkil 3 Wlingi Blitar, Ibu Siti Khotimah,S.Pd (2018) bahwa dengan masing-masing file aplikasi Microsoft Excel yang digunakan wali kelas, mengakibatkan file tidak tersimpan terpusat dan sering wali kelas kehilangan data penilaian siswa.
    <br>
    </p>
           
                        </div>
                </div>     
    </div>  

    <div class="col-md-6">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Tujuan</div>
                        
                        <div class="panel-body" style="overflow:auto;text-align:justify;">
                        
                         Tujuan penelitian ini adalah membuat suatu sistem infromasi penilaian akademik siswa kurikulum 2013 untuk membantu proses penilaian akademik siswa pada SDN Tangkil 3 Wlingi Blitar, agar data penilaian siswa disimpan secara terpusat.

                              
                        </div>
                </div>
  </div>
</div>
<br><br><br>        
        <div class="navbar-fixed-bottom footer">
            <?php include "footer.php"; ?>
        </div>
    </div>
    
    
<script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;
 
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(keychar) != -1)
    return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
    
if (key == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}
</script>    
    
</body>
</html>
