<?php
// Sambungkan ke database
include 'config.php';

// Periksa apakah form telah dikirim
if (isset($_POST['nisn'])) {
    $nisn = $_POST['nisn'];

    // Query untuk mencari siswa berdasarkan NISN
    $query = "SELECT * FROM siswa WHERE nisn = '$nisn'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $nama = $data['nama'];
        $status = $data['status']; // Lulus / Tidak Lulus

        echo "<h2>Hasil Pencarian</h2>";
        echo "<p>Nama: <strong>$nama</strong></p>";
        echo "<p>Status Kelulusan: <strong>$status</strong></p>";
    } else {
        echo "<p style='color:red;'>NISN tidak ditemukan!</p>";
    }
} else {
    echo "<p style='color:red;'>Masukkan NISN terlebih dahulu.</p>";
}
?>
