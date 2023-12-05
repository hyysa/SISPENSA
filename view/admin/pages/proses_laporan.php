<?php
// Pastikan form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah data yang diperlukan telah diisi
    if (isset($_POST['nomor_laporan']) && isset($_POST['nama_pelapor']) && isset($_POST['email']) && isset($_POST['telepon']) && isset($_POST['judul_laporan']) && isset($_POST['tanggal']) && isset($_POST['status'])) {

        // Koneksi ke database, gantilah sesuai dengan konfigurasi database Anda
        $koneksi = mysqli_connect("localhost", "root", "", "sispensa");

        // Pastikan koneksi berhasil
        if (mysqli_connect_errno()) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        // Escape input untuk menghindari SQL Injection
        $nomor_laporan = mysqli_real_escape_string($koneksi, $_POST['nomor_laporan']);
        $nama_pelapor = mysqli_real_escape_string($koneksi, $_POST['nama_pelapor']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $telepon = mysqli_real_escape_string($koneksi, $_POST['telepon']);
        $judul_laporan = mysqli_real_escape_string($koneksi, $_POST['judul_laporan']);
        $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
        $status = mysqli_real_escape_string($koneksi, $_POST['status']);

        // Query untuk update data laporan
        $query = "UPDATE tb_laporan SET 
                  nama_pelapor = '$nama_pelapor',
                  email = '$email',
                  telepon = '$telepon',
                  judul_laporan = '$judul_laporan',
                  tanggal = '$tanggal',
                  status = '$status'
                  WHERE nomor_laporan = $nomor_laporan";

        // Eksekusi query
        if (mysqli_query($koneksi, $query)) {
            echo "Data laporan telah berhasil diupdate.";
            header("Location: tables.php");
            exit();
        } else {
            echo "Gagal mengupdate data laporan: " . mysqli_error($koneksi);
        }

        // Tutup koneksi database
        mysqli_close($koneksi);
    } else {
        echo "Harap lengkapi semua data yang diperlukan.";
    }
}
