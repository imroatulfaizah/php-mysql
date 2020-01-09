<?php
include "sesion.php";
include "../../koneksi.php";
?>

<style>
.modal-header-success {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #5cb85c;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
.modal-header-warning {
    color:#fff;
    margin-bottom: 20px;
    border-bottom:1px solid #eee;
    background-color: #f0ad4e;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
.modal-header-danger {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #d9534f;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
.modal-header-info {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #5bc0de;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
.modal-header-primary {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #428bca;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}

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

<?php
    include "../../koneksi.php";
	$nip=$_GET['nip'];
	$modal=mysqli_query($koneksi,"SELECT * FROM guru_kelas WHERE nip='$nip'");
	while($r=mysqli_fetch_array($modal)){
		list($tahun,$bulan,$tanggal) = explode('-',$r['tgl_lahir']);
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header modal-header-primary">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Guru</h4>
        </div>

        <div class="modal-body">
        	<form action="proses.php" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group">
                	<label class="control-label">NIP</label>
                    <input type="hidden" name="nip"  class="form-control" value="<?php echo $r['nip']; ?>" />
     				<input type="text" name="nip1"  class="form-control" value="<?php echo $r['nip']; ?>" disabled/>
                </div>
                
                <div class="form-group">
                	<label class="control-label">Nama Guru</label>
     			<input type="text" name="nama_guru"  class="form-control" value="<?php echo $r['nama_guru']; ?> "/>
                </div>

                <div class="form-group" >
                	<label class="control-label">Tanggal Lahir</label> <br><br>
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
              
              <div class="col-sm-4">
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
              <div class="col-sm-3">
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
                	<label class="control-label">Agama</label>
     			<select name="agama" class="form-control">
                <option value="Islam" <?php if($r['agama'] == 'Islam'){echo 'selected';}?> >Islam</option>
                <option value="Kristen" <?php if($r['agama'] == 'Kristen'){echo 'selected';}?> >Kristen</option>
                <option value="Budha" <?php if($r['agama'] == 'Budha'){echo 'selected';}?> >Budha</option>
                <option value="Hindu" <?php if($r['agama'] == 'Hindu'){echo 'selected';}?> >Hindu</option>
                <option value="Ateis" <?php if($r['agama'] == 'Ateis'){echo 'selected';}?> >Ateis</option>
              </select>  
                </div>
                
				<div class="form-group">
                	<label class="control-label">Alamat</label>
     			<textarea name="alamat" rows="5" cols="10px" class="form-control"><?php echo $r['alamat'];?></textarea>
                </div>
                
                <div class="form-group">
                	<label class="control-label">Telepon</label>
     			<input type="text" name="telp_guru"  class="form-control" value="<?php echo $r['telp_guru']; ?> " onKeyPress="return goodchars(event,'0123456789',this)"/>
                </div>
                
                <div class="form-group">
                    <label>Foto</label>
                    <br>
                    <img src="<?php echo $r['foto']?>" width="100px" height="100px" class="img-circle">
                    <br>
                    <br>
                    <div class="fileUpload btn btn-primary col-md-3">
                        <span><i class="glyphicon glyphicon-folder-open"></i> &nbsp;Pilih Gambar</span>
                        <input id="uploadBtn" type="file" class="upload" name="foto" accept="image/*"/>
                    </div>           
                    <div class="col-md-8">
                      <input id="uploadFile" placeholder="Nama File" disabled onChange="rubah()" class="form-control"/>
                    </div>
                </div>
                <br>
                <br>
                
                <div class="form-group">
                	<label class="control-label">Status</label>
     			<select name="status" class="form-control">
                <option value="Aktif" <?php if($r['status'] == 'Aktif'){echo 'selected';}?> >Aktif</option>
                <option value="Tidak Aktif" <?php if($r['status'] == 'Tidak Aktif'){echo 'selected';}?> >Tidak Aktif</option>
              </select>  
                </div>

                <div class="form-group">
                  <label class="control-label">Kelas</label>
          <select name="id_kelas" class="form-control">
              <?php $query1 = mysqli_query($koneksi,"SELECT * FROM kelas");
                while($data = mysqli_fetch_array($query1)){
              ?>
                <option value="<?php echo $data['id_kelas'] ?>" <?php if($data['id_kelas'] == $r['id_kelas']){echo 'selected';}?> ><?php echo $data['nama_kelas']?></option>
                <?php } ?>
              </select>  
                </div>
                
	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit" name="edit-guru">
	                    Edit
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Kembali
	                </button>
	            </div>

            	</form>

             <?php } ?>

            </div>

           
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