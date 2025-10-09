<?php
// Inisialisasi variabel
$nama = $email = $hp = $film = $jumlah = "";
$namaErr = $emailErr = $hpErr = $filmErr = $jumlahErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = trim($_POST["nama"]);
  if (empty($nama)) {
    $namaErr = "Nama wajib diisi";
  }

  $email = trim($_POST["email"]);
  if (empty($email)) {
    $emailErr = "Email wajib diisi";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Email wajib diisi";
  }

  $hp = trim($_POST["hp"]);
  if (empty($hp)) {
    $hpErr = "Nomor HP wajib diisi";
  } elseif (!ctype_digit($hp)) {
    $hpErr = "Nomor HP boleh nyah angka";
  }

  $film = $_POST["film"] ?? "";
  if (empty($film)) {
    $filmErr = "Pilih jenis film";
  }

  $jumlah = trim($_POST["jumlah"]);
  if (empty($jumlah)) {
    $jumlahErr = "Isi jumlah tiket";
  }

    // **********************  1  **************************
    // Tangkap nilai nama dari form
    // silakan taruh kode kalian di bawah
    

    // **********************  2  **************************
    // Tangkap nilai email dari form
    // silakan taruh kode kalian di bawah
    

    // **********************  3  **************************
    // Tangkap nilai NIM dari form
    // silakan taruh kode kalian di bawah
    

    // **********************  4  **************************
    // Tangkap nilai jurusan (dropdown)
    // silakan taruh kode kalian di bawah
    

    // **********************  5  **************************
    // Tangkap nilai alasan (textarea)
    // silakan taruh kode kalian di bawah
    
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <img src="EAD.png" alt="Logo EAD" class="logo">
  <h2>Form Pemesanan Tiket Bioskop</h2>
  <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label>Nama:</label>
    <input type="text" ID="nama" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $namaErr ? "* $namaErr" : ""; ?></span>

    <label>Email:</label>
    <input type="text" ID="email" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr ? "* $emailErr" : ""; ?></span>

    <label>Nomor HP:</label>
    <input type="text" ID="hp" name="hp" value="<?php echo $hp; ?>">
    <span class="error"><?php echo $hpErr ? "* $hpErr" : ""; ?></span>

    <label>Film:</label>
    <select id="film" name="film">
      <option value="">-- Pilih Film --</option>
      <option value="Incredible Cringek" <?php echo ($film == "Incrdible Cringek") ? "selected" : ""; ?>>Incredible Cringek</option>
      <option value="Medan Magnet Man" <?php echo ($film == "Medan Magnet Man") ? "selected" : ""; ?>>Medan Magnet Man</option>
      <option value="Wojak Indonesia" <?php echo ($film == "Wojak Indonesia") ? "selected" : ""; ?>>Wojak Indonesia</option>
    </select>
    <span class="error"><?php echo $filmErr ? "* $filmErr" : ""; ?></span>

    <label>Jumlah Tiket:</label>
    <textarea id="jumlah" name="jumlah"><?php echo $jumlah; ?></textarea>
    <span class="error"><?php echo $jumlahErr ? "* $alamatErr" : ""; ?></span>

    <button type="submit">Pesan Tiket</button>
  </form>

  <?php
  // **********************  6  **************************
  // Tampilkan hasil input dalam tabel + logo di atasnya jika semua valid
  // silakan taruh kode kalian di bawah
  
  ?>
</div>
</body>
</html>