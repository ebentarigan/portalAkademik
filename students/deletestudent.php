<?php
include "../dbconfig.php";

$nim = $_GET["nim"];

$sqlStatement = "DELETE FROM students WHERE nim='$nim'";
$query = mysqli_query($conn, $sqlStatement);
$row =mysqli_fetch_assoc($query);

$sqlStatement = "DELETE FROM students WHERE nim='$nim'";
$query = mysqli_query($conn, $sqlStatement);

if ($query) {
    unlink("../images/".$row['foto']);
    $succesMsg = "Penghapusan data mahasiswa dengan NIM " . $nim . " berhasil";
    header("location:index.php?successMsg=$succesMsg");
}

mysqli_close($conn);
