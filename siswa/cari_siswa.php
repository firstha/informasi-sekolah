<?php
include '../koneksi.php';

$id_kelas = isset($_GET['id_kelas']) ? (int)$_GET['id_kelas'] : 0;
$q = isset($_GET['q']) ? mysqli_real_escape_string($conn, $_GET['q']) : '';

$sql = "SELECT * FROM siswa 
        WHERE id_kelas = $id_kelas 
        AND nama_siswa LIKE '%$q%' 
        ORDER BY nama_siswa ASC";

$result = mysqli_query($conn, $sql);
$no = 1;

if (mysqli_num_rows($result) > 0) {
    while ($siswa = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td style='text-align: center;'>";
        if (!empty($siswa['gambar'])) {
            echo "<img src='../img/{$siswa['gambar']}' alt='Foto' height='60'>";
        } else {
            echo "-";
        }
        echo "</td>";
        echo "<td>" . htmlspecialchars($siswa['nama_siswa']) . "</td>";
        echo "<td>
                <a href='edit.php?id={$siswa['id_siswa']}&id_kelas={$id_kelas}' class='btn btn-sm btn-warning'>Edit</a>
                <a href='hapus.php?id={$siswa['id_siswa']}&id_kelas={$id_kelas}' class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus siswa ini?')\">Hapus</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4' class='text-center'>Tidak ada siswa ditemukan</td></tr>";
}
?>
