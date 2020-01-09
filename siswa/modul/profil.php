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
<meta name="description" content="Profil | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar">
<meta name="author" content="Malik">
<title>Profil | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar</title>
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.png" />
<link href="../../asset/style.css" type="text/css" rel="stylesheet">
<!-- Bootstrap Core CSS -->
<link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery Version 1.11.1 -->
<script src="../../asset/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../../asset/js/bootstrap.min.js"></script>

  <!-- Gambar Saat Di Klik Besar -->
    <script src="../../asset/source/jquery.fancybox.js" type="text/javascript"></script>
    <link href="../../asset/source/jquery.fancybox.css" type="text/css" rel="stylesheet" media="screen">
    
    <!-- Selector -->
    <script type="text/javascript">
    $(document).ready(function(){
      $(".perbesar").fancybox();
      });
  </script>
  <style type="text/css">
    .fileUpload {
    position: relative;
    overflow: hidden;
    }
    .fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
    }


  </style>
</head>

<body>
	<?php include "header.php"; ?>

    <div class="container" style="margin-top:70px;">

  <div class="row">
 <?php 
$query = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis = '$_SESSION[nis]'");
$data = mysqli_fetch_array($query);
list($tahun,$bulan,$tanggal) = explode('-',$data['tgl_lahir']);

 ?>
    <div class="col-md-3">
                <form action="proses.php" method="post" enctype="multipart/form-data">
                <div class="panel panel-info">
                    <div class="panel-heading">Foto Profil</div>
                        
                        <div class="panel-body" style="overflow:auto;">

                        <?php 
                        if (!empty($_GET['pesan']) && $_GET['pesan'] == 'sukses-edit-foto') {
                           echo '<div class="label-sukses">
                                Sukses Edit Foto
                                </div>';
                          }  
              
            if (!empty($_GET['pesan']) && $_GET['pesan'] == 'gagal-input-gambar-siswa') {
                           echo '<div class="label-eror">
                                Gagal Edit Foto Siswa
                                </div>';
                          }
              
            if (!empty($_GET['pesan']) && $_GET['pesan'] == 'gagal-input-gambar-kapasitas-siswa') {
                           echo '<div class="label-eror">
                                Gambar Tidak Boleh Lebih Dari 2 MB
                                </div>';
                          }
            if (!empty($_GET['pesan']) && $_GET['pesan'] == 'gagal-input-gambar-salah-guru') {
                           echo '<div class="label-eror">
                                Gambar Harus JPG / JPEG / PNG
                                </div>';
                          }       
                        ?>  

                        <input type="hidden" name="nis" value="<?php echo $data['nis']?>"><!-- Id Foto -->
                          <center><a href="<?php echo $data['foto'] ?>" class="perbesar "><img src="<?php echo $data['foto'] ?>" width="160px" height="160px" class="img-circle"></a></center>
                          <br>
                          <div class="form-group">
                    <div class="fileUpload btn btn-primary col-md-12">
                        <span><i class="glyphicon glyphicon-folder-open control-label"></i> &nbsp;Ubah Gambar</span>
                        <input id="uploadBtn" type="file" class="upload" name="foto" accept="image/*"/>
                    </div>           
                      <input id="uploadFile" placeholder="Nama File" disabled onChange="rubah()" class="form-control"/>
                </div> 
                  <button type="submit" name="edit-foto-siswa" class="btn btn-danger form-control">Proses Rubah</button>
           
                        </div>
                        <div class="panel-footer"><p style="background:#B97628;width:100%;padding:10px;text-align:center;color:#fff;font-size:20px;border-radius:5px;"><?php echo $_SESSION['nama_siswa']?></p></div>
                </div>
                </form>
    </div>  

    <div class="col-md-9">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Keterangan Profil</div>
                        
                        <div class="panel-body" style="overflow:auto;">
                        <?php 
                        if (!empty($_GET['pesan']) && $_GET['pesan'] == 'sukses-edit-profil') {
                           echo '<div class="label-sukses">
                                Sukses Edit Profil
                                </div>';
                          }  

                        ?>
                        
                         <form class="form-horizontal" method="post" action="proses.php" enctype="multipart/form-data">
                         <input type="hidden" name="nis" value="<?php echo $data['nis'] ?>">
                              <div class="form-group">
                                <label class="col-sm-2 control-label">NIS</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputEmail3" placeholder="NIS" name="nis1" value="<?php echo $data['nis']?>" disabled>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Nama Siswa</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa" name="nama_siswa" value="<?php echo $data['nama_siswa']?>">
                                </div> 
                              </div>

                              <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                
                    <div class="col-sm-2">
            <select name="tgl" size="1" id="tgl" class="form-control">
                <?php
             for ($i=1;$i<=31;$i++)
             {
                if($tanggal==$i) {
                    echo "<option value=".$i." selected>".$i."</option>";
                } else {
                    echo "<option value=".$i.">".$i."</option>";
                }
             }
          ?>
              </select>
              </div>
              
              <div class="col-sm-3">
             <select name="bln" size="1" id="bln" class="form-control" >
                <?php
             $namabulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
             for ($i=1;$i<=12;$i++)
             {
                if($bulan==$i) {
                    echo "<option value=".$i." selected>".$namabulan[$i]."</option>";
                } else {
                    echo "<option value=".$i.">".$namabulan[$i]."</option>";
                }
             }
          ?>
              </select>
              </div>
              <div class="col-sm-2">
              <select name="thn" size="1" id="thn" class="form-control" >
                <?php
              echo "<option value=".$tahun.">".$tahun."</option>";
             for ($i=1985;$i<=2020;$i++)
             {
                if($tahun==$i) {
                    echo "<option value=".$i." selected>".$i."</option>";
                } else {
                    echo "<option value=".$i.">".$i."</option>";
                }
             }
          ?>
              </select>
              
                                </div> 
                              </div>

                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Agama</label>
                                <div class="col-sm-10">
                                  <select name="agama" class="form-control">
                <option value="Islam" <?php if($data['agama'] == 'Islam'){echo 'selected';}?> >Islam</option>
                <option value="Kristen" <?php if($data['agama'] == 'Kristen'){echo 'selected';}?> >Kristen</option>
                <option value="Budha" <?php if($data['agama'] == 'Budha'){echo 'selected';}?> >Budha</option>
                <option value="Hindu" <?php if($data['agama'] == 'Hindu'){echo 'selected';}?> >Hindu</option>
                <option value="Ateis" <?php if($data['agama'] == 'Ateis'){echo 'selected';}?> >Ateis</option>
              </select>
                                </div> 
                              </div>


                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-10">
                                  <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $data['alamat']?></textarea>
                                </div> 
                              </div>

                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Telepon</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputPassword3" placeholder="Telepon Siswa" name="telp_siswa" value="<?php echo $data['telp_siswa']?>">
                                </div> 
                              </div>

                              <div class="form-group">
                                <label for="st" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="st" placeholder="Status" name="status" value="<?php echo $data['status']?>" disabled>
                                </div> 
                              </div>
                              
                              <div class="form-group">
                  <label class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
          		  <select name="id_kelas" class="form-control" disabled>
              			<?php $query1 = mysqli_query($koneksi,"SELECT * FROM kelas");
                		while($data1 = mysqli_fetch_array($query1)){
              			?>
                	<option value="<?php echo $data1['id_kelas'] ?>" <?php if($data1['id_kelas'] == $data['id_kelas']){echo 'selected';}?> ><?php echo $data1['nama_kelas']?></option>
                		<?php } ?>
              	   </select>  
                	</div>
                    </div>
                    
                    <div class="form-group">
                                <label for="sn" class="col-sm-2 control-label">Semester</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="sm" placeholder="Semester" name="semester" value="<?php echo $data['semester']?>" disabled>
                                </div> 
                    </div>
                              
                    <div class="form-group">
                                <label for="thn" class="col-sm-2 control-label">Tahun Ajaran</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="thn2" placeholder="Tahun" name="thn2" value="<?php echo $data['tahun_ajaran']?>" disabled>
                                </div> 
                    </div>
                    
                    <div class="form-group">
                                <label for="thn" class="col-sm-2 control-label">Tahun Angkatan</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="thn1" placeholder="Tahun" name="thn1" value="<?php echo $data['tahun_angkatan']?>" disabled>
                                </div> 
                    </div>
                              
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" class="btn btn-primary" name="edit-profil-siswa">Edit Profil</button>
                                </div>
                              </div>
                          </form>
           
                        </div>
                </div>
  </div>
</div> 
<br><br><br>            
            
        
        <div class="navbar-fixed-bottom footer">
            <?php include "footer.php"; ?>
        </div>
    </div>

<script>
    document.getElementById("uploadBtn").onchange = function rubah() {
    document.getElementById("uploadFile").value = this.value;
    };
  </script>     
    
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
