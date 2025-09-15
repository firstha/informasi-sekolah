<?php
include '../koneksi.php';

$q = isset($_GET['q']) ? mysqli_real_escape_string($conn, $_GET['q']) : '';

$sql = "SELECT * FROM kelas WHERE tingkat_kelas LIKE '%$q%' ORDER BY tingkat_kelas ASC";
$result = mysqli_query($conn, $sql);
$no = 1;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>" . ($no++) . "</td>
            <td>" . htmlspecialchars($row['tingkat_kelas']) . "</td>
            <td>
                <a href='edit.php?id=" . $row['id_kelas'] . "' class='btn btn-sm btn-warning'>Edit</a>
                <a href='hapus.php?id=" . $row['id_kelas'] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus data ini?')\">Hapus</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='3' class='text-center'>Tidak ada data ditemukan</td></tr>";
}
?>
