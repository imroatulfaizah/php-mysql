<?php
session_start();
include "../koneksi.php";

            $nis = $_POST['nis'];
            $pass     = md5($_POST['password']);
            //make sure the username and password are character or number.

                $login=mysqli_query($koneksi,"SELECT * FROM siswa where nis='$nis' and password='$pass'");
                $found=mysqli_num_rows($login);
                $r=mysqli_fetch_array($login);
            //If found the username and password
            
            if ($found > 0){
            session_start();
                include "timeout.php";
                $_SESSION['id_siswa'] = $r['id_siswa'];
                $_SESSION['nis']     = $r['nis'];
                $_SESSION['nama_siswa']         = $r['nama_siswa'];
                $_SESSION['id_kelas']     = $r['id_kelas'];
                $_SESSION['status']        = $r['status'];
                $_SESSION['level'] = $r['level'];

                 //panggil fungsi untuk membuat waktu session awal
                login_validate();

                if($r['status']=='Tidak Aktif'){
            header('location:index.php?pesan=tidak-aktif');
            }
            else{

            if($r['level']=="siswa"){
            header("location:modul/home.php");
                }
            
            }
            login_validate();
        }

        else{
            header('location:index.php?pesan=log-gagal');
    }
?>