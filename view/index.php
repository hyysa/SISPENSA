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
    <!-- NAVBAR -->
    <div class="navbar bg-white text-black font-bold">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="/sispensa/view">Beranda</a></li>
                    <li><a href="pengaduan.php">Pengaduan</a></li>
                    <li><a href="cek_pengaduan.php">Cek Pengaduan</a></li>
                </ul>
            </div>
            <!-- <a class="btn btn-ghost normal-case text-xl" href="/sispensa/view">SISPENSA</a> -->
            <a class="" href="/sispensa/view">
                <img src="img/logo-sispensa2.png" alt="">
            </a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="/sispensa/view">Beranda</a></li>
                <li><a href="pengaduan.php">Pengaduan</a></li>
                <li><a href="cek_pengaduan.php">Cek Pengaduan</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <!-- <a class="btn" href="admin/index.php">Masuk Admin</a> -->
        </div>
    </div>

    <!-- Main Content -->
    <div class="hero min-h-screen" style="background-image: url(img/banner-beranda.png);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Selamat Datang di SISPENSA!</h1>
                <p class="mb-5">SISPENSA adalah sebuah sistem pengaduan online kejaksaan berbasis website.</p>
                <button class="btn btn-primary"><a href="pengaduan.php">Buat Pengaduan</a></button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer footer-center p-10 bg-base-200 text-base-content rounded">
        <div class="grid grid-flow-col gap-4">
            <a class="link link-hover" href="/sispensa/view">Beranda</a>
            <a class="link link-hover" href="pengaduan.php">Pengaduan</a>
            <a class="link link-hover" href="cek_pengaduan.php">Cek Pengaduan</a>
        </div>
        <div>
            <div class="grid grid-flow-col gap-4">
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
                    </svg></a>
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
                    </svg></a>
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
                    </svg></a>
            </div>
        </div>
        <div>
            <p>Copyright © 2023 - Tim 5</p>
        </div>
    </footer>
</body>

</html>