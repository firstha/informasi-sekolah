<?php include '../session_check.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include '../header.php'; ?>

<?php
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM guru WHERE id_guru = $id"));
?>

<div class="container mt-4">
  <div class="card shadow-sm p-4 bg-white rounded">
    <h4 class="mb-4">Edit Guru</h4>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Nama Guru</label>
        <input type="text" name="nama_guru" class="form-control" value="<?= $data['nama_guru']; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Mata Pelajaran</label>
        <input type="text" name="mapel" class="form-control" value="<?= $data['mapel']; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Wali Kelas</label>
        <select name="id_kelas" class="form-control" required>
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
        <label class="form-label">Foto Saat Ini</label><br>
        <?php if ($data['gambar']) { ?>
          <img src="../img/<?= $data['gambar']; ?>" alt="Foto" height="80">
        <?php } else { echo "-"; } ?>
      </div>
      <div class="mb-3">
        <label class="form-label">Ganti Foto</label>
        <input type="file" name="gambar" class="form-control">
      </div>
      <button name="update" class="btn btn-sm btn-info me-2">Update</button>
      <a href="index.php" class="btn btn-sm btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
      $nama = $_POST['nama_guru'];
      $mapel = $_POST['mapel'];
      $kelas = $_POST['id_kelas'];
      $gambar = $_FILES['gambar']['name'];
      $tmp = $_FILES['gambar']['tmp_name'];

      if (!empty($gambar)) {
        $ext = pathinfo($gambar, PATHINFO_EXTENSION);
        $nama_file = uniqid() . '.' . $ext;
        move_uploaded_file($tmp, "../img/$nama_file");

        // hapus ft
        if ($data['gambar'] && file_exists("../img/" . $data['gambar'])) {
          unlink("../img/" . $data['gambar']);
        }

        // dg foto baru
        mysqli_query($conn, "UPDATE guru SET nama_guru='$nama', mapel='$mapel', id_kelas='$kelas', gambar='$nama_file' WHERE id_guru=$id");
      } else {
        // tnpa ubah foto
        mysqli_query($conn, "UPDATE guru SET nama_guru='$nama', mapel='$mapel', id_kelas='$kelas' WHERE id_guru=$id");
      }

      echo "<script>location='index.php';</script>";
    }
    ?>
  </div>
</div>

<?php include '../footer.php'; ?>
