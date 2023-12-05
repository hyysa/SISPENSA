<!DOCTYPE html>
<html data-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/ico" href="img/icon-sispensa.png">
  <title>SISPENSA - Sistem Pengaduan Kejaksaan</title>
  <link rel="stylesheet" href="../dist/styles.css" />
</head>

<body bgcolor="ghostwhite">
  <!-- NAVBAR -->
  <nav class="navbar bg-white text-black font-bold">
    <div class="navbar-start">
      <div class="dropdown">
        <button tabindex="0" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </button>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
          <li><a href="/sispensa/view">Beranda</a></li>
          <li><a href="pengaduan.php">Pengaduan</a></li>
          <li><a href="cek_pengaduan.php">Cek Pengaduan</a></li>
        </ul>
      </div>
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
  </nav>

  <!-- Main Content -->
  <?php $nomor_pesanan = mt_rand(00000, 99999); ?>
  <div class="min-h-screen p-10 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
      <div>
        <div class="bg-white rounded shadow-lg p-4 md:p-8 mb-6">
          <div class="grid gap-4 gap-y-2 text-sm lg:grid-cols-3 mt-6">
            <div class="text-gray-600">
              <p class="text-2xl font-semibold mb-2">Form Pengaduan</p>
              <p>Masukkan data diri, tujuan laporan, dan bukti laporan atau berkas.</p>
              <br>
              <hr>
            </div>
            <form action="validasi.php" method="POST" enctype="multipart/form-data">
              <div class="lg:col-span-2">
                <div class="grid gap-4 gap-y-2 text-sm md:grid-cols-2">
                  <div>
                    <label for="nomor_laporan" class="block mb-1">No. Laporan</label>
                    <input type="text" name="nomor_laporan" id="nomor_laporan" class="border mt-1 rounded px-4 py-2 w-full bg-gray-50" value="<?php echo "$nomor_pesanan"; ?>" readonly />
                  </div>
                  <div>
                    <label for="nama_pelapor" class="block mb-1">Nama Pelapor</label>
                    <input type="text" name="nama_pelapor" id="nama_pelapor" class="border mt-1 rounded px-4 py-2 w-full bg-gray-50" value="" placeholder="Nama Lengkap" required />
                  </div>
                  <div>
                    <label for="telepon" class="block mb-1">No. Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="border mt-1 rounded px-4 py-2 w-full bg-gray-50" value="" placeholder="08123xxxxxxx" required />
                  </div>
                  <div>
                    <label for="email" class="block mb-1">Email</label>
                    <input type="text" name="email" id="email" class="border mt-1 rounded px-4 py-2 w-full bg-gray-50" value="" placeholder="email@domain.com" required />
                  </div>
                  <div>
                    <label for="alamat" class="block mb-1">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="border mt-1 rounded px-4 py-2 w-full bg-gray-50" value="" placeholder="Alamat" required />
                  </div>
                  <div>
                    <label for="judul_laporan" class="block mb-1">Judul</label>
                    <input type="text" name="judul_laporan" id="judul_laporan" class="border mt-1 rounded px-4 py-2 w-full bg-gray-50" value="" placeholder="Judul atau Tujuan Laporan" required />
                  </div>
                  <div class="col-span-2">
                    <label for="isi_laporan" class="block mb-1">Isi Laporan</label>
                    <textarea name="isi_laporan" id="isi_laporan" class="border mt-1 rounded px-4 py-2 w-full bg-gray-50" placeholder="Tulis laporan Anda di sini" required></textarea>
                  </div>
                  <div class="col-span-2">
                    <label for="bukti_tambahan" class="block mb-1">Bukti Tambahan</label>
                    <input type="file" name="bukti_tambahan" class="file-input file-input-bordered w-full max-w-xs" />
                    <p class="italic">*) Wajib menambahkan bukti untuk laporan</p>
                  </div>
                  <div class="col-span-2 text-right">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
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