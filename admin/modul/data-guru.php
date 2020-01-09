<?php
include "sesion.php";
include "../../koneksi.php";
include "../../page/page-config.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Data Guru | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar">
<meta name="author" content="Malik">
<title>Data Guru | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar</title>
<link href="../../asset/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.png" />
<!-- Bootstrap Core CSS -->
<link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery Version 1.11.1 -->
<script src="../../asset/js/jquery.js"></script>
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

						if (!empty($_GET['pesan']) && $_GET['pesan'] == 'hapus-guru') {
                           echo '<div class="label-sukses">
                                Sukses Hapus Guru
                                </div>';
                          }

						if (!empty($_GET['pesan']) && $_GET['pesan'] == 'sukses-edit-guru') {
                           echo '<div class="label-sukses">
                                Sukses Edit Guru
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

                <div class="panel panel-primary">
  					<div class="panel-heading">Data Guru Kelas</div>

                        <div class="panel-body" style="overflow:auto;">
                          <form action="data-guru.php" method="get">
                         <div class="col-md-2">

                        <a href="in-guru.php" class="btn btn-warning waves-effect">Tambah Guru Kelas</a>
                         </div>
                         <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <span class='glyphicon glyphicon-search' ></span>
                                            </span>
                                            <div class="form-line">
                                                <input class="form-control" size="10" type="text" placeholder="Pencarian Guru Kelas" required name="pencarian">
                                            </div>
                                                                                    
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary btn-sm waves-effect" name="cari">Cari</button> || <a href="data-guru.php" class="btn btn-success btn-sm waves-effect">Tampilkan Data Keseluruhan</a>
                                    </div>

                          </form>
                          <br>
                          <br>

    		<table class="table table-bordered table-hover table-responsive" id="mydata" width="100%">
            	<thead>
               <tr>
                  <th>No</th>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Kelas</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>

              </thead>

                <?php

                if(isset($_GET['cari'])){
                  $namabulan = array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                $hsl = $_GET['pencarian'];
                $no = 1;
                $sql = "SELECT * FROM guru_kelas where nip like '%$hsl%' or nama_guru like '%$hsl%' order by id_kelas ASC";
                $query = mysqli_query($koneksi,$sql);
                 while($data = mysqli_fetch_assoc($query)){
                        extract($data);
                        list($thn,$bln,$tgl)=explode('-',$tgl_lahir);
				?>
        <tbody>
          <tr style="font-size:12px;">
                  <td><?php echo $no++?></td>
                    <td><?php echo $nip ?></td>
                    <td><?php echo $nama_guru ?></td>
                    <td><?php echo $tgl.' '.$namabulan[(int)$bln].' '.$thn; ?></td>
                    <td><?php echo $agama ?></td>
                    <td><?php echo $alamat ?></td>
                    <td><?php echo $telp_guru ?></td>
                    <td><?php 
					$q5=mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas='".$id_kelas."'");
					$d5=mysqli_fetch_array($q5);
					echo $d5['nama_kelas']; ?></td>
                    <td><center><a href="<?php echo $foto ?>" class="perbesar"><img src="<?php echo $foto ?>" width="30px" height="30px"></a></center></td>
                    <td><?php if($status == "Aktif"){
            echo "<span class='label label-success'>Aktif</span>";
            } else {
              echo "<span class='label label-danger'>Tidak Aktif</span>";
              }?></td>
                    <td><a href="#" class='open_modal btn btn-primary btn-sm' nip='<?php echo $nip; ?>' data-toggle="tooltip" data-placement="bottom" title="Edit"><center><span class='glyphicon glyphicon-pencil' ></span></center></a>
         </td>
                    <td><a href="#" onClick="confirm_modal('hapus.php?nip=<?php echo $nip; ?>');" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-sm"><center><span class='glyphicon glyphicon-trash' ></span></center></a></td>
                </tr>
                
        </tbody>
        <?php } } else { ?>
        <?php 
          if(isset($_GET['page']) && $_GET['page'] != ''){
              
              $page = $_GET['page'];

                } else {
                    $page = 1;

                }
                
                $rowsPerPage = 10;//Jumlah maksimal halaman
                if(empty($page)){
                    $posisi  = 0;
                    $page = 1;
                  }
                else{ 
                    $posisi  = ($page-1) * $rowsPerPage; 
                }
                $no = $posisi + 1;

                $namabulan = array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                    $href        = "data-guru.php";  
                    $sql = "SELECT * FROM guru_kelas where nip like '%$hsl%' or nama_guru like '%$hsl%' order by id_kelas ASC";
                    $hasil = mysqli_query($koneksi,getPagingQuery($sql, $rowsPerPage));
                    $pagingLink = getPagingLink($href, $sql, $rowsPerPage, $page);
                    while($baris = mysqli_fetch_assoc($hasil)) {
                    extract($baris);
                    list($thn,$bln,$tgl)=explode('-',$tgl_lahir);
                ?>

        <tbody>
          <tr style="font-size:12px;">
                  <td><?php echo $no++?></td>
                    <td><?php echo $nip ?></td>
                    <td><?php echo $nama_guru ?></td>
                    <td><?php echo $tgl.' '.$namabulan[(int)$bln].' '.$thn; ?></td>
                    <td><?php echo $agama ?></td>
                    <td><?php echo $alamat ?></td>
                    <td><?php echo $telp_guru ?></td>
                    <td><?php 
					$q5=mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas='".$id_kelas."'");
					$d5=mysqli_fetch_array($q5);
					echo $d5['nama_kelas']; ?></td>
                    <td><center><a href="<?php echo $foto ?>" class="perbesar"><img src="<?php echo $foto ?>" width="30px" height="30px"></a></center></td>
                    <td><?php if($status == "Aktif"){
            echo "<span class='label label-success'>Aktif</span>";
            } else {
              echo "<span class='label label-danger'>Tidak Aktif</span>";
              }?></td>
                    <td><a href="#" class='open_modal btn btn-primary btn-sm' nip='<?php echo $nip; ?>' data-toggle="tooltip" data-placement="bottom" title="Edit"><center><span class='glyphicon glyphicon-pencil' ></span></center></a>
         </td>
                    <td><a href="#" onClick="confirm_modal('hapus.php?nip=<?php echo $nip; ?>');" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-sm"><center><span class='glyphicon glyphicon-trash' ></span></center></a></td>
                </tr>
                
        </tbody>

        <?php } } ?>

            </table>

            <?php 
              echo $pagingLink;
             ?>


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

    <!-- Modal Popup untuk Edit-->
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete-->
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Apakah Data Guru Kelas Ingin Dihapus ?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>


    <script src="../../asset/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../asset/js/bootstrap.min.js"></script>


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


<!-- Javascript untuk popup modal Edit-->
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("nip");
		   $.ajax({
    			   url: "edit-guru.php",
    			   type: "GET",
    			   data : {nip: m,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>

<!-- Javascript untuk popup modal Delete-->
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

</body>
</html>
