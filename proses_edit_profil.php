<?php
session_start();
include 'koneksi.php';

// tombol simpan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_SESSION['id_user'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $gambar = $_FILES['gambar']['name'];
    // up
    $query = "UPDATE users SET nama = '$nama'";
    // pw
    if (!empty($password)) {
        $password = md5($password); 
        $query .= ", password = '$password'"; 
    }
    // gambar up
    if (!empty($gambar)) {
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_path = 'img/' . $gambar;
        move_uploaded_file($gambar_tmp, $gambar_path); 
        $query .= ", gambar = '$gambar'"; 
    }
    // up
    $query .= " WHERE id_user = '$id_user'";

    if (mysqli_query($conn, $query)) {
        if (!empty($gambar)) {
            $_SESSION['gambar'] = $gambar;
        }
        $_SESSION['nama'] = $nama;
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

