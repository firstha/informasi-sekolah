<?php include '../session_check.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include '../header.php'; ?>

<div class="container mt-4">
  <div class="card shadow-sm p-4 bg-white rounded">
    <h4 class="mb-4">Tambah Guru</h4>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Nama Guru</label>
        <input type="text" name="nama_guru" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Mata Pelajaran</label>
        <input type="text" name="mapel" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Kelas</label>
        <select name="id_kelas" class="form-control" required>
          <option value="">- Wali Kelas -</option>
          <?php
          $kelas = mysqli_query($conn, "SELECT * FROM kelas");
          while ($k = mysqli_fetch_assoc($kelas)) {
            echo "<option value='{$k['id_kelas']}'>{$k['tingkat_kelas']}</option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="gambar" class="form-control">
      </div>
      <button name="simpan" class="btn btn-sm btn-info me-2">Simpan</button>
      <a href="index.php" class="btn btn-sm btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
      $nama = $_POST['nama_guru'];
      $mapel = $_POST['mapel'];
      $kelas = $_POST['id_kelas'];

      // up gambar
      $gambar = $_FILES['gambar']['name'];
      $tmp = $_FILES['gambar']['tmp_name'];
      if (!empty($gambar)) {
        $ext = pathinfo($gambar, PATHINFO_EXTENSION);
        $nama_file = uniqid() . '.' . $ext;
        move_uploaded_file($tmp, "../img/$nama_file");
      } else {
        $nama_file = "";
      }

      mysqli_query($conn, "INSERT INTO guru (nama_guru, mapel, id_kelas, gambar) VALUES ('$nama', '$mapel', '$kelas', '$nama_file')");
      echo "<script>location='index.php';</script>";
    }
    ?>
  </div>
</div>

<?php include '../footer.php'; ?>
