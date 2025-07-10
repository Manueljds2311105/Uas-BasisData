<?php
include '../config/db.php';
$query = mysqli_query($conn, "
    SELECT k.id_krs, m.nama AS mahasiswa, mk.nama AS matkul, k.semester, IFNULL(k.nilai, 'Belum dinilai') AS nilai
    FROM KRSMahasiswa k
    JOIN Mahasiswa m ON k.nim = m.nim
    JOIN Matakuliah mk ON k.kd_mk = mk.kd_mk
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data KRS</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Data KRS Mahasiswa</h2>
<table>
    <tr><th>ID KRS</th><th>Mahasiswa</th><th>Matakuliah</th><th>Semester</th><th>Nilai</th></tr>
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $row['id_krs'] ?></td>
            <td><?= $row['mahasiswa'] ?></td>
            <td><?= $row['matkul'] ?></td>
            <td><?= $row['semester'] ?></td>
            <td><?= $row['nilai'] ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
