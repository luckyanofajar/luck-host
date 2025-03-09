<?php
include('../../assets/koneksi.php');

$host = "localhost";
$user = "root"; // XAMPP default user
$pass = ""; // Kosongkan jika tidak pakai password
$db   = "myint_db"; // Ganti dengan nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mys());
}
?>