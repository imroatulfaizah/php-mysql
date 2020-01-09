<?php 
include "../../koneksi.php";
$tanggal = date('d-m-Y');
$kelas = $_GET['id_kelas'];
$query = mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas='$kelas'");
$data = mysqli_fetch_array($query);
$semester = $_GET['semester'];
$nis = $_GET['nis'];
$query2 = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$nis'");
$data2 = mysqli_fetch_array($query2);
$thn = $_GET['thn'];

$qg = mysqli_query($koneksi,"SELECT nama_guru,nip FROM guru_kelas WHERE id_kelas='$kelas'");
$dg = mysqli_fetch_array($qg);

$judul = $data2['nama_siswa']."_".$data['nama_kelas']."_".$semester."_".$thn;

header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("content-disposition: attachment;filename=cetak_rapor_$judul($tanggal).xls");

?>

<style type="text/css">

</style>

<table>
						<tr>
                       		<th colspan="7">RAPOR DAN PROFIL PESERTA DIDIK</th>
                       </tr>
                       <tr>
                       		<th></th>
                       </tr>
						
                       <tr>
                       		<th align="left" colspan="2">Nama</th>
                       		<td>: 
                       			<?php echo $data2['nama_siswa']; ?>
                       		</td>
                            <td>
                            </td>
                            <th align="left">Kelas</th>
                       		<td colspan="2">: 
                       			<?php echo $data['nama_kelas']; ?>
                       		</td>
                       </tr>
                       <tr>
                       		<th align="left" colspan="2">NIS</th>
                       		<td>: <?php 
								 echo $data2['nis']; ?>
                       		</td>
                            <td>
                            </td>
                            <th align="left">Semester</th>
                       		<td colspan="2">: 
                       			<?php echo $semester ?>
                       		</td>
                       </tr>
                       <tr>
                       		<th align="left" colspan="2">Nama Sekolah</th>
                       		<td>: SD NEGERI TANGIL 03 WLINGI BLITAR
                       		</td>
                            <td>
                            </td>
                            <th align="left">Tahun Ajaran</th>
                       		<td colspan="2">: 
                       			<?php echo $thn ?>
                       		</td>
                       </tr>
                       <tr>
                       		<th align="left" colspan="2">Alamat Sekolah</th>
                       		<td colspan="5">: Jalan Wlingi Blitar No.45
                       		</td>
                       </tr>
	
                       <tr>
                       		<th></th>
                       </tr>
                       <tr>
                       		<th align="left" colspan="7">A. SIKAP</th>
                       </tr>
</table>

<?php
$q1 = mysqli_query($koneksi,"SELECT (avg(doa)+avg(salam)+avg(tadarus)+avg(sholat)+avg(toleransi))/5 as ratas FROM nilai WHERE nis = '$nis' and id_kelas='$kelas' and semester='$semester' and tahun_ajaran='$thn'");
$d1 = mysqli_fetch_array($q1);

if($d1['ratas']>=70 and $d1['ratas']<=100){ $s1 = "baik"; }
else if($d1['ratas']>=0 and $d1['ratas']<70){ $s1 = "belum baik"; }

$q2 = mysqli_query($koneksi,"SELECT (avg(jujur)+avg(disiplin)+avg(gt_royong)+avg(santun)+avg(tg_jawab)+avg(percaya_diri))/6 as rataso FROM nilai WHERE nis = '$nis' and id_kelas='$kelas' and semester='$semester' and tahun_ajaran='$thn'");
$d2 = mysqli_fetch_array($q2);

if($d2['rataso']>=70 and $d2['rataso']<=100){ $s2 = "baik"; }
else if($d2['rataso']>=0 and $d2['rataso']<70){ $s2 = "belum baik"; }
?>
<table style="font-size:12px;" border="1">                      
                       <tr>
                            <th colspan="7">DISKRIPSI</th>       
                        </tr>
                        <tr>
                        	<td>
                            1
                            </td>
                            <td>
                            Spiritual
                            </td>
                            <td colspan="5">
                            Ananda <?php echo $data2['nama_siswa']." ".$s1; ?> dalam sikap berperilaku syukur, berdoa sebelum dan sesudah melakukan kegiatan, toleransi beragama, dan sudah mampu meningkatkan sikap taat beribadah, 								
                            </td>                            
                        </tr>
                        <tr>
                        	<td>
                            2
                            </td>
                            <td>
                            Sosial
                            </td>
                            <td colspan="5">
                            Ananda <?php echo $data2['nama_siswa']." ".$s2; ?> dalam sikap jujur, disiplin, tanggungjawab, santun, peduli, percaya diri, 								
                            </td>                            
                        </tr>                        
</table>
                        
<table border="0">
						<tr>
                       		<th></th>
                       </tr>
                       <tr>
                       		<th align="left" colspan="7">B. PENGETAHUAN DAN KETERAMPILAN</th>
                       </tr>
</table>

