<?php include '../session_check.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include '../header.php'; ?>

<div class="container mt-4">
    <div class="card shadow-sm p-4 bg-white rounded">
        <h4 class="mb-4">Pilih Tingkat Kelas</h4>
        <form method="get" action="tampil.php">
            <div class="mb-3">
                <select name="id_kelas" class="form-control" required>
                    <option value="">- Pilih Kelas -</option>
                    <?php
                    $kelas = mysqli_query($conn, "SELECT * FROM kelas");
                    while ($row = mysqli_fetch_assoc($kelas)) {
                        echo "<option value='{$row['id_kelas']}'>{$row['tingkat_kelas']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <button class="btn btn-sm btn-info me-2">Tampilkan</button>
            </div>
        </form>
    </div>
</div>

<?php include '../footer.php'; ?>
