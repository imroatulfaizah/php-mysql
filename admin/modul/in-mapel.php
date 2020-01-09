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
<meta name="description" content="Input Mata Pelajaran | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar">
<meta name="author" content="Malik">
<title>Input Mata pelajaran | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar</title>
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
                      if (!empty($_GET['pesan']) && $_GET['pesan'] == 'gagal-input-mapel') {
                           echo '<div class="label-eror">
                                Mata Pelajaran Sudah Terdaftar
                                </div>';
                          }
					   if (!empty($_GET['pesan']) && $_GET['pesan'] == 'sukses-input-mapel') {
                           echo '<div class="label-sukses">
                                Sukses Input Mata Pelajaran
                                </div>';
                          }
 	  
				?>
                
                <div class="panel panel-success">
  					<div class="panel-heading">Input Data Mata Pelajaran</div>
  						
                        <div class="panel-body">
    						<form action="proses.php" method="post" enctype="multipart/form-data" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Mata Pelajaran</label>
							<div class="col-sm-9">
								<input type="text" name="nama_mapel" class="form-control" required>
							</div>
                    </div>
                    
                    <div class="form-group">
						<label class="col-sm-2 control-label"></label>
							<div class="col-sm-9">
                    <table class="table table-bordered" width="100%">
            <thead>
            	<tr>
                <th width="50%">Kelas</th>
                <th width="10%">Pilih ( &radic; )</th>
            	</tr>
            </thead>
            <?php

			$query = mysqli_query($koneksi,"SELECT * FROM kelas");
			while($data = mysqli_fetch_array($query)){
				?>
             	<tr>
                <td><?php echo $data['nama_kelas']; ?></td>
                <td><input class="input" type="checkbox" name="kel[]" value="<?php echo $data['id_kelas'] ?>" />
                </td>
                </tr>
            <?php } ?>
			</table>
            </div>
            </div>
                
                <div class="form-group">
                	<label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9">
                    <button type="submit" name="in-mapel" class="button b-login" style="vertical-align:middle"><span>Input Data </span></button>
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