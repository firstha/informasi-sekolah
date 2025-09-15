<?php
include '../session_check.php';
include '../koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM guru WHERE id_guru = $id");

header("Location: index.php");
?>
