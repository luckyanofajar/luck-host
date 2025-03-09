<?php
include('../../test_koneksi.php'); // Sesuaikan path sesuai lokasi koneksi.php

if ($conn) {
    echo "Koneksi berhasil!";
} else {
    echo "Koneksi gagal!";
}
?>