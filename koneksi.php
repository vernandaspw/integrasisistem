<?php

$server = 'localhost';
$user = 'u206068608_integrasi';
$password = 'Merpati341';
$db = 'u206068608_integrasi';

$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
    die ("Error connecting");
}