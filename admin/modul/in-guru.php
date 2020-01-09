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
<meta name="description" content="Input Guru | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar">
<meta name="author" content="Malik">
<title>Input Guru | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar</title>
<link href="../../asset/style.css" type="text/css" rel="stylesheet">
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.png" />
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
    <div class="col-md-12">
    <?php
                      if (!empty($_GET['pesan']) && $_GET['pesan'] == 'gagal-input-guru') {
                           echo '<div class="label-eror">
                                NIP Sudah Terdaftar
                                </div>';
                          }
					   if (!empty($_GET['pesan']) && $_GET['pesan'] == 'sukses-input-guru') {
                           echo '<div class="label-sukses">
                                Sukses Input Guru
                                </div>';
                          }
						if (!empty($_GET['pesan']) && $_GET['pesan'] == 'gagal-input-gambar-guru') {
                           echo '<div class="label-eror">
                                Gagal Input Foto Guru
                                </div>';
                          }
						  
						if (!empty($_GET['pesan']) && $_GET['pesan'] == 'gagal-input-gambar-kapasitas-guru') {
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
                
                <div class="panel panel-success">
  					<div class="panel-heading">Input Data Guru Kelas</div>
  						
                        <div class="panel-body">
    						<form action="proses.php" method="post" enctype="multipart/form-data" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">NIP</label>
							<div class="col-sm-9">
								<input type="text" name="nip" maxlength="20" class="form-control" onKeyPress="return goodchars(event,'0123456789',this)" required>
							</div>
                    </div>
                    
                    <div class="form-group">
						<label class="col-sm-2 control-label">Nama Guru Kelas</label>
							<div class="col-sm-9">
								<input type="text" name="nama_guru" maxlength="20" class="form-control" required>
							</div>
                    </div>
                    
                    
                    <div class="form-group">
						<label class="col-sm-2 control-label">Tanggal Lahir</label>
							<div class="col-sm-9">
								<select name="tgl" size="1"  id="tgl" class="input-tgl" required>
  <?php
  for ($i=1;$i<=31;$i++)
  {
  echo "<option  value=".$i.">".$i."</option>";
  }
  ?>
  </select> 
            &nbsp; &nbsp;&nbsp;<select  name="bln" id="bln" class="input-tgl" required>
  <?php
  $bulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
  for ($i=1;$i<=12;$i++)
  {
  echo "<option  value=".$i.">".$bulan[$i]."</option>";
  }
  ?>
  </select>
  &nbsp;&nbsp;&nbsp;&nbsp;<select  name="thn" size="1" id="thn" class="input-tgl" required>
  <?php
  for ($i=1985;$i<=2020;$i++)
  {
  echo "<option  value=".$i.">".$i."</option>";
  }
  ?>
  </select>
							</div>
                    </div>
                       
                <div class="form-group">
						<label class="col-sm-2 control-label">Agama</label>
							<div class="col-sm-9">
								<select name="agama" class="form-control" required>
                    				<option value="Islam">Islam</option>
                        			<option value="Kristen">Kristen</option>
                        			<option value="Budha">Budha</option>
                        			<option value="Hindu">Hindu</option>
                        			<option value="Ateis">Ateis</option>
                    			</select>
							</div>
                    </div>
                
                <div class="form-group">
                	<label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-9">
                    <textarea class="form-control" name="alamat" rows="5" cols="35" required></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="col-sm-2 control-label">Telepon</label>
                    <div class="col-sm-9">
                    <input type="text" name="telp_guru" maxlength="13" class="form-control" onKeyPress="return goodchars(event,'0123456789',this)" required/>
                    </div>
                </div>
                
                <div class="form-group">                	
                	<label class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-9">
                    <input type="file" name="foto" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-9">
                    <select name="id_kelas" class="form-control" required>
                    <option value="">-- Pilih Kelas --</option>
                      <?php $query = mysqli_query($koneksi,"SELECT * FROM kelas");
                        while($data = mysqli_fetch_array($query)){
                      ?>
                        <option value="<?php echo $data['id_kelas']?>"><?php echo $data['nama_kelas']?></option>
                        <?php } ?>
                    </select>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-9">
                    <select name="status" class="form-control" required>
                    	<option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                    </div>
                </div>
                <input type="hidden" name="level" value="guru">
                <div class="form-group">
                	<label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9">
                    <button type="submit" name="in-guru" class="button b-login" style="vertical-align:middle"><span>Input Data </span></button>
                    </div>
                </div>
                
            </form>
                        </div>
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