<?php
session_start();
include '../koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']); 

$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

if (!$query) {
    die("Query Error: " . mysqli_error($conn));
}

$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama']; 
    $_SESSION['username'] = $data['username'];
    $_SESSION['gambar'] = $data['gambar'];
    header("Location: ../index.php");
} else {
    echo "<script>alert('Login gagal! Username atau password salah'); window.history.back();</script>";
}
?>
