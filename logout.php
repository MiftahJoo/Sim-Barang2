<?php
session_start();

// Menghapus semua data session
session_destroy();

// Kembali ke halaman login
header("Location: login.php");
exit;
?>