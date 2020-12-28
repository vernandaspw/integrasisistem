<?php

if(!empty($_GET['b'])){
    if($_GET['b'] == "dashboard"){
        if (@$_SESSION['dosen'] || @$_SESSION['mahasiswa']) {
        include "./view/back/dashboard.php";
        } else { 
            header("Location:index.php");
        }
    }else if($_GET['b'] == "logout"){
        include "./view/back/logout.php";
    }else if($_GET['b'] == "profil"){
        if (@$_SESSION['dosen'] || @$_SESSION['mahasiswa']) {
            header("Location:./pengembangan.php");
        } else { 
            header("Location:index.php");
        }
    } else if($_GET['b'] == "absensi"){
        if (@$_SESSION['dosen'] || @$_SESSION['mahasiswa']) {
        header("Location:./pengembangan.php");
        } else { 
            header("Location:index.php");
        }
    } else if($_GET['b'] == "ubahm" ) {
        include "./view/back/ubahm.php";
    } else if($_GET['b'] == "hapusm" ) {
        include "./view/back/hapusm.php";
    }
    
} else{
    if (@$_SESSION['dosen'] || @$_SESSION['mahasiswa']) {
    include "./view/back/dashboard.php";
    } else { 
        header("Location:index.php");
    }
}