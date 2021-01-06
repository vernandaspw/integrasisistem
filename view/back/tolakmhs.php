<?php
$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM req_mhs WHERE id='$id'");
if ($query) {
    header("location: admin.php?b=konfirmasiakun");
} else {
    header("location: admin.php?b=konfirmasiakun");
}