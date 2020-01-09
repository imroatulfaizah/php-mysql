<?php
session_start();
include "../koneksi.php";
  
            $nip = $_POST['nip'];
            $pass     = md5($_POST['password']);
            //make sure the username and password are character or number.

                $login=mysqli_query($koneksi,"SELECT * FROM guru_kelas where nip='$nip' and password='$pass'");
                $found=mysqli_num_rows($login);
                $r=mysqli_fetch_array($login);
            //If found the username and password
            
            if ($found > 0){
            session_start();
                include "timeout.php";
                $_SESSION['nip']     = $r['nip'];
                $_SESSION['nama_guru']         = $r['nama_guru'];
                $_SESSION['password']     = $r['password'];
                $_SESSION['status']        = $r['status'];
                $_SESSION['level'] = $r['level'];
                $_SESSION['id_kelas'] = $r['id_kelas'];

                 //panggil fungsi untuk membuat waktu session awal
                login_validate();

                if($r['status']=='Tidak Aktif'){
            header('location:index.php?pesan=tidak-aktif');
            }
            else{

            if($r['level']=="guru"){
            header("location:modul/home.php");
                }
            
            }
            login_validate();
        }

        else{
            header('location:index.php?pesan=log-gagal');
    }
?>