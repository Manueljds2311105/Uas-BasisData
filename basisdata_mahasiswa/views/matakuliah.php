<?php
include '../config/db.php';
$query = mysqli_query($conn, "SELECT * FROM Matakuliah");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Matakuliah</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Daftar Matakuliah</h2>
<table>
    <tr><th>Kode MK</th><th>Nama</th><th>SKS</th></tr>
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $row['kd_mk'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['sks'] ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
