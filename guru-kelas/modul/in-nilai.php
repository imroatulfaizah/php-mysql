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
<meta name="description" content="Input Nilai | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar">
<meta name="author" content="Malik">
<title>Input Nilai | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar</title>
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
<div class="container" style="margin-top:70px; width:95%;">
  <div class="row">
    <div class="" >
    <?php
                      if (!empty($_GET['pesan']) && $_GET['pesan'] == 'gagal-input-nilai') {
                           echo '<div class="label-eror">
                                Gagal Input Nilai
                                </div>';
                          }
					   if (!empty($_GET['pesan']) && $_GET['pesan'] == 'sukses-input-nilai') {
                           echo '<div class="label-sukses">
                                Sukses Input Nilai
                                </div>';
                          }	  
				?>
                
                <div class="panel panel-success">
  					<div class="panel-heading">Input Data Nilai</div>

                        <div class="panel-body" >
    				<form action="in-nilai.php" method="GET" enctype="multipart/form-data" class="form-horizontal">
                    
					<div class="form-group">
						<label class="col-sm-2 control-label">Kelas</label>	 	
							<div class="col-sm-2">
                                	<?php 
										$qk = mysqli_query($koneksi,"SELECT * FROM guru_kelas,kelas where guru_kelas.id_kelas=kelas.id_kelas and 
										guru_kelas.nip='$_SESSION[nip]' and kelas.id_kelas='$_SESSION[id_kelas]'");
										$dk = mysqli_fetch_array($qk);		
									?>
                              <input type="text" class="form-control" name="id_kelas" value=<?php echo $dk['id_kelas']; ?> readonly>      
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
                    </div>

            	<div class="form-group">
                	<label class="col-sm-2 control-label">Mata Pelajaran</label>
                    <div class="col-sm-2">
								<select name="id_mapel" class="form-control" required="">
                                <option value="">-- Pilih Mapel --</option>
                                	<?php 
										$query = mysqli_query($koneksi,"SELECT * FROM mapel_detail,mapel WHERE mapel.id_mapel=mapel_detail.id_mapel and mapel_detail.id_kelas= '".$_SESSION['id_kelas']."'");
										while($data2 = mysqli_fetch_array($query)){			
									?>
                                    	<?php if(isset($_GET['cari'])){ 
                                        $id_mapel = $_GET['id_mapel'];
                                      ?>                             
                                      <option value="<?php echo $data2['id_mapel']?>" <?php if($data2['id_mapel'] == $id_mapel){echo 'selected';}?>><?php echo $data2['nama_mapel'];?></option>                                        
                                      <?php } else {?>
                                     <option value="<?php echo $data2['id_mapel']?>"><?php echo $data2['nama_mapel'];?></option><?php } } ?>
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
                    <b>Keterangan :</b><br> 1. Pilih Mata Pelajaran, Semester & Tahun Ajaran terlebih dahulu untuk melakukan input nilai.<br>
                    2. Nilai Minimal berdasarkan Kurikulum 2013 adalah 75.
                 </div>
                
                <?php if(isset($_GET['cari'])){ ?>
                	<form action="proses.php" enctype="multipart/form-data" method="POST">
                    <div class="col-md-12" style="overflow:auto;">
                	<table style="font-size:12px;" class="table table-bordered">
						<tr>
                        	<th colspan="3">NOMOR</th>
                            <th colspan="3">ULANGAN</th>
                            <th rowspan="2">UTS</th>
                            <th rowspan="2">UAS</th>
                            <th colspan="4">KETERAMPILAN</th>
                            <th colspan="11">KOMPETNSI SIKAP</th>
                        </tr>
                        <tr>
                        	<th>#</th>
                            <th>NIS</th>
                            <th>NAMA SISWA</th>
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
                         <input type="hidden" name="id_kelas" value="<?php echo $_GET['id_kelas']?>">
                            <input type="hidden" name="semester" value="<?php echo $_GET['semester']?>">
                            <input type="hidden" name="id_mapel" value="<?php echo $_GET['id_mapel']?>">
                            <input type="hidden" name="thn" value="<?php echo $_GET['thn']?>">
                        <?php 
								$no = 1;
								$kelas = $_GET['id_kelas'];
								$semester = $_GET['semester'];
								$mapel =  $_GET['id_mapel'];
								$thn = $_GET['thn'];

$sql = mysqli_query($koneksi,"SELECT * FROM siswa WHERE (id_kelas LIKE '$kelas' AND semester LIKE '$semester' AND tahun_ajaran='$thn')
		AND status = 'Pelajar'");
$count1=mysqli_num_rows($sql);
                        if($count1==0){
                                echo "<tr>
                              <td colspan='23' style='border: none;'><center><b>Data Tidak Di Temukan / Tidak Sesuai</a></center><br></td>
                        </tr>";
                        }else {
                            while ($data3 = mysqli_fetch_array($sql)){	
							
							$sql2 = mysqli_query($koneksi,"SELECT * FROM nilai WHERE id_kelas LIKE '$kelas' AND semester LIKE'$semester' AND id_mapel LIKE '$id_mapel' AND tahun_ajaran LIKE '$thn' and nis like '".$data3['nis']."'");
							$data4 = mysqli_fetch_array($sql2)
						?>
                        <tr>
                        	<td><?php echo $no++;?></td>
                            <input type="hidden" name="nis[]" value="<?php echo $data3['nis']?>">
                            
                            <td><?php echo $data3['nis']; ?></td>
                            <td><?php echo $data3['nama_siswa']; ?></td>
                            <td><input type="text" value="<?php echo $data4['ulangan_1']?>" name="ulangan_1[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="ulangan_1[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['ulangan_2']?>" name="ulangan_2[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="ulangan_2[]"   ></td>
                            <td><input type="text" value="<?php echo $data4['ulangan_3']?>" name="ulangan_3[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="ulangan_3[]"   ></td>

                            <td><input type="text" value="<?php echo $data4['uts']?>" name="uts[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="uts[]"   ></td>
                            <td><input type="text" value="<?php echo $data4['uas']?>" name="uas[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="uas[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['kd_1']?>" name="kd_1[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="kd_1[]"  ></td></td>
                            <td><input type="text" value="<?php echo $data4['kd_2']?>" name="kd_2[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="ulangan_2[]"  ></td></td>
                            
                            <td><input type="text" value="<?php echo $data4['kd_3']?>" name="kd_3[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="ulangan_3[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['kd_4']?>" name="kd_4[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="ulangan_4[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['doa']?>" name="doa[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="doa[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['salam']?>" name="salam[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="salam[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['tadarus']?>" name="tadarus[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="tadarus[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['sholat']?>" name="sholat[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="sholat1[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['jujur']?>" name="jujur[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="jujur[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['disiplin']?>" name="disiplin[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="disiplin[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['tg_jawab']?>" name="tg_jawab[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="tg_jawab[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['toleransi']?>" name="toleransi[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="toleransi[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['gt_royong']?>" name="gt_royong[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="gt_royong[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['santun']?>" name="santun[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="santun[]"  ></td>
                            <td><input type="text" value="<?php echo $data4['percaya_diri']?>" name="percaya_diri[]" class="input-nilai" maxlength="4" onKeyPress="return goodchars(event,'0123456789',this)" data-toggle="tooltip" data-placement="bottom" title="Input Nilai"  id="percaya_diri[]"  ></td>
                            
                        </tr>
                         <?php } ?><tr><td colspan="23"><button type="submit" name="in-nilai" class="btn btn-primary btn-sm" style="vertical-align:middle;"><span>Simpan Nilai </span></button><br></td></tr> 
                         <?php } ?>
                                         
                    </table>
                    
                    </div>
                    
                        </div>
                        </form>
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

<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>  
    
</body>
</html>
