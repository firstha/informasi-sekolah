<?php include '../session_check.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include '../header.php'; ?>

<?php $id_kelas = $_GET['id_kelas'];
$kelas = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = $id_kelas")); ?>

<div class="container mt-4">
  <div class="card shadow-sm p-4 bg-white rounded">
    <h4 class="mb-4">Tambah Siswa di Kelas <?= $kelas['tingkat_kelas']; ?></h4>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Nama Siswa</label>
        <input type="text" name="nama_siswa" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Wali Kelas</label>
        <select name="id_guru" class="form-control" required>
          <?php
          $guru = mysqli_query($conn, "SELECT * FROM guru WHERE id_kelas = $id_kelas");
          while ($g = mysqli_fetch_assoc($guru)) {
            echo "<option value='{$g['id_guru']}'>{$g['nama_guru']}</option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="gambar" class="form-control" required>
      </div>
      <button name="simpan" class="btn btn-sm btn-info me-2">Simpan</button>
      <a href="tampil.php?id_kelas=<?= $id_kelas ?>" class="btn btn-sm btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
      $nama = $_POST['nama_siswa'];
      $guru = $_POST['id_guru'];

      // up file
      $filename = date('YmdHis') . '_' . $_FILES['gambar']['name'];
      $tmpname = $_FILES['gambar']['tmp_name'];
      move_uploaded_file($tmpname, "../img/$filename");

      mysqli_query($conn, "INSERT INTO siswa (nama_siswa, id_kelas, id_guru, gambar) VALUES ('$nama', $id_kelas, $guru, '$filename')");

      echo "<script>location='tampil.php?id_kelas=$id_kelas';</script>";
    }
    ?>
  </div>
</div>

<?php include '../footer.php'; ?>
