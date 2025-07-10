<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Aplikasi Akademik Mini</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #eaf4ff, #ffffff);
      color: #333;
    }

    .container {
      max-width: 1000px;
      margin: 40px auto;
      padding: 30px;
    }

    h1 {
      text-align: center;
      font-size: 32px;
      color: #2d72d9;
      margin-bottom: 40px;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 20px;
    }

    .card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
      padding: 25px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: 2px solid transparent;
    }

    .card:hover {
      transform: translateY(-4px);
      border-color: #2d72d9;
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

    .card h3 {
      margin-top: 10px;
      color: #2d72d9;
      font-size: 20px;
    }

    .card a {
      display: inline-block;
      margin-top: 12px;
      text-decoration: none;
      color: #2d72d9;
      font-weight: bold;
    }

    .emoji {
      font-size: 38px;
    }

    .section {
      margin-top: 60px;
    }

    .section-title {
      font-size: 22px;
      color: #2d72d9;
      margin-bottom: 20px;
      border-left: 5px solid #2d72d9;
      padding-left: 10px;
    }

    @media screen and (max-width: 600px) {
      h1 {
        font-size: 24px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <h1>📘 Aplikasi Akademik Mini</h1>

  <div class="section">
    <div class="section-title">📄 Lihat Data</div>
    <div class="grid">
      <div class="card">
        <div class="emoji">👨‍🎓</div>
        <h3>Mahasiswa</h3>
        <a href="views/mahasiswa.php">Lihat Data</a>
      </div>
      <div class="card">
        <div class="emoji">👩‍🏫</div>
        <h3>Dosen</h3>
        <a href="views/dosen.php">Lihat Data</a>
      </div>
      <div class="card">
        <div class="emoji">📚</div>
        <h3>Matakuliah</h3>
        <a href="views/matakuliah.php">Lihat Data</a>
      </div>
      <div class="card">
        <div class="emoji">📅</div>
        <h3>Jadwal</h3>
        <a href="views/jadwal.php">Lihat Jadwal</a>
      </div>
      <div class="card">
        <div class="emoji">📝</div>
        <h3>KRS Mahasiswa</h3>
        <a href="views/krs.php">Lihat KRS</a>
      </div>
      <div class="card">
        <div class="emoji">📊</div>
        <h3>Laporan KRS</h3>
        <a href="views/laporan_krs.php">Lihat Laporan</a>
      </div>
    </div>
  </div>

  <div class="section">
  <div class="section-title">➕ Tambah Data</div>
  <div class="grid">
    <div class="card">
      <div class="emoji">👨‍🎓</div>
      <h3>Tambah Mahasiswa</h3>
      <a href="insert/insert_mahasiswa.php">Input Data</a>
    </div>
    <div class="card">
      <div class="emoji">👩‍🏫</div>
      <h3>Tambah Dosen</h3>
      <a href="insert/insert_dosen.php">Input Data</a>
    </div>
    <div class="card">
      <div class="emoji">📚</div>
      <h3>Tambah Matakuliah</h3>
      <a href="insert/insert_matakuliah.php">Input Data</a>
    </div>
  </div>
</div>

</body>
</html>
