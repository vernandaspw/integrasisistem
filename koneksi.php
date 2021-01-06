<?php

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'db_kelompok4';

$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
    die ("Error connecting");
}