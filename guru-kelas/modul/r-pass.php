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
<meta name="description" content="Ubah Password | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar">
<meta name="author" content="Malik">
<title>Ubah Password | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar</title>
<link href="../../asset/style.css" type="text/css" rel="stylesheet">
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.png" />
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

</head>

<body>
            <?php include "header.php"; ?>    
<div class="container" style="margin-top:70px;">
  <div class="row">
    <div class="col-md-12">
    <?php
                      if (!empty($_GET['pesan']) && $_GET['pesan'] == 'pas-lama-salah') {
                           echo '<div class="label-eror">
                                Password Yang Anda Masukan Salah
                                </div>';
                          }
                       if (!empty($_GET['pesan']) && $_GET['pesan'] == 'pas-tak-sama') {
                           echo '<div class="label-eror">
                                Password Tidak Sama Dengan Yang Baru
                                </div>';
                          }
                        if (!empty($_GET['pesan']) && $_GET['pesan'] == 'sukses-edit-pass') {
                           echo '<div class="label-sukses">
                                Sukses Edit Password
                                </div>';
                          }
                         
                ?>
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Edit Password</div>
                        
                        <div class="panel-body" style="overflow:auto;">
                            
                            <form class="form-horizontal" action="pro-pass.php" method="post">
              <fieldset>
                <!--Username-->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="name">NIP</label>
                  <div class="col-md-10">
                  <input id="name" name="nip" value="<?php echo $_SESSION['nip']?>" type="text" placeholder="Nip" class="form-control" readonly>
                  </div>
                </div>
              
                <!-- Password Lama-->
                <div class="form-group">
                  <label class="col-md-2 control-label">Password Lama</label>
                  <div class="col-md-10">
                    <input  name="oldPass" type="password" placeholder="Password Lama" class="form-control" required>
                  </div>
                </div>
                
                <!-- Password Baru -->
                <div class="form-group">
                  <label class="col-md-2 control-label">Password Baru</label>
                  <div class="col-md-10">
                    <input  name="newPass1" type="password" placeholder="Password Baru" class="form-control" required>
                  </div>
                </div>

                <!-- Password Baru Ulang-->
                <div class="form-group">
                  <label class="col-md-2 control-label">Ketikan Ulang Password Baru</label>
                  <div class="col-md-10">
                    <input type="password" class="form-control" placeholder="Ketikan Ulang Password Baru" name="newPass2" class="form-control" required>
                  </div>
                </div>
                
                <!-- Form actions -->
                <div class="form-group">
                  <div class="col-md-12 widget-right">
                    <button type="submit" class="btn btn-default btn-md pull-right" name="r-pass">Rubah</button>
                  </div>
                </div>
              </fieldset>
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
    

<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
           $.ajax({
                   url: "edit-kelas.php",
                   type: "GET",
                   data : {id_kelas: m,},
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
