<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$kode = htmlspecialchars(trim($_POST["kode_barang"] ?? ""));
$nama = htmlspecialchars(trim($_POST["nama_barang"] ?? ""));
$kategori = htmlspecialchars(trim($_POST["kategori"] ?? ""));
$jumlah = (int) ($_POST["jumlah"] ?? 0);
$kondisi = htmlspecialchars(trim($_POST["kondisi"] ?? ""));
$harga = (float) ($_POST["harga_satuan"] ?? 0);

if ($kode === "" || $nama === "" || $kategori === "" || $kondisi === "" || $jumlah <= 0 || $harga < 0) {
    die("Data tidak valid. Silakan kembali dan periksa formulir.");
}

function hitungTotalAset($jumlah, $harga) {
    return $jumlah * $harga;
}

$totalAset = hitungTotalAset($jumlah, $harga);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Data Barang | SIM-Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>SIM-Barang</h1>
    <p>Sistem Informasi Manajemen Barang</p>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="index.php#barang">Data Barang</a></li>
        <li><a href="index.php#input">Input Barang</a></li>
    </ul>
</nav>

<main>
    <section id="ringkasan">
        <h2>Data Barang Berhasil Diproses</h2>
        <p>Data barang berhasil diterima dan diproses.</p>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Keterangan</th>
                        <th>Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kode Barang</td>
                        <td><?= $kode ?></td>
                    </tr>
                    <tr>
                        <td>Nama Barang</td>
                        <td><?= $nama ?></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td><?= $kategori ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Barang</td>
                        <td><?= $jumlah ?></td>
                    </tr>
                    <tr>
                        <td>Kondisi</td>
                        <td><?= $kondisi ?></td>
                    </tr>
                    <tr>
                        <td>Harga Satuan</td>
                        <td>Rp <?= number_format($harga, 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <th>Total Estimasi Nilai Aset</th>
                        <th>Rp <?= number_format($totalAset, 0, ',', '.') ?></th>
                    </tr>
                </tbody>
            </table>
        </div>

        <br>
        <a href="index.php" class="btn-kembali">Kembali ke Formulir</a>
    </section>
</main>

<footer>
    <p>&copy; 2026 SIM-Barang - Sistem Inventaris Jurusan</p>
</footer>

</body>
</html>