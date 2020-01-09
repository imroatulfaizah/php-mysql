<?php 
include "../../koneksi.php";
$tanggal = date('Y-m-d');
$kelas = $_GET['id_kelas'];
$query = mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas='$kelas'");
$data = mysqli_fetch_array($query);
$semester = $_GET['semester'];
$nis = $_GET['nis'];
$query2 = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$nis'");
$data2 = mysqli_fetch_array($query2);
$thn = $_GET['thn'];

$judul = $data2['nama_siswa']."_".$data['nama_kelas']."_".$semester."_".$thn;

header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("content-disposition: attachment;filename=laporan_nilai_$judul($tanggal).xls");

?>

<style type="text/css">

</style>

<table>
						<tr>
                       		<th colspan="24">LAPORAN NILAI SISWA</th>
                       </tr>
                        <tr>
                       		<th></th>
                       </tr>
                        <tr>
                       		<th align="left">NIS</th>
                       		<td><?php 
								 echo ": ".$data2['nis']; ?>
                       		</td>
                       </tr>
                       <tr>
                       		<th align="left">Nama Siswa</th>
                       		<td>
                       			<?php echo ": ".$data2['nama_siswa']?>
                       		</td>
                       </tr>
                       <tr>
                       		<th align="left">Kelas</th>
                       		<td>
                       			<?php echo ": ".$data['nama_kelas']?>
                       		</td>
                       </tr>
                       <tr>
                       		<th align="left">Semester</th>
                       		<td>
                       			<?php echo ": ".$semester ?>
                       		</td>
                       </tr>
                       <tr>
                       		<th align="left">Tahun Ajaran</th>
                       		<td>
                       			<?php echo ": ".$thn ?>
                       		</td>
                       </tr>	
                       <tr>
                       		<th></th>
                       </tr>
</table>

<table style="font-size:12px;" border="1">
                       
                       <tr class="tr-ok">
                          <th colspan="2" >NOMOR</th>
                            <th colspan="3" >ULANGAN</th>
                            <th rowspan="2" >UTS</th>
                            <th rowspan="2" >UAS</th>
                            <th colspan="4" >KETERAMPILAN</th>
                            <th colspan="11" >KOMPETNSI SIKAP</th>
                            <th rowspan="2"  >RATA-RATA</th>
                            <th rowspan="2"  >DISKRIPSI</th>
                            
                        </tr>
                        <tr class="tr-ok">

                            <th >#</th>
                            <th >MATA PELAJARAN</th>
                            <th >1</th>
                            <th >2</th>
                            <th >3</th>

                            <th >Kd1</th>
                            <th >Kd2</th>
                            <th >Kd3</th>
                            <th >Kd4</th>
                            
                            <th ><br>Doa</th>
                            <th ><br>Salam</th>
                            <th ><br>Tadarus</th>
                            <th ><br>Sholat</th>
                            <th ><br>Jujur</th>
                            <th ><br>Disiplin</th>
                            <th ><br>Tg Jwb</th>
                            <th ><br>Toleransi</th>
                            <th ><br>Gt Ryng</th>
                            <th ><br>Santun</th>
                            <th ><br>Prc diri</th>
                                    
                        </tr> 
              <?php  
              $query2 = mysqli_query($koneksi,"SELECT * FROM nilai,siswa WHERE nilai.nis=siswa.nis and nilai.id_kelas='$_GET[id_kelas]' and nilai.semester='$_GET[semester]' and nilai.tahun_ajaran='$_GET[thn]' and nilai.nis = '$nis'");
              $cari = mysqli_num_rows($query2);
              if($cari == 0){
				echo "<tr>
            <td colspan='25' style='border: none;'><center><b>Data Tidak Di Temukan / Anda Belum Diberikan Nilai</a></center><br></td>
                        </tr>";
              }else{
			  $no = 0;
			  $tr = 0;
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
                            </td>
                            <td>
<?php
if($dr['rata2']>=80 and $dr['rata2']<=100){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (A)"; }
else if($dr['rata2']>=70 and $dr['rata2']<80){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (B)"; }
else if($dr['rata2']>=60 and $dr['rata2']<70){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (C)"; }
else if($dr['rata2']>=50 and $dr['rata2']<60){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (D)"; }
else if($dr['rata2']>=0 and $dr['rata2']<50){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (E)"; }
?> 
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
 ?></td>
 							<td>
<?php
if($trr>=80 and $trr<=100){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (A)"; }
else if($trr>=70 and $trr<80){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (B)"; }
else if($trr>=60 and $trr<70){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (C)"; }
else if($trr>=50 and $trr<60){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (D)"; }
else if($trr>=0 and $trr<50){ echo "Ananda $data2[nama_siswa] terus belajar, penjelasan sesuai predikat (E)"; }
?>
                            </td>
                        </tr>
                    <?php } ?>                      
                    </table>