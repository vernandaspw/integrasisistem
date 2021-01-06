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
            include "./view/back/profil.php";
        } else { 
            header("Location:index.php");
        }
    } else if($_GET['b'] == "absen"){
        if (@$_SESSION['mahasiswa']) {
        include "./view/back/absen.php";
        } else { 
            header("Location:index.php");
        }
    }else if($_GET['b'] == "riwayatabsen"){
        if (@$_SESSION['mahasiswa']) {
        include "./view/back/riwayatabsen.php";
        } else { 
            header("Location:index.php");
        }
    } else if($_GET['b'] == "laporanabsen"){
        if (@$_SESSION['dosen']) {
        include "./view/back/laporanabsen.php";
        } else { 
            header("Location:index.php");
        }
    }else if($_GET['b'] == "laporansemua"){
        if (@$_SESSION['dosen']) {
        include "./view/back/laporansemua.php";
        } else { 
            header("Location:index.php");
        }
    } else if($_GET['b'] == "konfirmasiakun"){
        if (@$_SESSION['dosen']) {
        include "./view/back/konfirmasiakun.php";
        } else { 
            header("Location:index.php");
        }
    }else if($_GET['b'] == "konfirmasiabsensi"){
        if (@$_SESSION['dosen']) {
        include "./view/back/konfirmasi.php";
        } else { 
            header("Location:index.php");
        }
    } else if($_GET['b'] == "ubahm" ) {
        include "./view/back/ubahm.php";
    } else if($_GET['b'] == "hapusm" ) {
        include "./view/back/hapusm.php";
    }else if($_GET['b'] == "terimaabsen" ) {
        include "./view/back/terimaabsen.php";
    }else if($_GET['b'] == "tolakabsen" ) {
        include "./view/back/tolakabsen.php";
    }else if($_GET['b'] == "terimamhs" ) {
        include "./view/back/terimamhs.php";
    }else if($_GET['b'] == "tolakmhs" ) {
        include "./view/back/tolakmhs.php";
    }
    
} else{
    if (@$_SESSION['dosen'] || @$_SESSION['mahasiswa']) {
    include "./view/back/dashboard.php";
    } else { 
        header("Location:index.php");
    }
}