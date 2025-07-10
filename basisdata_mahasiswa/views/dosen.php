<?php
include '../config/db.php';
$query = mysqli_query($conn, "SELECT * FROM Dosen");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Dosen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Daftar Dosen</h2>
<table>
    <tr><th>Kode Dosen</th><th>Nama</th></tr>
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $row['kd_ds'] ?></td>
            <td><?= $row['nama'] ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
