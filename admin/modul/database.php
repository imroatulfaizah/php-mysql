<?php
include "sesion.php";

// definisikan koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "kurtilas";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Database | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar">
<meta name="author" content="Malik">
<title>Database | Sistem Informasi Penilaian Akademik Kurikulum 2013 Berbasis Web Pada SDN Tangkil 03 Wlingi - Blitar</title>
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.png" />
<link href="../../asset/style.css" type="text/css" rel="stylesheet">
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
                      if (!empty($_GET['pesan']) && $_GET['pesan'] == 'gagal-edit-kelas') {
                           echo '<div class="label-eror">
                                Nama Kelas Sudah Terdaftar
                                </div>';
                          }
					   if (!empty($_GET['pesan']) && $_GET['pesan'] == 'sukses-edit-kelas') {
                           echo '<div class="label-sukses">
                                Sukses Edit Kelas
                                </div>';
                          }
						if (!empty($_GET['pesan']) && $_GET['pesan'] == 'sukses-hapus-kelas') {
                           echo '<div class="label-sukses">
                                Sukses Hapus Kelas
                                </div>';
                          }
						 
				?>
                
                <div class="panel panel-primary">
  					<div class="panel-heading">Database</div>
                        <div class="panel-body" style="overflow:auto;">
                         
                         <?php
      
      
      
            $file   = $database.'_'.date("DdMY").'_'.time().'.sql';
            //membuat nama file

            ?>




            <div>
                <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active">
                            <a data-toggle="tab" href="#backup">
                                <i class="green ace-icon fa  fa-cloud-download bigger-120"></i>
                                Backup
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#restore">
                                <i class="blue ace-icon fa  fa-cloud-upload bigger-120"></i>
                                Restore
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div id="backup" class="tab-pane fade in active">
                            <form action="" method="post" name="postform" enctype="multipart/form-data" >
                            <br>
                                <p>
                                    <strong>Backup</strong> semua data yang ada didalam database &quot;<strong><?= $database ?></strong>&quot;.</em>
                                </p>
                                <div class="asd">
                                    <label for="backup">Backup database</label>
                                    <button id="loading-btn" type="submit" class="btn btn-success" name="backup" onClick="return confirm('Yakin Database <?php echo $database?> Ingin Di Backup ? ');">Proses Backup</button>
                                </div>

                            </form>
                        </div>

                        <div id="restore" class="tab-pane fade">
                            <form action="" method="post" name="postform" enctype="multipart/form-data" >
                            <br>
                                <p>
                                    <strong>Restore</strong> semua data yang ada didalam database &quot;<strong><?= $database ?></strong>&quot;.</em>
                                </p>
                                <div class="asd">
                                    <label for="backup">File Backup Database (*.sql)</label>
                                    <input type="file" name="datafile" size="20" class="filestyle" data-buttonName="btn-primary"/>
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="restore" onClick="return pastikan('Backup database')" data-loading-text="Loading...">Proses Restore</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div><!-- /.col -->




                <?php

                //Download file backup ============================================
                if(isset($_GET['nama_file']))
                {
                    $file = $back_dir.$_GET['nama_file'];

                    if (file_exists($file))
                    {
                        header('Content-Description: File Transfer');
                        header('Content-Type: application/octet-stream');
                        header('Content-Disposition: attachment; filename='.basename($file));
                        header('Content-Transfer-Encoding: binary');
                        header('Expires: 0');
                        header('Cache-Control: private');
                        header('Pragma: private');
                        header('Content-Length: ' . filesize($file));
                        ob_clean();
                        flush();
                        readfile($file);
                        exit;

                    }
                    else
                    {
                        echo "file {$_GET['nama_file']} sudah tidak ada.";
                    }

                }

                //Backup database =================================================
                if(isset($_POST['backup']))
                {
                    backup($file);
                   
          echo 'Backup database telah selesai <a style="cursor:pointer" href="'.$file.'" title="Download">Download file database</a>';

                    echo "<pre>";
                    print_r($return);
                    echo "</pre>";
                }
                else
                {
                    unset($_POST['backup']);
                }

                //Restore database ================================================
                if(isset($_POST['restore']))
                {
                    restore($_FILES['datafile']);

                    echo "<pre>";
                    print_r($lines);
                    echo "</pre>";
                }
                else
                {
                    unset($_POST['restore']);
                }

                ?>


            <?php

            function restore($file) {
                global $rest_dir;

                $nama_file  = $file['name'];
                $ukrn_file  = $file['size'];
                $tmp_file = $file['tmp_name'];

                if ($nama_file == "")
                {
                    echo "Fatal Error";
                }
                else
                {
                    $alamatfile = $rest_dir.$nama_file;
                    $templine = array();

                    if (move_uploaded_file($tmp_file , $alamatfile))
                    {

                        $templine = '';
                        $lines    = file($alamatfile);

                        foreach ($lines as $line)
                        {
                            if (substr($line, 0, 2) == '--' || $line == '')
                                continue;

                            $templine .= $line;

                            if (substr(trim($line), -1, 1) == ';')
                            {
                                mysql_query($templine) or print('Query gagal \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');

                                $templine = '';
                            }
                        }
                        echo "<center>Berhasil Restore Database, silahkan di cek.</center>";

                    }else{
                        echo "Proses upload gagal, kode error = " . $file['error'];
                    }
                }

            }

            function backup($nama_file,$tables = '')
            {
                global $return, $tables, $back_dir, $database ;

                if($tables == '')
                {
                    $tables = array();
                    $result = @mysql_list_tables($database);
                    while($row = @mysql_fetch_row($result))
                    {
                        $tables[] = $row[0];
                    }
                }else{
                    $tables = is_array($tables) ? $tables : explode(',',$tables);
                }

                $return = '';

                foreach($tables as $table)
                {
                    $result  = @mysql_query('SELECT * FROM '.$table);
                    $num_fields = @mysql_num_fields($result);

                    //menyisipkan query drop table untuk nanti hapus table yang lama
                    $return .= "DROP TABLE IF EXISTS ".$table.";";
                    $row2  = @mysql_fetch_row(mysql_query('SHOW CREATE TABLE  '.$table));
                    $return .= "\n\n".$row2[1].";\n\n";

                    for ($i = 0; $i < $num_fields; $i++)
                    {
                        while($row = @mysql_fetch_row($result))
                        {
                            $return.= 'INSERT INTO '.$table.' VALUES(';

                            for($j=0; $j<$num_fields; $j++)
                            {
                                $row[$j] = @addslashes($row[$j]);
                                $row[$j] = @ereg_replace("\n","\\n",$row[$j]);
                                if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                                if ($j<($num_fields-1)) { $return.= ','; }
                            }
                            $return.= ");\n";
                        }
                    }
                    $return.="\n\n\n";
                }

                $nama_file;

                $handle = fopen($back_dir.$nama_file,'w+');
                fwrite($handle, $return);
                fclose($handle);
            }
            ?>
    		                  
                        </div>

                </div>  
  </div>
</div> 
<br><br><br>               
        	
        
        <div class="navbar-fixed-bottom footer">
        	<?php include "footer.php"; ?>
        </div>
    </div>
      
</body>
</html>
