<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");  // Redirect ke login jika belum login
    exit();
}

echo "Welcome to your Dashboard, " . $_SESSION['username'];
?>

<!-- Konten dashboard yang ingin ditampilkan -->
