<?php
// mengaktifkan sesi pada PHP
session_start();

// Hapus semua data sesi
session_unset();

// Hapus semua session cookie yang terkait dengan sesi
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Hancurkan sesi
session_destroy();

// Alihkan kembali ke halaman login setelah logout
header("Location: ../../login.php");
exit;
