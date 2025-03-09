<?php
// Pastikan path ke koneksi.php benar
include('../../../koneksi.php');

// Cek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query ke database
$query = "SELECT * FROM laporan ORDER BY id DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error dalam query: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Laporan</title>
    <link rel="stylesheet" href="myint/MODERNA/apasih/assets/css/main.css"> <!-- Sesuaikan path jika perlu -->
</head>
<body>
    <div class="container">
        <h2>Daftar Laporan Kerusakan</h2>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Jenis</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['lokasi']) . "</td>";
                echo "<td>" . htmlspecialchars($row['jenis']) . "</td>";
                echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";

                // Cek apakah ada foto
                $fotoPath = "../../uploads/" . $row['foto'];
                if (!empty($row['foto']) && file_exists($fotoPath)) {
                    echo "<td><img src='$fotoPath' width='100'></td>";
                } else {
                    echo "<td>Tidak ada foto</td>";
                }

                // Tombol hapus dengan konfirmasi
                echo "<td><a href='hapus_laporan.php?id=" . $row['id'] . "' onclick='return confirm(\"Hapus laporan ini?\")'>Hapus</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>