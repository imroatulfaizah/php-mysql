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
	$id=$_GET['id_mapel'];
	$modal=mysqli_query($koneksi,"SELECT * FROM mapel WHERE id_mapel='$id'");
	while($r=mysqli_fetch_array($modal)){
		
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header modal-header-primary">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Mata Pelajaran</h4>
        </div>

        <div class="modal-body">
        	<form action="proses.php" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group">
                	<label class="col-sm-4 control-label">Nama Mata Pelajaran</label>
                    <input type="hidden" name="id_mapel"  class="form-control" value="<?php echo $r['id_mapel']; ?>" />
     				<input type="text" name="nama_mapel"  class="form-control" value="<?php echo $r['nama_mapel']; ?>" />
                </div>
                
                <div class="form-group">
						<label class="col-sm-4 control-label"></label>
							<div class="col-sm-12">
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
				$q2= mysqli_query($koneksi,"SELECT * FROM mapel_detail where id_mapel='$r[id_mapel]' and id_kelas='$data[id_kelas]'");
				$d2 = mysqli_fetch_array($q2);
				?>
             	<tr>
                <td><?php echo $data['nama_kelas']; ?></td>
                <td><input class="input" type="checkbox" name="kel[]"
                <?php if ($data['id_kelas']==$d2['id_kelas']){?>checked <?php } ?> value="<?php echo $data['id_kelas'] ?>" />
                </td>
                </tr>
            <?php } ?>
			</table>
            </div>
            </div>
                
	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit" name="edit-mapel">
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



