<?php

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM tb_req_absen WHERE id='$id'");

if ($query) {
    header("location: admin.php?b=konfirmasiabsensi");
} else {
    header("location: admin.php?b=konfirmasiabsensi");
}