<?php
include '../session_check.php';
include '../koneksi.php';

$id = $_GET['id'];
$id_kelas = $_GET['id_kelas'];

mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa = $id");

header("Location: tampil.php?id_kelas=$id_kelas");
?>
