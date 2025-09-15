<?php include '../session_check.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include '../header.php'; ?>

<div class="container mt-4">
    <div class="card shadow-sm p-4 bg-white rounded">
        <h4 class="mb-4">Data Kelas</h4>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="tambah.php" class="btn btn-sm btn-info">+ Tambah Kelas</a>
            <input type="text" id="search" class="form-control" placeholder="Cari kelas..." style="width: 30%;">
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Tingkat Kelas</th>
                    <th width="20%">OPSI</th>
                </tr>
            </thead>
            <tbody id="kelas-data">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM kelas");
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['tingkat_kelas']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id_kelas']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="hapus.php?id=<?= $row['id_kelas']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#search').on('input', function() {
        let keyword = $(this).val();
        $.ajax({
            url: 'cari_kelas.php',
            type: 'GET',
            data: { q: keyword },
            success: function(response) {
                $('#kelas-data').html(response);
            }
        });
    });
});
</script>

<?php include '../footer.php'; ?>
