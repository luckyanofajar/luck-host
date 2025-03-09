<?php
$host = "localhost";
$user = "root"; // Default user XAMPP
$pass = ""; // Default password kosong
$db   = "myint_db";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>