<?php
include "dbconfig.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sqlStatement = "SELECT * FROM user WHERE username='$username'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);

if ($row == "") {
    $errMsg = "Username tidak terdaftar";
    header("location:login.php?errMsg=$errMsg");
} else {
    if (md5($password) == $row['password']) { // username dan password match
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        header("location:index.php");
    } else { // password salah
        $errMsg = "Password salah";
        header("location:login.php?errMsg=$errMsg");
    }
}
