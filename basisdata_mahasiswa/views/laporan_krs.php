<?php
include '../config/db.php';

$query = mysqli_query($conn, "
    SELECT 
        m.nim,
        m.nama AS nama_mhs,
        mk.nama AS nama_matkul,
        mk.sks,
        d.nama AS nama_dosen,
        j.hari,
        j.jam,
        IFNULL(k.nilai, 'Belum dinilai') AS nilai,
        NOW() AS dicetak
    FROM KRSMahasiswa k
    JOIN Mahasiswa m ON k.nim = m.nim
    JOIN Matakuliah mk ON k.kd_mk = mk.kd_mk
    JOIN JadwalMengajar j ON j.kd_mk = k.kd_mk AND j.kd_ds = k.kd_ds
    JOIN Dosen d ON j.kd_ds = d.kd_ds
    ORDER BY m.nama, mk.nama;
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan KRS Mahasiswa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Laporan Kartu Rencana Studi (KRS)</h2>
<p style="text-align:center;">Dicetak pada: <?= date("d M Y, H:i") ?></p>

<table>
    <tr>
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Matakuliah</th>
        <th>SKS</th>
        <th>Dosen</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>Nilai</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $row['nim'] ?></td>
            <td><?= $row['nama_mhs'] ?></td>
            <td><?= $row['nama_matkul'] ?></td>
            <td><?= $row['sks'] ?></td>
            <td><?= $row['nama_dosen'] ?></td>
            <td><?= $row['hari'] ?></td>
            <td><?= $row['jam'] ?></td>
            <td><?= $row['nilai'] ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
