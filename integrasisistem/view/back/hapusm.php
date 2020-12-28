<?php

$npmm = $_GET["npm"];

$sql = "DELETE FROM users WHERE npm= '$npmm'";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location: admin.php?b=dashboard");
} else {
    header("location: admin.php?b=dashboard");
}