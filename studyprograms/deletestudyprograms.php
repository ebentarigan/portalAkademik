<?php
include "../dbconfig.php";

$kodeprodi = $_GET["kodeProdi"];

// Mengecek apakah ada mahasiswa yang menggunakan kode prodi yang akan dihapus
$checkSql = "SELECT COUNT(*) as jumlah FROM students WHERE kodeProdi='$kodeprodi'";
$result = mysqli_query($conn, $checkSql);
$row = mysqli_fetch_assoc($result);

if ($row['jumlah'] > 0) {
    // Jika ada mahasiswa yang terdaftar dengan kode prodi tersebut, maka penghapusan gagal dilakukan
    $errorMsg = "Tidak dapat menghapus program studi dengan kode prodi " . $kodeprodi . " karena terdapat mahasiswa yang terdaftar.";
    header("location:index.php?errorMsg=$errorMsg");
} else {
    // Jika tidak ada mahasiswa, lanjutkan penghapusan
    $sqlStatement = "DELETE FROM studyprograms WHERE kodeProdi='$kodeprodi'";
    $query = mysqli_query($conn, $sqlStatement);
    if ($query) {
        $succesMsg = "Penghapusan data program studi dengan kode prodi " . $kodeprodi . " berhasil";
        header("location:index.php?successMsg=$succesMsg");
    }
}

mysqli_close($conn);
?>
