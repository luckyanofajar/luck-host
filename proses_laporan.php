<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $lokasi = mysqli_real_escape_string($conn, $_POST['lokasi']);
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    // Debugging: Cek apakah data diterima
    echo "Nama: $nama <br>";
    echo "Lokasi: $lokasi <br>";
    echo "Jenis: $jenis <br>";
    echo "Deskripsi: $deskripsi <br>";

    // Cek apakah file foto ada
    $foto = "";
    if ($_FILES["foto"]["error"] == 0) {
        $target_dir = "uploads/";

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $foto = basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $foto;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            echo "File berhasil diunggah: $foto <br>";
        } else {
            echo "Gagal mengunggah file. <br>";
        }
    }

    // Cek apakah data bisa masuk ke database
    $sql = "INSERT INTO laporan (nama, lokasi, jenis, deskripsi, foto) 
            VALUES ('$nama', '$lokasi', '$jenis', '$deskripsi', '$foto')";

    if (mysqli_query($conn, $sql)) {
        echo "✅ Laporan berhasil dimasukkan ke database!";
    } else {
        echo "❌ Error SQL: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
