<?php
session_start();

// Fungsi untuk melakukan redirect ke halaman login
function redirect_to_login()
{
    header('Location: sispensa/view/login.php');
    exit;
}

// Cek apakah pengguna sudah login sebelumnya
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    // Jika pengguna belum login, arahkan ke halaman login
    redirect_to_login();
}

// Jika pengguna sudah login, lanjutkan ke halaman yang diminta
// Misalnya, jika URL mengandung "sispensa/view/admin", akan diarahkan ke halaman "dashboard.php"
if (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'sispensa/view/admin') !== false) {
    header('Location: sispensa/view/admin/pages/dashboard.php');
    exit;
}
