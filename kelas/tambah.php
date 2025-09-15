<?php include '../session_check.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include '../header.php'; ?>

<div class="container mt-4">
    <div class="card shadow-sm p-4 bg-white rounded">
        <h4 class="mb-4">Tambah Kelas</h4>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Tingkat Kelas</label>
                <input type="text" name="tingkat_kelas" class="form-control" required>
            </div>
            <button class="btn btn-sm btn-info me-2" name="simpan">Simpan</button>
            <a href="index.php" class="btn btn-sm btn-secondary">Kembali</a>
        </form>

        <?php
        if (isset($_POST['simpan'])) {
            $tingkat = $_POST['tingkat_kelas'];
            mysqli_query($conn, "INSERT INTO kelas (tingkat_kelas) VALUES ('$tingkat')");
            echo "<script>location='index.php';</script>";
        }
        ?>
    </div>
</div>

<?php include '../footer.php'; ?>
