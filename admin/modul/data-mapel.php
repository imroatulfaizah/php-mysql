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
<meta name="description" content="Data Mata Pelajaran | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar">
<meta name="author" content="Malik">
<title>Data Mata pelajaran | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar</title>
<link href="../../asset/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.png" />
<!-- Bootstrap Core CSS -->
<link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery Version 1.11.1 -->
<script src="../../asset/js/jquery.js"></script>

    <!-- Gambar Saat Di Klik Besar -->
    <script src="../../asset/source/jquery.fancybox.js" type="text/javascript"></script>
    <link href="../../asset/source/jquery.fancybox.css" type="text/css" rel="stylesheet" media="screen">
    
    <!-- Selector -->
    <script type="text/javascript">
		$(document).ready(function(){
			$(".perbesar").fancybox();
			});
	</script>

</head>

<body>
        	<?php include "header.php"; ?>    
<div class="container" style="margin-top:70px;">
  <div class="row">
    <div class="col-md-12">
    <?php
                      if (!empty($_GET['pesan']) && $_GET['pesan'] == 'gagal-edit-mapel') {
                           echo '<div class="label-eror">
                                Mata Pelajaran Sudah Terdaftar
                                </div>';
                          }
					   if (!empty($_GET['pesan']) && $_GET['pesan'] == 'sukses-edit-mapel') {
                           echo '<div class="label-sukses">
                                Sukses Edit Mata Pelajaran
                                </div>';
                          }
						if (!empty($_GET['pesan']) && $_GET['pesan'] == 'sukses-hapus-kelas') {
                           echo '<div class="label-sukses">
                                Sukses Hapus Kelas
                                </div>';
                          }
						 
				?>
                
                <div class="panel panel-primary">
  					<div class="panel-heading">Data Mata Pelajaran</div>
  						
                        <div class="panel-body" style="overflow:auto;">
                        <form action="data-mapel.php" method="get">
                         <div class="col-md-2">

                        <a href="in-mapel.php" class="btn btn-warning waves-effect">Tambah Mapel</a>
                         </div>
                         <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <span class='glyphicon glyphicon-search' ></span>
                                            </span>
                                            <div class="form-line">
                                                <input class="form-control" size="10" type="text" placeholder="Pencarian Mata Pelajaran" required name="pencarian">
                                            </div>
                                                                                    
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary btn-sm waves-effect" name="cari">Cari</button> || <a href="data-mapel.php" class="btn btn-success btn-sm waves-effect">Tampilkan Data Keseluruhan</a>
                                    </div>

                          </form>
                          <br>
                          <br>
    		<table class="table table-bordered table-hover table-responsive" id="mydata">
        <thead>
          <tr>
                  <th width="10px">No</th>
                    <th>Nama Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
        </thead>
            
                <?php 
           if(isset($_GET['cari'])){
                $hsl = $_GET['pencarian'];
                $no = 1;
                $sql = "SELECT * FROM mapel WHERE nama_mapel like '%$hsl%' ORDER BY id_mapel ASC";
                $query = mysqli_query($koneksi,$sql);
                 while($data = mysqli_fetch_assoc($query)){
                        extract($data);
                ?>	
        <tbody>
          <tr style="font-size:12px;">
                  <td><?php echo $no++?></td>
                    <td><?php echo $nama_mapel ?></td>
                    <td><?php 
					$q1 = mysqli_query($koneksi,"SELECT * FROM mapel_detail where id_mapel='".$id_mapel."'");
					while($d1 = mysqli_fetch_array($q1)){
						$q5=mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas='".$d1['id_kelas']."'");
						$d5=mysqli_fetch_array($q5);	
				 		echo "&diams; ".$d5['nama_kelas']."<br>";
			}
					 ?></td>
                    <td><a href="#" class='open_modal btn btn-primary btn-sm' id='<?php echo $id_mapel; ?>' data-toggle="tooltip" data-placement="bottom" title="Edit"><center><span class='glyphicon glyphicon-pencil' ></span></center></a></td>
                    <td><a href="#" onClick="confirm_modal('hapus.php?id_mapel=<?php echo $id_mapel; ?>');" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-sm"><center><span class='glyphicon glyphicon-trash' ></span></center></a></td>
          </tr>
        </tbody>
                
                <?php } } else { ?>

                <?php if(isset($_GET['page']) && $_GET['page'] != ''){
              
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
                    $href        = "data-mapel.php";  
                    $sql = "SELECT * FROM mapel WHERE nama_mapel like '%$hsl%' ORDER BY id_mapel ASC";
                    $hasil = mysqli_query($koneksi,getPagingQuery($sql, $rowsPerPage));
                    $pagingLink = getPagingLink($href, $sql, $rowsPerPage, $page);
                    while($baris = mysqli_fetch_assoc($hasil)) {
                    extract($baris);
              ?>
        <tbody>
          <tr style="font-size:12px;">
                  <td><?php echo $no++?></td>
                    <td><?php echo $nama_mapel ?></td>
                    <td><?php 
					$q1 = mysqli_query($koneksi,"SELECT * FROM mapel_detail where id_mapel='".$id_mapel."'");
					while($d1 = mysqli_fetch_array($q1)){
						$q5=mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas='".$d1['id_kelas']."'");
						$d5=mysqli_fetch_array($q5);	
				 		echo "&diams; ".$d5['nama_kelas']."<br>";
			} ?></td>
                    <td><a href="#" class='open_modal btn btn-primary btn-sm' id='<?php echo $id_mapel; ?>' data-toggle="tooltip" data-placement="bottom" title="Edit"><center><span class='glyphicon glyphicon-pencil' ></span></center></a></td>
                    <td><a href="#" onClick="confirm_modal('hapus.php?id_mapel=<?php echo $id_mapel; ?>');" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-sm"><center><span class='glyphicon glyphicon-trash' ></span></center></a></td>
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
        <h4 class="modal-title" style="text-align:center;">Apakah Data Mata Pelajaran Ingin Dihapus ?</h4>
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
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "edit-mapel.php",
    			   type: "GET",
    			   data : {id_mapel: m,},
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

