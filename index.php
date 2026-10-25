<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM-Barang</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- HEADER -->
    <header>
        <h1>SIM-Barang</h1>
        <p>Sistem Informasi Manajemen Barang</p>
    </header>

    <!-- NAVBAR -->
    <nav>
        <ul>
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#barang">Data Barang</a></li>
            <li><a href="#input">Input Barang</a></li>
        </ul>
    </nav>

    <!-- MAIN CONTENT -->
    <main>

        <!-- SECTION BERANDA -->
        <section id="beranda">
            <h2>Selamat Datang di SIM-Barang</h2>
            <p>
                Aplikasi ini digunakan untuk mencatat,
                mengelola, dan memantau inventaris barang
                laboratorium dan jurusan.
            </p>
        </section>

        <!-- SECTION DATA BARANG -->
        <section id="barang">
            <h2>Data Inventaris Barang</h2>

            <input
                type="text"
                id="pencarian"
                placeholder="Cari barang..."
            >

           <div class="table-responsive"> 
            <table border="1">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>BRG-001</td>
                        <td>Laptop</td>
                        <td>Elektronik</td>
                        <td>10</td>
                        <td>Baik</td>
                    </tr>

                    <tr>
                        <td>BRG-002</td>
                        <td>Printer</td>
                        <td>Elektronik</td>
                        <td>5</td>
                        <td>Baik</td>
                    </tr>

                    <tr>
                        <td>BRG-003</td>
                        <td>Meja</td>
                        <td>Furniture</td>
                        <td>15</td>
                        <td>Baik</td>
                    </tr>
                </tbody>
            </table>
           </div>
        </section>

        <!-- SECTION INPUT BARANG -->
        <section id="input">
            <h2>Form Input Barang</h2>

            <form action="simpan.php" method="POST">

                <label for="kode">Kode Barang:</label>
                <input
                    type="text"
                    id="kode"
                    name="kode_barang"
                    placeholder="Contoh: BRG-004"
                    required
                >

                <br><br>

                <label for="nama">Nama Barang:</label>
                <input
                    type="text"
                    id="nama"
                    name="nama_barang"
                    placeholder="Masukkan nama barang"
                    required
                >

                <br><br>

                <label for="kategori">Kategori:</label>
                <select id="kategori" name="kategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Peralatan">Peralatan</option>
                </select>

                <br><br>

                <label for="jumlah">Jumlah Barang:</label>
                <input
                    type="number"
                    id="jumlah"
                    name="jumlah"
                    placeholder="Masukkan jumlah barang"
                    required
                >

                <br><br>

                <label for="kondisi">Kondisi:</label>
                <select id="kondisi" name="kondisi" required>
                    <option value="">Pilih Kondisi</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                </select>

                <br><br>

                <label for="harga">Harga Barang:</label>
                <input
                    type="number"
                    id="harga"
                    name="harga_satuan"
                    placeholder="Masukkan harga barang"
                    min="0"
                    required
                > 

                <button type="submit">Simpan Barang</button>

            </form>
        </section>

    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2026 SIM-Barang. Sistem Informasi Manajemen Barang.</p>
    </footer>

    <script src="main.js"></script>
</body>
</html>