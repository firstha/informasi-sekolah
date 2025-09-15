<?php
include '../koneksi.php';

$q = isset($_GET['q']) ? mysqli_real_escape_string($conn, $_GET['q']) : '';

$sql = "SELECT guru.*, kelas.tingkat_kelas FROM guru 
        LEFT JOIN kelas ON guru.id_kelas = kelas.id_kelas
        WHERE guru.nama_guru LIKE '%$q%' OR guru.mapel LIKE '%$q%'
        ORDER BY guru.id_guru DESC";

$result = mysqli_query($conn, $sql);
$no = 1;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>" . ($no++) . "</td>
            <td>";
        if (!empty($row['gambar'])) {
            echo "<img src='../img/{$row['gambar']}' alt='Foto' style='height:60px; object-fit:cover;'>";
        } else {
            echo "<span>-</span>";
        }
        echo "</td>
            <td>" . htmlspecialchars($row['nama_guru']) . "</td>
            <td>" . htmlspecialchars($row['mapel']) . "</td>
            <td>" . ($row['tingkat_kelas'] ? $row['tingkat_kelas'] : '-') . "</td>
            <td>
                <a href='edit.php?id={$row['id_guru']}' class='btn btn-sm btn-warning'>Edit</a>
                <a href='hapus.php?id={$row['id_guru']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='6' class='text-center'>Tidak ada data ditemukan</td></tr>";
}
?>
