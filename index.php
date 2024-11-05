<?php
// Koneksi ke database
$host = 'localhost';
$dbname = 'pendaftaran_lomba';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Ambil data dari form
$nama = $_POST['nama'];
$usia = $_POST['usia'];
$cabang = $_POST['cabang'];

// Simpan data ke database
$sql = "INSERT INTO peserta (nama, usia, cabang) VALUES (:nama, :usia, :cabang)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['nama' => $nama, 'usia' => $usia, 'cabang' => $cabang]);

echo "Pendaftaran berhasil! Terima kasih, $nama.";
?>
