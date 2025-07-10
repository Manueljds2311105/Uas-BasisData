<?php
include '../config/db.php';
$query = mysqli_query($conn, "
    SELECT m.nim, m.nama, m.jk, m.tgl_lahir, m.jalan, m.kota, m.kodepos, m.no_hp, d.nama AS dosen_wali
    FROM Mahasiswa m
    LEFT JOIN Dosen d ON m.kd_ds = d.kd_ds
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Daftar Mahasiswa</h2>
<table>
    <tr>
        <th>NIM</th><th>Nama</th><th>JK</th><th>Tgl Lahir</th><th>Jalan</th>
        <th>Kota</th><th>Kode Pos</th><th>No HP</th><th>Dosen</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $row['nim'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['jk'] ?></td>
            <td><?= $row['tgl_lahir'] ?></td>
            <td><?= $row['jalan'] ?></td>
            <td><?= $row['kota'] ?></td>
            <td><?= $row['kodepos'] ?></td>
            <td><?= $row['no_hp'] ?></td>
            <td><?= $row['dosen_wali'] ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
