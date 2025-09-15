<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: /data_sekolah_firstha/auth/login.php");
    exit;
}
?>
