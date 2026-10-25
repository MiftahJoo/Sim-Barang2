<?php
require_once "Barang.php";

// Membuat objek Barang
$barang1 = new Barang("BRG-001", "Laptop", 5);

// Menampilkan informasi barang
$barang1->tampilkanInfo();
?>