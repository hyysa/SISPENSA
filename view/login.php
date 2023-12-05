<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';
error_reporting(0);
if (isset($_POST['login'])) {
    // menangkap data yang dikirim dari form login
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the query using prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM petugas WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // cek email
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // compare hashed password
        if (password_verify($password, $row['password'])) {
            // buat session login dan level
            $_SESSION['email'] = $email;
            $_SESSION['level'] = $row['level'];
            $_SESSION['login'] = true;
            // alihkan ke halaman dashboard sesuai level
            if ($row['level'] == "admin") {
                header('location: admin/pages/dashboard.php');
                exit;
            } else if ($row['level'] == "petugas") {
                header('location: admin/pages/dashboard.php');
                exit;
            }
        } else {
            // Set a session variable to indicate the login error
            $_SESSION['login_error'] = "Email or password is incorrect.";
        }
    } else {
        // Set a session variable to indicate the login error
        $_SESSION['login_error'] = "Email or password is incorrect.";
    }

    // Redirect back to login.php with the error message
    header('location: login.php');
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="img/icon-sispensa.png">
    <title>SISPENSA - Sistem Pengaduan Kejaksaan</title>
    <link rel="stylesheet" href="../dist/styles.css">
</head>

<body>
    <!-- component -->
    <div class="bg-no-repeat bg-cover bg-center relative" style="background-image: url(img/banner-big.png);">
        <div class="absolute bg-gradient-to-b from-green-500 to-green-200 opacity-75 inset-0 z-0"></div>
        <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
            <div class="flex-col flex  self-center p-10 sm:max-w-5xl xl:max-w-2xl  z-10">
                <div class="self-start hidden lg:flex flex-col  text-white">
                    <img src="" class="mb-3">
                    <h1 class="mb-3 font-bold text-5xl">Hai, Selamat Datang Admin! </h1>
                    <p class="pr-3">SISPENSA adalah sebuah sistem pengaduan online kejaksaan berbasis website. Sistem ini bertujuan menampung aduan online dari masyarakat, sistem ini mengutamakan flexibilitas
                        dalam penggunaannya dan mempermudah bagi kejaksaan untuk merespon dan mengecek aduan masyarakat.
                    </p>
                </div>
            </div>
            <div class="flex justify-center self-center  z-10">
                <div class="p-12 bg-white mx-auto rounded-2xl w-100 ">
                    <div class="mb-4">
                        <?php
                        session_start();
                        if (isset($_SESSION['login_error'])) {
                            echo '<script>alert("' . $_SESSION['login_error'] . '");</script>';
                            unset($_SESSION['login_error']);
                        }
                        ?>
                        <h3 class="font-semibold text-2xl text-gray-800">Login </h3>
                        <p class="text-gray-500">Silahkan login ke akun Anda.</p>
                    </div>
                    <form action="" method="POST">
                        <div class="space-y-5">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                                <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="text" name="email" placeholder="mail@gmail.com" required>
                            </div>
                            <div class="space-y-2">
                                <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                                    Password
                                </label>
                                <input class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="text-sm">
                                    Hanya Petugas dan Admin yang dapat masuk.
                                </div>
                            </div>
                            <div>
                                <button type="submit" name="login" class="w-full flex justify-center bg-green-400  hover:bg-green-500 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                                    LOGIN
                                </button>
                                <br>
                                <a role="button" class="btn w-full flex justify-center bg-red-400 hover:bg-red-500 rounded-full" href="/sispensa/view">Kembali</a>
                            </div>
                        </div>
                    </form>
                    <div class="pt-5 text-center text-gray-400 text-xs">
                        <span>
                            Copyright © 2021-2022. TIM 5
                    </div>
                    <?php
                    // Tampilkan pesan error jika ada kesalahan dalam login
                    if (isset($_GET['error'])) {
                        $error = $_GET['error'];
                        if ($error == 1) {
                            echo '<p class="text-red-500">Password salah.</p>';
                        } else if ($error == 2) {
                            echo '<p class="text-red-500">Email tidak ditemukan.</p>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>