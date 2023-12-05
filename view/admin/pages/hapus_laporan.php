<?php
// Mengaktifkan session pada PHP
session_start();

// Cek apakah pengguna telah login atau belum
if (!isset($_SESSION["login"])) {
    // Jika belum login, alihkan ke halaman login
    header("Location: login.php");
    exit;
}

// Menghubungkan PHP dengan koneksi database
include '../../../view/koneksi.php';

// Cek apakah parameter nomor_laporan telah dikirimkan melalui URL
if (isset($_GET['nomor_laporan'])) {
    $nomor_laporan = $_GET['nomor_laporan'];

    // Proses penghapusan data berdasarkan nomor_laporan di database
    $query = "DELETE FROM tb_laporan WHERE nomor_laporan = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $nomor_laporan);
    mysqli_stmt_execute($stmt);

    // Periksa apakah data berhasil dihapus
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Jika berhasil dihapus, alihkan kembali ke halaman sebelumnya atau halaman lain yang sesuai
        header("Location: tables.php");
        exit;
    } else {
        // Jika data tidak ditemukan atau gagal dihapus, tampilkan pesan error atau informasi lain yang sesuai
        echo "Gagal menghapus data atau data tidak ditemukan.";
    }

    // Tutup statement dan koneksi database
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
}
