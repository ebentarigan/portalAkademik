<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "academic (1)";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}

// if (mysqli_connect("localhost", "root", "", "academic")) {
//     echo "Koneksi ke MySQL berhasil";
// } else {
//     // echo "Koneksi ke MySQL gagal";
//     echo mysqli_connect_error();
// }
