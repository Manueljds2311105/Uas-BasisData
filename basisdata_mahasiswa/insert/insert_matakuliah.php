<?php
include '../config/db.php';
if (isset($_POST['submit'])) {
    $kd_mk = $_POST['kd_mk'];
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];

    $sql = "INSERT INTO Matakuliah (kd_mk, nama, sks) VALUES ('$kd_mk', '$nama', $sks)";
    mysqli_query($conn, $sql);
    echo "<p style='text-align:center;color:green;'>✔ Data Matakuliah berhasil disimpan.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Matakuliah</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="form-container">
  <h2>Form Tambah Matakuliah</h2>
  <form method="post">
    <label>Kode MK:</label>
    <input type="text" name="kd_mk" required>

    <label>Nama Matakuliah:</label>
    <input type="text" name="nama" required>

    <label>Jumlah SKS:</label>
    <input type="number" name="sks" min="1" max="6" required>

    <input type="submit" name="submit" value="Simpan">
  </form>
</div>
</body>
</html>
