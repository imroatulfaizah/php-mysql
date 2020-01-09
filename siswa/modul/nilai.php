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
<meta name="description" content="Nilai Siswa | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar">
<meta name="author" content="Malik">
<title>Nilai Siswa | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar</title>
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
        
        <div class="panel panel-primary">
            <div class="panel-heading">Laporan Nilai Siswa</div>
                    
              
                        <div class="panel-body" >
    				<form action="nilai.php" method="GET" enctype="multipart/form-data" class="form-horizontal">
                    
					<div class="form-group">
            <label class="col-sm-2 control-label">Kelas</label>
                             
              <div class="col-sm-2">
                <select name="id_kelas" class="form-control" required>
                                <option value="">-- Pilih Kelas --</option>
                                  <?php 
                                       $query = mysqli_query($koneksi,"SELECT * FROM kelas");
                                        while($data = mysqli_fetch_array($query)){
                      
                                    ?>

                                      <?php if(isset($_GET['cari'])){ 
                                        $kelas1 = $_GET['id_kelas'];
                    
                                      ?>
                                            
                                      <option value="<?php echo $data['id_kelas']?>" <?php if($data['id_kelas'] == $kelas1){echo 'selected';}?>><?php echo $data['nama_kelas'];?></option>
                                            
                                      <?php } else {?>

                                      <option value="<?php echo $data['id_kelas']?>"><?php echo $data['nama_kelas'];?></option><?php } } ?>
                                    
                                </select>
                  </div>
                            
                            <label class="col-sm-1 control-label">Semester</label>
                            <div class="col-sm-2">
								<select name="semester" class="form-control" required="">
                                
                                <option value="">-- Pilih Semester --</option>
                                <?php if(isset($_GET['cari'])){ 
										$semester = $_GET['semester'];
										?>
                                        <option value="Ganjil" <?php if($semester == 'Ganjil'){echo 'selected';}?>>Ganjil</option>
                                        <option value="Genap" <?php if($semester == 'Genap'){echo 'selected';}?>>Genap</option>
                                        <?php } else {?>
                                    	<option value="Ganjil">Ganjil</option>
                                        <option value="Genap">Genap</option>
                                        <?php } ?>
                                </select>
                                
							</div>       
                            
                    <label class="col-sm-1 control-label">Tahun Ajaran</label>
                    <div class="col-sm-2">
                    		<select name="thn" class="form-control" required >
                            <option value="">-- Pilih Tahun --</option>
                <option value="2017" <?php if($_GET['thn'] == '2017'){echo 'selected';}?> >2017</option>
                <option value="2018" <?php if($_GET['thn'] == '2018'){echo 'selected';}?> >2018</option>
                <option value="2019" <?php if($_GET['thn'] == '2019'){echo 'selected';}?> >2019</option>
                <option value="2020" <?php if($_GET['thn'] == '2020'){echo 'selected';}?> >2020</option>
                             </select>
							</div>
                <button type="submit" name="cari" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-search"></span> Proses</button>
                            </div>
                            
                    </form> 
                    
                    <div class="alert alert-danger">
                    <b>Keterangan :</b> Pilih Semester & Tahun Ajaran terlebih dahulu untuk melihat nilai siswa.
                    </div>       
                          
					<?php if(isset($_GET['cari'])){ 
						$query2 = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$_SESSION[nis]'");
                        $data2 = mysqli_fetch_array($query2);
						$query5 = mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas='$data2[id_kelas]'");
                        $data5 = mysqli_fetch_array($query5);
						
						echo "<b>NIS : ".$data2['nis']."<br>";
						echo "Nama Siswa : ".$data2['nama_siswa']."<br>";
						echo $data5['nama_kelas']." | Semester ".$data2['semester']." | Tahun Ajaran ".$_GET['thn']."<br><br>";
					?>
                    
                      <table style="font-size:12px;" class="table table-bordered">
                       <tr>
                          <th colspan="2">NOMOR</th>
                            <th colspan="3">ULANGAN</th>
                            <th rowspan="2">UTS</th>
                            <th rowspan="2">UAS</th>
                            <th colspan="4">KETERAMPILAN</th>
                            <th colspan="11">KOMPETNSI SIKAP</th>
                            <th rowspan="2"  >RATA-RATA</th>
                            
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>MATA PELAJARAN</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>

                            <th>Kd1</th>
                            <th>Kd2</th>
                            <th>Kd3</th>
                            <th>Kd4</th>
                            
                            <th class="miring" height="70px;" ><br>Doa</th>
                            <th class="miring" height="70px;" ><br>Salam</th>
                            <th class="miring" height="70px;"  ><br>Tadarus</th>
                            <th class="miring" height="70px;"  ><br>Sholat</th>
                            <th class="miring" height="70px;"  ><br>Jujur</th>
                            <th class="miring" height="70px;"  ><br>Disiplin</th>
                            <th class="miring" height="70px;"  ><br>Tg Jwb</th>
                            <th class="miring" height="70px;"  ><br>Toleransi</th>
                            <th class="miring" height="70px;"  ><br>Gt Ryng</th>
                            <th class="miring" height="70px;"  ><br>Santun</th>
                            <th class="miring" height="70px;"  ><br>Prc diri</th>    
                        </tr> 
 <?php 
              $query2 = mysqli_query($koneksi,"SELECT * FROM nilai WHERE nis = '$data2[nis]' and id_kelas='$_GET[id_kelas]' and semester='$_GET[semester]' and tahun_ajaran='$_GET[thn]' ");
              $cari = mysqli_num_rows($query2);
              if($cari == 0){
				echo "<tr>
            <td colspan='24' style='border: none;'><center><b>Data Tidak Di Temukan / Anda Belum Diberikan Nilai</a></center><br></td>
                        </tr>";
              }else{
			  $no = 0;
              while($data = mysqli_fetch_array($query2)){
				$no++;
                        $query4 = mysqli_query($koneksi,"SELECT * FROM mapel WHERE id_mapel='$data[id_mapel]'");
                        $data4 = mysqli_fetch_array($query4);
                       ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $data4['nama_mapel']; ?></td>
                            <td><?php echo $data['ulangan_1'];?></td>
                            <td><?php echo $data['ulangan_2']?></td>
                            <td><?php echo $data['ulangan_3']?></td>

                            <td><?php echo $data['uts']?></td>
                            <td><?php echo $data['uas']?></td>
                            <td><?php echo $data['kd_1']?></td></td>
                            <td><?php echo $data['kd_2']?></td></td>
                            
                            <td><?php echo $data['kd_3']?></td>
                            <td><?php echo $data['kd_4']?></td>
                            <td><?php echo $data['doa']?></td>
                            <td><?php echo $data['salam']?></td>
                            <td><?php echo $data['tadarus']?></td>
                            <td><?php echo $data['sholat']?></td>
                            <td><?php echo $data['jujur']?></td>
                            <td><?php echo $data['disiplin']?></td>
                            <td><?php echo $data['tg_jawab']?></td>
                            <td><?php echo $data['toleransi']?></td>
                            <td><?php echo $data['gt_royong']?></td>
                            <td><?php echo $data['santun']?></td>
                            <td><?php echo $data['percaya_diri']?></td>
                            <td>
<?php
$sr = mysqli_query($koneksi,"SELECT (ulangan_1+ulangan_2+ulangan_3+uts+uas+kd_1+kd_2+kd_3+kd_4+doa+salam+tadarus+sholat+jujur+disiplin+tg_jawab+
toleransi+gt_royong+santun+percaya_diri)/20 as rata2 FROM nilai WHERE id_nilai = '$data[id_nilai]'");
$dr = mysqli_fetch_array($sr);
$tr = $dr['rata2'] + $tr;
	echo "<font color='#009933'>".number_format($dr['rata2'],0)."</font>";
if($dr['rata2']>=80 and $dr['rata2']<=100){ echo "<font color='#FF6600'> (A) </font>"; }
else if($dr['rata2']>=70 and $dr['rata2']<80){ echo "<font color='#FF6600'> (B) </font>"; }
else if($dr['rata2']>=60 and $dr['rata2']<70){ echo "<font color='#FF6600'> (C) </font>"; }
else if($dr['rata2']>=50 and $dr['rata2']<60){ echo "<font color='#FF6600'> (D) </font>"; }
else if($dr['rata2']>=0 and $dr['rata2']<50){ echo "<font color='#FF6600'> (E) </font>"; }
?>
<a href="#modald<?php echo $data['id_nilai']; ?>" data-toggle="modal">diskripsi</a>

<!-- Modal Popup untuk catatan--> 
<div class="modal fade" id="modald<?php echo $data['id_nilai']; ?>">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">DISKRIPSI</h4>
      </div>
      <div class="modal-body">
<?php
if($dr['rata2']>=80 and $dr['rata2']<=100){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (A)"; }
else if($dr['rata2']>=70 and $dr['rata2']<80){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (B)"; }
else if($dr['rata2']>=60 and $dr['rata2']<70){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (C)"; }
else if($dr['rata2']>=50 and $dr['rata2']<60){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (D)"; }
else if($dr['rata2']>=0 and $dr['rata2']<50){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (E)"; }
?> 
      </div>   
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
      </div>
    </div>
  </div>
</div>
                            </td>
                            
                        </tr>
                    <?php } ?> 
                    	<tr>
                        	<th colspan="22">TOTAL RATA-RATA</th>
                            <td><?php $trr = $tr /$no; 
							echo "<font color='#009933'>".number_format($trr,0)."</font>";
if($trr>=80 and $trr<=100){ echo "<font color='#FF6600'> (A) </font>"; }
else if($trr>=70 and $trr<80){ echo "<font color='#FF6600'> (B) </font>"; }
else if($trr>=60 and $trr<70){ echo "<font color='#FF6600'> (C) </font>"; }
else if($trr>=50 and $trr<60){ echo "<font color='#FF6600'> (D) </font>"; }
else if($trr>=0 and $trr<50){ echo "<font color='#FF6600'> (E) </font>"; }
 ?>
 <a href="#modalrt<?php echo $data2['nis']; ?>" data-toggle="modal">diskripsi</a>

<!-- Modal Popup untuk catatan--> 
<div class="modal fade" id="modalrt<?php echo $data2['nis']; ?>">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">DISKRIPSI</h4>
      </div>
      <div class="modal-body">
<?php
if($trr>=80 and $trr<=100){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (A)"; }
else if($trr>=70 and $trr<80){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (B)"; }
else if($trr>=60 and $trr<70){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (C)"; }
else if($trr>=50 and $trr<60){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (D)"; }
else if($trr>=0 and $trr<50){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (E)"; }
?> 
      </div>   
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
      </div>
    </div>
  </div>
</div>
 </td>
                        </tr>
                        <tr><td colspan="24"><a class="btn btn-sm btn-info" href="nilai-excel.php?id_kelas=<?php echo $data2['id_kelas']; ?>&semester=<?php echo $semester; ?>&cari=&nis=<?php echo $data2['nis']?>&thn=<?php echo $_GET['thn']?>">Export To Excel</a></td></tr>
                    <?php } ?>                      
                    </table>
                    <?php } ?>
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
