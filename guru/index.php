<?php include '../session_check.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include '../header.php'; ?>

<div class="container mt-4">
    <div class="card shadow-sm p-4 bg-white rounded">
        <h4 class="mb-4">Data Guru</h4>
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="tambah.php" class="btn btn-sm btn-info">+ Tambah Guru</a>
            <input type="text" id="search" class="form-control" placeholder="Cari guru..." style="width: 30%;">
        </div>

        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center;">
                    <th width="5%">No</th>
                    <th>Foto</th>
                    <th>Nama Guru</th>
                    <th>Mapel</th>
                    <th>Wali Kelas</th>
                    <th width="20%">OPSI</th>
                </tr>
            </thead>
            <tbody id="guru-data">
                <?php
                $result = mysqli_query($conn, "SELECT guru.*, kelas.tingkat_kelas FROM guru LEFT JOIN kelas ON guru.id_kelas = kelas.id_kelas ORDER BY guru.id_guru DESC");
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <?php if (!empty($row['gambar'])) { ?>
                            <img src="../img/<?= $row['gambar']; ?>" alt="Foto" style="height:60px; object-fit:cover;">
                        <?php } else { ?>
                            <span>-</span>
                        <?php } ?>
                    </td>
                    <td><?= $row['nama_guru']; ?></td>
                    <td><?= $row['mapel']; ?></td>
                    <td><?= $row['tingkat_kelas'] ? $row['tingkat_kelas'] : '-'; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id_guru']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="hapus.php?id=<?= $row['id_guru']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
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
            url: 'cari_guru.php',
            type: 'GET',
            data: { q: keyword },
            success: function(response) {
                $('#guru-data').html(response);
            }
        });
    });
});
</script>

<?php include '../footer.php'; ?>
