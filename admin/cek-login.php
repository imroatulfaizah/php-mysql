<?php
session_start();
include "../koneksi.php";

            $username = $_POST['username'];
            $pass     = md5($_POST['password']);
            //make sure the username and password are character or number.

                $login=mysqli_query($koneksi,"SELECT * FROM admin where username='$username' and password='$pass'");
                $found=mysqli_num_rows($login);
                $r=mysqli_fetch_array($login);
            //If found the username and password      

            if ($found > 0){
            session_start();
                include "timeout.php";
                $_SESSION['username']     = $r['username'];
                $_SESSION['nama']         = $r['nama'];
                $_SESSION['password']     = $r['password'];
                $_SESSION['level']        = $r['level'];

                 //panggil fungsi untuk membuat waktu session awal
                login_validate();

                if($r['block']=='Y'){
            header('location:index.php?pesan=tidak-aktif');
            }
            else{

            if($r['level']=="admin"){
            header("location:modul/home.php");
                }
            
            }
            login_validate();
        }

        else{
            header('location:index.php?pesan=log-gagal');
    }
?>