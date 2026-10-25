<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$kode = strtoupper(trim($_POST["kode_barang"] ?? ""));
$nama = trim($_POST["nama_barang"] ?? "");
$idKategori = (int) ($_POST["kategori"] ?? 0);
$jumlah = (int) ($_POST["jumlah"] ?? 0);
$kondisi = trim($_POST["kondisi"] ?? "");
$harga = (float) ($_POST["harga_satuan"] ?? 0);

if (
    $kode == "" || $nama == "" || $idKategori <= 0 ||
    $jumlah <= 0 || $harga < 0 || $kondisi == ""
) {
    die("Data tidak valid. Silakan periksa formulir.");
}

if (!preg_match('/^BRG-\d+$/', $kode)) {
    die("Format kode barang harus BRG-001.");
}

try {
    // Memastikan ID kategori tersedia
    $cek = $pdo->prepare(
        "SELECT id_kategori FROM kategori WHERE id_kategori = ?"
    );
    $cek->execute([$idKategori]);

    if (!$cek->fetch()) {
        die("Kategori tidak ditemukan di database.");
    }

    // Menyimpan barang
    $sql = "INSERT INTO barang
            (kode_barang, nama_barang, id_kategori, jumlah, kondisi, harga_satuan)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $kode,
        $nama,
        $idKategori,
        $jumlah,
        $kondisi,
        $harga
    ]);

    header("Location: index.php?status=berhasil#barang");
    exit;

} catch (PDOException $e) {
    die("Gagal menyimpan data: " . $e->getMessage());
}
?>