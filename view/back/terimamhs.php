<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM req_mhs where id='$id' ");
$datas = mysqli_fetch_array($sql);
$cek = mysqli_num_rows($sql);
if ($cek > 0) { 
    $npm = $datas['npm'];
    $nama = $datas['nama'];
    $username = $datas['username'];
    $password = $datas['pasword'];
    $level = $datas['level'];
    $jenis_kelamin = $datas['jenis_kelamin'];
    $query = mysqli_query($conn, "INSERT INTO users SET  npm='$npm',
                                                            nama='$nama',
                                                            username='$username',
                                                            pasword='$password',
                                                            level='$level',
                                                            jenis_kelamin='$jenis_kelamin'
                                                            ");
    if ($query) {
        $hapus = mysqli_query($conn, "DELETE FROM req_mhs WHERE id='$id'");
        if ($hapus) {
            header("location: admin.php?b=konfirmasiakun");
        }else {
            echo "gagal aprove";
        }
    } else {
        echo "gagal menambahkan keabsen";
    }
} else {
    echo "tidak ada data";
}