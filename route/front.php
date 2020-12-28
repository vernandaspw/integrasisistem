<?php


if(!empty($_GET['h'])){
    if($_GET['h'] == "login"){
        if (@$_SESSION['dosen'] || @$_SESSION['mahasiswa']) {
            header("Location: admin.php");
        } else {
        include "./view/front/login.php";
        }
    }else if($_GET['h'] == "daftardosen"){
        include "./view/front/daftardosen.php";
    }else if($_GET['h'] == "daftarmahasiswa"){
        include "./view/front/daftarmahasiswa.php";
    } else if($_GET['h'] == "auth"){
            include "./view/front/auth.php";  
    } 
    
} else{
    include "./view/front/home.php";
}