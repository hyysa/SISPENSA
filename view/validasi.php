<?php
// Pastikan Anda telah melakukan koneksi ke database dengan benar (gunakan kode yang telah dibuat sebelumnya)
include "koneksi.php";

// Fungsi untuk mengamankan input dari pengguna
function sanitize_input($input)
{
    global $koneksi;
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    $input = mysqli_real_escape_string($koneksi, $input);
    return $input;
}

// Cek apakah ada data yang dikirim melalui metode POST (form telah disubmit)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi nomor laporan (tidak boleh kosong dan harus angka)
    $nomor_laporan = sanitize_input($_POST["nomor_laporan"]);
    if (empty($nomor_laporan)) {
        echo "Nomor Laporan tidak boleh kosong.";
    } elseif (!is_numeric($nomor_laporan)) {
        echo "Nomor Laporan harus berupa angka.";
    } else {
        // Lakukan penyimpanan data ke dalam tabel laporan jika validasi berhasil
        $nama_pelapor = sanitize_input($_POST["nama_pelapor"]);
        $telepon = sanitize_input($_POST["telepon"]);
        $email = sanitize_input($_POST["email"]);
        $alamat = sanitize_input($_POST["alamat"]);
        $judul_laporan = sanitize_input($_POST["judul_laporan"]);
        $isi_laporan = sanitize_input($_POST["isi_laporan"]);

        // Proses unggah file bukti tambahan
        $bukti_tambahan = $_FILES["bukti_tambahan"]["name"];
        $bukti_tambahan_tmp = $_FILES["bukti_tambahan"]["tmp_name"];

        // Tentukan direktori penyimpanan file yang diunggah (pastikan direktori ada dan dapat ditulisi)
        $target_dir = "upload/"; // Ubah sesuai dengan direktori yang diinginkan
        $target_file = $target_dir . basename($bukti_tambahan);

        // Pindahkan file bukti tambahan ke direktori yang ditentukan
        if (move_uploaded_file($bukti_tambahan_tmp, $target_file)) {
            // Query untuk menyimpan data ke dalam tabel laporan
            $query = "INSERT INTO tb_laporan (nomor_laporan, nama_pelapor, telepon, email, alamat, judul_laporan, isi_laporan, bukti_tambahan) 
                      VALUES ('$nomor_laporan', '$nama_pelapor', '$telepon', '$email', '$alamat', '$judul_laporan', '$isi_laporan', '$bukti_tambahan')";

            // Jalankan query
            if (mysqli_query($koneksi, $query)) {
                // Jika data berhasil disimpan, alihkan pengguna ke halaman cek pengaduan
                header("Location: cek_pengaduan.php");
                exit(); // Pastikan exit() digunakan setelah header() untuk menghentikan eksekusi script lebih lanjut
            } else {
                // Jika terjadi kesalahan saat menyimpan data
                echo "Terjadi kesalahan. Data gagal disimpan.";
            }
        } else {
            // Jika file bukti tambahan gagal diunggah
            echo "Gagal mengunggah file bukti tambahan.";
        }
    }
}
