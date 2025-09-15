<?php
include 'session_check.php';
include 'koneksi.php';

$id_user = $_SESSION['id_user']; 
$query = mysqli_query($conn, "SELECT * FROM users WHERE id_user = '$id_user'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <div class="card shadow-sm p-4 bg-white rounded">
        <h4 class="mb-4">Edit Profil</h4>
        <form action="proses_edit_profil.php" method="POST" enctype="multipart/form-data">
            <div class="mb-2">
                <label for="username" class="form-label">Username <span style="font-size: 12px;">(tidak dapat diubah)</span></label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username']; ?>" readonly>
            </div>
            <div class="mb-2">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-2">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                <img src="img/<?php echo $data['gambar']; ?>" width="100" height="100" class="mt-3">
            </div>
            <button type="submit" class="btn btn-sm btn-info me-2">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-sm btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
