<?php
// Konfigurasi database
$host = "redlock-db";
$username = "php_docker";
$password = "password";
$database = "redlock-db";

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa apakah koneksi berhasil
if (!$koneksi) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengeksekusi query SQL
$sql = "SELECT * FROM users";
$result = mysqli_query($koneksi, $sql);

// Memeriksa apakah query berhasil dieksekusi
if (!$result) {
  die("Query gagal dieksekusi: " . mysqli_error($koneksi));
}

// Menampilkan data hasil query
if (mysqli_num_rows($result) > 0) {
  echo "<table>";
  echo "<tr><th>ID</th><th>Nama</th><th>Alamat</th><th>Jabatan</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["ID"]."</td><td>".$row["nama"]."</td><td>".$row["alamat"]."</td><td>".$row["jabatan"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "Tidak ada data yang ditemukan";
}

// Menutup koneksi
mysqli_close($koneksi);