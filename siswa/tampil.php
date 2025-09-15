<?php include '../session_check.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include '../header.php'; ?>

<?php
$id_kelas = $_GET['id_kelas'];
$kelas = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = $id_kelas"));
$wali_kelas = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama_guru FROM guru WHERE id_kelas = $id_kelas"));
?>

<div class="container mt-4">
    <div class="card shadow-sm p-4 bg-white rounded">
        <h4 class="mb-4">Data Siswa - Kelas <?= $kelas['tingkat_kelas']; ?></h4>
        <div class="mb-3">
            <a href="tambah.php?id_kelas=<?= $id_kelas; ?>" class="btn btn-sm btn-info me-2">+ Tambah Siswa</a>
            <a href="index.php" class="btn btn-sm btn-secondary">Pilih Kelas Lain</a>
        </div>

        <?php if ($wali_kelas): ?>
            <p><strong>Wali Kelas: </strong><?= $wali_kelas['nama_guru']; ?></p>
        <?php else: ?>
            <p><strong>Wali Kelas: </strong>-</p>
        <?php endif; ?>

        <!-- cari -->
        <div class="d-flex justify-content-end mb-3">
            <input type="text" id="search" class="form-control" placeholder="Cari siswa..." style="width: 30%;">
        </div>

        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center;">
                    <th width="5%">No</th>
                    <th>Foto</th>
                    <th>Nama Siswa</th>
                    <th width="20%">OPSI</th>
                </tr>
            </thead>
            <tbody id="siswa-data">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM siswa WHERE id_kelas = $id_kelas");
                $no = 1;
                while ($siswa = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td style="text-align: center;">
                        <?php if ($siswa['gambar']) { ?>
                            <img src="../img/<?= $siswa['gambar']; ?>" alt="Foto" height="60">
                        <?php } else { echo "-"; } ?>
                    </td>
                    <td><?= $siswa['nama_siswa']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $siswa['id_siswa']; ?>&id_kelas=<?= $id_kelas ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="hapus.php?id=<?= $siswa['id_siswa']; ?>&id_kelas=<?= $id_kelas ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus siswa ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#search').on('input', function(){
        let keyword = $(this).val();
        let id_kelas = <?= $id_kelas ?>;

        $.ajax({
            url: 'cari_siswa.php',
            method: 'GET',
            data: {
                q: keyword,
                id_kelas: id_kelas
            },
            success: function(response){
                $('#siswa-data').html(response);
            }
        });
    });
});
</script>

<?php include '../footer.php'; ?>
