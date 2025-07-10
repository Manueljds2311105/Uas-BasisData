<?php
include '../config/db.php';
if (isset($_POST['submit'])) {
    $kd_ds = $_POST['kd_ds'];
    $nama  = $_POST['nama'];
    $sql = "INSERT INTO Dosen (kd_ds, nama) VALUES ('$kd_ds', '$nama')";
    mysqli_query($conn, $sql);
    echo "<p style='text-align:center;color:green;'>✔ Data Dosen berhasil disimpan.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Dosen</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="form-container">
  <h2>Form Tambah Dosen</h2>
  <form method="post">
    <label>Kode Dosen:</label>
    <input type="text" name="kd_ds" required>

    <label>Nama Dosen:</label>
    <input type="text" name="nama" required>

    <input type="submit" name="submit" value="Simpan">
  </form>
</div>
</body>
</html>