<table style="font-size:12px;" border="1">
                       
                       <tr class="tr-ok">
                            <th rowspan="2">NO</th>
                            <th rowspan="2" colspan="2">MATA PELAJARAN</th>
                            <th colspan="2">PENGETAHUAN</th>
                            <th colspan="2">KETERAMPILAN</th> 
                        </tr> 
                        <tr>
                        	<th>NILAI</th>
                            <th>PREDIKAT</th>
                            <th>NILAI</th>
                            <th>PREDIKAT</th>
                        </tr>
              <?php  
              $query2 = mysqli_query($koneksi,"SELECT * FROM nilai WHERE nis = '$nis' and id_kelas='$kelas' and semester='$semester' and tahun_ajaran='$thn'");
              $cari = mysqli_num_rows($query2);
              if($cari == 0){
				echo "<tr>
            <td colspan='7' style='border: none;'><center><b>Data Tidak Di Temukan / Anda Belum Diberikan Nilai</a></center><br></td>
                        </tr>";
              }else{
			  $no = 0;
			  $tr = 0;
              while($dmp = mysqli_fetch_array($query2)){
				$no++;
                        $query4 = mysqli_query($koneksi,"SELECT * FROM mapel WHERE id_mapel='$dmp[id_mapel]'");
                        $data4 = mysqli_fetch_array($query4);
                       ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td colspan="2"><?php echo $data4['nama_mapel']; ?></td>
                            <td>
<?php
$sr = mysqli_query($koneksi,"SELECT (ulangan_1+ulangan_2+ulangan_3+uts+uas)/5 as rata2 FROM nilai WHERE id_nilai = '$dmp[id_nilai]'");
$dr = mysqli_fetch_array($sr);
	echo "<font color='#009933'>".number_format($dr['rata2'],1,",",".")."</font>";
?>
                            </td>
                            <td>
<?php
if($dr['rata2']>=80 and $dr['rata2']<=100){ echo "<font color='#FF6600'> (A) </font>"; }
else if($dr['rata2']>=70 and $dr['rata2']<80){ echo "<font color='#FF6600'> (B) </font>"; }
else if($dr['rata2']>=60 and $dr['rata2']<70){ echo "<font color='#FF6600'> (C) </font>"; }
else if($dr['rata2']>=50 and $dr['rata2']<60){ echo "<font color='#FF6600'> (D) </font>"; }
else if($dr['rata2']>=0 and $dr['rata2']<50){ echo "<font color='#FF6600'> (E) </font>"; }
?>                           
                            </td>
                            <td>
<?php
$sr2 = mysqli_query($koneksi,"SELECT (kd_1+kd_2+kd_3+kd_4)/4 as rata2k FROM nilai WHERE id_nilai = '$dmp[id_nilai]'");
$dr2 = mysqli_fetch_array($sr2);
	echo "<font color='#009933'>".number_format($dr2['rata2k'],1,",",".")."</font>";
?>
                            </td>
                            <td>
<?php
if($dr2['rata2k']>=80 and $dr2['rata2k']<=100){ echo "<font color='#FF6600'> (A) </font>"; }
else if($dr2['rata2k']>=70 and $dr2['rata2k']<80){ echo "<font color='#FF6600'> (B) </font>"; }
else if($dr2['rata2k']>=60 and $dr2['rata2k']<70){ echo "<font color='#FF6600'> (C) </font>"; }
else if($dr2['rata2k']>=50 and $dr2['rata2k']<60){ echo "<font color='#FF6600'> (D) </font>"; }
else if($dr2['rata2k']>=0 and $dr2['rata2k']<50){ echo "<font color='#FF6600'> (E) </font>"; }
?>                           
                            </td>                            
                        </tr>
                    <?php } ?> 
                    	
                    <?php } ?> 
                    	<tr>
                       		<th colspan="7"></th>
                       </tr>                     
                    </table>
                    
<table style="font-size:12px;" border="1">
                        
                        <tr>
                        	<th>No</th>
                            <th>Ekstrakurikuler</th>
                            <th colspan="5">Keterangan</th>
                        </tr>
                        <tr>
                        	<td>
                            1
                            </td>
                            <td>
                            </td>
                            <td colspan="5">
                            			
                            </td>                            
                        </tr>
                        <tr>
                        	<td>
                            2
                            </td>
                            <td>
                            </td>
                            <td colspan="5">								
                            </td>                            
                        </tr> 
                        <tr>
                        	<td>
                            3
                            </td>
                            <td>
                            </td>
                            <td colspan="5">								
                            </td>                            
                        </tr>
                        <tr>
                        	<td>
                            4
                            </td>
                            <td>
                            </td>
                            <td colspan="5">								
                            </td>                            
                        </tr>                       
</table>

<table border="0">
						<tr>
                       		<th></th>
                       </tr>
                       <tr>
                       		<td></td>
                       		<td colspan="2" align="center">Mengetahui</td>
                            <td colspan="4" align="center">Blitar, <?php echo $tanggal; ?></td>
                       </tr>
                       <tr>
                       		<td></td>
                       		<td colspan="2" align="center">Orang Tua/Wali Murid</td>
                            <td colspan="4" align="center">Guru <?php echo $data['nama_kelas']; ?></td>
                       </tr>
                       <tr>
                       		<th></th>
                       </tr>
                       <tr>
                       		<th></th>
                       </tr>
                       <tr>
                       		<th></th>
                       </tr>
                       <tr>
                       		<td></td>
                       		<td colspan="2" align="center">_____________</td>
                            <td colspan="4" align="center"><u><?php echo $dg['nama_guru']; ?></u></td>
                       </tr>
                       <tr>
                       		<td></td>
                       		<td colspan="2" align="center"></td>
                            <td colspan="4" align="center">NIP. <?php echo $dg['nip']; ?></td>
                       </tr>
</table>