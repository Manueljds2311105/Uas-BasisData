<?php
include '../config/db.php';
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jalan = $_POST['jalan'];
    $kota = $_POST['kota'];
    $kodepos = $_POST['kodepos'];
    $no_hp = $_POST['no_hp'];
    $kd_ds = $_POST['kd_ds'];

    $sql = "INSERT INTO Mahasiswa 
    (nim, nama, jk, tgl_lahir, jalan, kota, kodepos, no_hp, kd_ds)
    VALUES 
    ($nim, '$nama', '$jk', '$tgl_lahir', '$jalan', '$kota', '$kodepos', '$no_hp', '$kd_ds')";

    mysqli_query($conn, $sql);
    echo "<p style='text-align:center;color:green;'>✔ Data Mahasiswa berhasil disimpan.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Mahasiswa</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="form-container">
  <h2>Form Tambah Mahasiswa</h2>
  <form method="post">
    <label>NIM :</label>
    <input type="number" name="nim" required>

    <label>Nama Mahasiswa:</label>
    <input type="text" name="nama" required>

    <label>Jenis Kelamin:</label>
    <select name="jk" required>
      <option value="">-- Pilih --</option>
      <option value="L">Laki-laki</option>
      <option value="P">Perempuan</option>
    </select>

    <label>Tanggal Lahir:</label>
    <input type="date" name="tgl_lahir" required>

    <label>Jalan:</label>
    <input type="text" name="jalan" required>

    <label>Kota:</label>
    <input type="text" name="kota" required>

    <label>Kode Pos:</label>
    <input type="text" name="kodepos" required>

    <label>No HP:</label>
    <input type="text" name="no_hp" required>

    <label>Kode Dosen :</label>
    <input type="text" name="kd_ds" required>

    <input type="submit" name="submit" value="Simpan">
  </form>
</div>
</body>
</html>
