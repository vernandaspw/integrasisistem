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
            $sql = mysqli_query($conn, "INSERT INTO req_mhs VALUES    ('', 
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
                    echo "<script>alert('Silahkan konfirmasi pembuatan akun ke dosen')</script>";
                }
            }
        }
    }
}

function login() {
    global $conn;
    global $auth;
    global $secret;
    global $tolerance;
    
    @$username = strtolower(stripslashes($_POST['username']));
    @$inpassword = $_POST['passwor'];

    if (isset($_POST['lanjut'])) {
        $cek_user1 = mysqli_query($conn, "SELECT * FROM req_mhs WHERE username='$username'");
        $cek1 = mysqli_num_rows($cek_user1);
        if ($cek1 > 0) {
            echo "<script>alert('Akun kamu belum aktif, Silahkan konfirmasi pembuatan akun ke dosen')</script>";

        }else {

            $cek_user2 = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
            $cek2 = mysqli_num_rows($cek_user2);
            if ($cek2 > 0) {
                $data = mysqli_fetch_assoc($cek_user2);
                $cek_pass = $data['pasword'];
                $newpas = md5($inpassword);
                if ($cek_pass == $newpas) {    
                    $code = $_POST['code'];
                    $result = $auth->verifyCode($secret,$code,$tolerance);
                    if ($result) {
                        if ($data['level'] == 'dosen') {
                            $_SESSION['dosen'] = $data['id'];
                            $_SESSION['nama'] = $data['nama'];
                            $_SESSION['level'] = $data['level'];
                        } elseif ($data['level'] == 'mahasiswa') {
                            $_SESSION['mahasiswa'] = $data['id'];
                            $_SESSION['npm'] = $data['npm'];
                            $_SESSION['nama'] = $data['nama'];
                            $_SESSION['level'] = $data['level'];
                        } 
                    }else {
                        echo "<script>alert('Kode google Authenticator salah!')</script>";
                    }
                } else {
                    echo "<script>alert('password salah!')</script>";
                }
            } else {
                echo "<script>alert('username tidak ditemukan!')</script>";
            }
        }
    }
}

function submitabsen() {
    global $conn;

    @$npm = $_POST['npm'];
    @$nama = $_POST['nama'];
    @$tanggal = $_POST['tanggal'];
    @$status = $_POST['status'];
    @$keterangan = htmlspecialchars($_POST['keterangan']);

    $result = mysqli_query($conn, "SELECT npm FROM tb_req_absen WHERE npm = '$npm'");
        if (mysqli_fetch_assoc($result)) {
            if ($result) {
                $status = '2';
            } else{
                $status = '1';
            }   
            echo "<script>window.location.href='admin.php?b=absen&s=$status'</script>";
            return false;
        } else {
            $sql = mysqli_query($conn, "INSERT INTO tb_req_absen VALUES    ('', 
                                                                    '$npm', 
                                                                    '$nama', 
                                                                    '$tanggal', 
                                                                    '$status',
                                                                    '$keterangan'
                                                                    )");
            if ($sql) {
                $status = '1';
            } else{
                $status = '2';
            }   
            echo "<script>window.location.href='admin.php?b=absen&s=$status'</script>";
        }
}



function alertabsen() {
    if(!empty($_GET['s'])){
        if($_GET['s'] == "1"){
    ?>
<div class="alert alert-success">
    <strong>Berhasil,</strong> Berhasil Absen
</div>
<?php
    }else if($_GET['s'] == "2"){
                        ?>
<div class="alert alert-danger">
    <strong>Maaf !</strong> Kamu sudah request absen hari ini
</div>
<?php
                        }
                    }
                
}