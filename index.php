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


// query untuk mengambil jumlah user
$query = "SELECT COUNT(*) AS total_user FROM users";
$hasil = mysqli_query($koneksi, $query);

// cek hasil query
if (!$hasil) {
  echo "Error: " . mysqli_error($koneksi);
}

// ambil data jumlah user
$data = mysqli_fetch_assoc($hasil);
$jumlah_user = $data['total_user'];

// tampilkan jumlah user
echo "Jumlah user: " . $jumlah_user;

// tutup koneksi
mysqli_close($koneksi);