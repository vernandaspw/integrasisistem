<?php
include "koneksi.php";
include './lib/GoogleAuthenticator.php';

$auth = new PHPGangsta_GoogleAuthenticator();
$secret = $auth->createSecret();

$secret = 'AU43L2RFS5FYA5RZ';

$website = 'Integrasi_Sistem';
$title = 'Malam';
$tolerance = 0;

$QRCode = $auth->getQRCodeGoogleUrl($title,$secret,$website);

function daftardosen() {
    global $conn;
    
    @$nama = htmlspecialchars($_POST['nama']);
    @$username = strtolower(stripslashes($_POST['username']));
    @$pasword = $_POST['password'];
    @$level = "dosen";
    @$jeniskelamin = $_POST['jeniskelamin'];

    if (isset($_POST['daftardosen'])) {
        $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert('username sdh ada')</script>";
            return false;
        } else {
            $pass= md5($pasword);
            $sql = mysqli_query($conn, "INSERT INTO users VALUES    ('', 
                                                                    '', 
                                                                    '$nama', 
                                                                    '$username', 
                                                                    '$pass',
                                                                    '$level',
                                                                    '$jeniskelamin'
                                                                    )");
                                                                    
            if ($sql > 0) {
                $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND pasword = md5('$pasword')");
                $data = mysqli_fetch_assoc($query);
                $cek = mysqli_num_rows($query); 
                if ($cek > 0) {
                    if ($data['level'] == "dosen") {
                        $_SESSION['dosen'] = $data['id'];
                        header("Location:admin.php");
                    } elseif ($data['level'] == "mahasiswa") {
                        $_SESSION['mahasiswa'] = $data['id'];
                        header("Location:admin.php");
                    } 
                } else {
                    echo "<script>alert('Gagal terhubung kesession')</script>";
                }
            }
        }
    }
}


function daftarmahasiswa(){
    global $conn;
    
    @$npm = htmlspecialchars($_POST['npm']);
    @$nama = htmlspecialchars($_POST['nama']);
    @$username = strtolower(stripslashes($_POST['username']));
    @$pasword = $_POST['password'];
    @$level = "mahasiswa";
    @$jeniskelamin = $_POST['jeniskelamin'];

    if (isset($_POST['daftarmahasiswa'])) {
        $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert('username sdh ada')</script>";
            return false;
        } else {
            $pass= md5($pasword);
            $sql = mysqli_query($conn, "INSERT INTO users VALUES    ('', 
                                                                    '$npm', 
                                                                    '$nama', 
                                                                    '$username', 
                                                                    '$pass',
                                                                    '$level',
                                                                    '$jeniskelamin'
                                                                    )");
                                                                    
            if ($sql) {
                $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND pasword = md5('$pasword')");
                $cek = mysqli_num_rows($query); 
                if ($cek > 0) {
                    $data = mysqli_fetch_assoc($query);
                    if ($data['level'] == "dosen") {
                        @$_SESSION['dosen'] = $data['id'];
                        header("Location:admin.php");
                    } elseif ($data['level'] == "mahasiswa") {
                        @$_SESSION['mahasiswa'] = $data['id'];
                        header("Location:admin.php");
                    } 
                } else {
                    echo "<script>alert('Gagal terhubung kesession')</script>";
                }
            }
        }
    }
}


function login() {
    global $conn;

    @$username = strtolower(stripslashes($_POST['username']));
    @$inpassword = $_POST['passwor'];

    if (isset($_POST['lanjut'])) {
        $cek_user = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
        $cek = mysqli_num_rows($cek_user);
        if ($cek > 0) {
            $data = mysqli_fetch_assoc($cek_user);
            $cek_pass = $data['pasword'];
            $newpas = md5($inpassword);
            if ($cek_pass == $newpas) {       
                if ($data['level'] == 'dosen') {
                    $_SESSION['dosen'] = $data['id'];
                    $_SESSION['nama'] = $data['nama'];
                    $_SESSION['level'] = $data['level'];
                    header('Location:index.php?h=auth');
                } elseif ($data['level'] == 'mahasiswa') {
                    $_SESSION['mahasiswa'] = $data['id'];
                    $_SESSION['nama'] = $data['nama'];
                    $_SESSION['level'] = $data['level'];
                    header("Location:index.php?h=auth");
                } 
            } else {
                echo "<script>
                alert('password salah')
                </script>";
                header("Location:index.php?h=login");
            }
        } else {
        echo "<script>
            alert('username tidak ditemukan')
            </script>";
            header("Location:index.php?h=login");
        }
    }
}

function auth() {
    global $auth;
    global $secret;
    global $tolerance;

    if (isset($_POST['btn-submit'])) {
        $code = $_POST['code'];
        $result = $auth->verifyCode($secret,$code,$tolerance);
        if ($result) {
            header("Location:admin.php");
        }else {
            echo "<p style='color:red'>KODE TIDAK VALID!</p>";
            @session_start();
            session_destroy();
            header("Location:index.php?h=login");
        }
    }
}