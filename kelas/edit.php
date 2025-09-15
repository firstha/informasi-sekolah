<?php include '../session_check.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include '../header.php'; ?>

<?php
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = $id"));
?>

<div class="container mt-4">
    <div class="card shadow-sm p-4 bg-white rounded">
        <h4 class="mb-4">Edit Kelas</h4>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Tingkat Kelas</label>
                <input type="text" name="tingkat_kelas" class="form-control" value="<?= $data['tingkat_kelas']; ?>" required>
            </div>
            <button class="btn btn-sm btn-info me-2" name="update">Update</button>
            <a href="index.php" class="btn btn-sm btn-secondary">Kembali</a>
        </form>

        <?php
        if (isset($_POST['update'])) {
            $tingkat = $_POST['tingkat_kelas'];
            mysqli_query($conn, "UPDATE kelas SET tingkat_kelas = '$tingkat' WHERE id_kelas = $id");
            echo "<script>location='index.php';</script>";
        }
        ?>
    </div>
</div>

<?php include '../footer.php'; ?>
