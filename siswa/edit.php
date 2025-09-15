<?php include '../session_check.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include '../header.php'; ?>

<?php
$id = $_GET['id'];
$id_kelas = $_GET['id_kelas'];
$kelas = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = $id_kelas"));
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = $id"));
?>

<div class="container mt-4">
  <div class="card shadow-sm p-4 bg-white rounded">
    <h4 class="mb-4">Edit Siswa</h4>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Nama Siswa</label>
        <input type="text" name="nama_siswa" class="form-control" value="<?= htmlspecialchars($data['nama_siswa']); ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Pindah Dari <?= $kelas['tingkat_kelas']; ?></label>
        <select name="id_kelas_baru" class="form-control" required>
          <?php
          $kelas = mysqli_query($conn, "SELECT * FROM kelas");
          while ($k = mysqli_fetch_assoc($kelas)) {
            $selected = ($k['id_kelas'] == $data['id_kelas']) ? "selected" : "";
            echo "<option value='{$k['id_kelas']}' $selected>{$k['tingkat_kelas']}</option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Foto</label><br>
        <?php if ($data['gambar']) : ?>
          <img src="../img/<?= $data['gambar']; ?>" alt="Foto" height="70" class="mb-2"><br>
        <?php endif; ?>
        <input type="file" name="gambar" class="form-control">
      </div>
      <button name="update" class="btn btn-sm btn-info me-2">Update</button>
      <a href="tampil.php?id_kelas=<?= $id_kelas ?>" class="btn btn-sm btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
      $nama = $_POST['nama_siswa'];
      $kelas_baru = $_POST['id_kelas_baru'];

      // upload gambar baru jika ada
      if (!empty($_FILES['gambar']['name'])) {
        $filename = date('YmdHis') . '_' . $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/$filename");
        mysqli_query($conn, "UPDATE siswa SET nama_siswa = '$nama', id_kelas = $kelas_baru, gambar = '$filename' WHERE id_siswa = $id");
      } else {
        mysqli_query($conn, "UPDATE siswa SET nama_siswa = '$nama', id_kelas = $kelas_baru WHERE id_siswa = $id");
      }

      echo "<script>location='tampil.php?id_kelas=$kelas_baru';</script>";
    }
    ?>
  </div>
</div>

<?php include '../footer.php'; ?>
