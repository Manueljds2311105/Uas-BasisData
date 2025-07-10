<?php
include '../config/db.php';
$query = mysqli_query($conn, "
    SELECT j.id_jadwal, mk.nama AS matkul, d.nama AS dosen, j.hari, j.jam, j.ruang
    FROM JadwalMengajar j
    JOIN Matakuliah mk ON j.kd_mk = mk.kd_mk
    JOIN Dosen d ON j.kd_ds = d.kd_ds
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Mengajar</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Jadwal Mengajar</h2>
<table>
    <tr><th>ID</th><th>Matakuliah</th><th>Dosen</th><th>Hari</th><th>Jam</th><th>Ruang</th></tr>
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $row['id_jadwal'] ?></td>
            <td><?= $row['matkul'] ?></td>
            <td><?= $row['dosen'] ?></td>
            <td><?= $row['hari'] ?></td>
            <td><?= $row['jam'] ?></td>
            <td><?= $row['ruang'] ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
