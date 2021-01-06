<?php 
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM tb_req_absen where id='$id' ");
    $datas = mysqli_fetch_array($sql);
    $cek = mysqli_num_rows($sql);
    if ($cek > 0) { 
        $npm = $datas['npm'];
        $nama = $datas['nama'];
        $tanggal = $datas['tanggal'];
        $status = $datas['status'];
        $keterangan = $datas['keterangan'];
        $query = mysqli_query($conn, "INSERT INTO tb_absen SET  npm='$npm',
                                                                nama='$nama',
                                                                tanggal='$tanggal',
                                                                status='$status',
                                                                keterangan='$keterangan'");
        if ($query) {
            $hapus = mysqli_query($conn, "DELETE FROM tb_req_absen WHERE id='$id'");
            if ($hapus) {
                header("location: admin.php?b=konfirmasiabsensi");
            }else {
                echo "gagal aprove";
            }
        } else {
            echo "gagal menambahkan keabsen";
        }
    } else {
        echo "tidak ada data";
    }