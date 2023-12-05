<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISPENSA - Sistem Pengaduan Kejaksaan</title>
    <link rel="stylesheet" href="../dist/styles.css">
</head>

<body>
    <!-- component -->
    <div class="bg-no-repeat bg-cover bg-center relative" style="background-image: url(img/banner-big.png);">
        <div class="absolute bg-gradient-to-b from-green-500 to-green-200 opacity-75 inset-0 z-0"></div>
        <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
            <div class="flex-col flex self-center p-10 sm:max-w-5xl xl:max-w-2xl z-10">
                <div class="self-start hidden lg:flex flex-col text-white">
                    <img src="" class="mb-3">
                    <h1 class="mb-3 font-bold text-5xl">Hai, Selamat Datang! </h1>
                    <p class="pr-3">SISPENSA adalah sebuah sistem pengaduan online kejaksaan berbasis website. Sistem ini bertujuan menampung aduan online dari masyarakat, sistem ini mengutamakan flexibilitas
                        dalam penggunaannya dan mempermudah bagi kejaksaan untuk merespon dan mengecek aduan masyarakat.
                    </p>
                </div>
            </div>
            <div class="flex justify-center self-center z-10">
                <div class="p-12 bg-white mx-auto rounded-2xl w-100 ">
                    <div class="mb-4">
                        <h3 class="font-semibold text-2xl text-gray-800">Daftar </h3>
                        <p class="text-gray-500">Silahkan isi data pendaftaran Anda.</p>
                    </div>
                    <div class="space-y-5">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 tracking-wide">Nama</label>
                            <input class="w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="text" placeholder="Nama lengkap">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                            <input class="w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="email" placeholder="mail@gmail.com">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 tracking-wide">No. Handphone</label>
                            <input class="w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="tel" placeholder="Nomor Handphone">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 tracking-wide">Password</label>
                            <input class="w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="password" placeholder="Masukkan password">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-sm">
                                Sudah Punya akun?
                                <a href="login.php" class="text-green-400 hover:text-green-500">
                                    Login.
                                </a>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="w-full flex justify-center bg-green-400 hover:bg-green-500 text-gray-100 p-3 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500">
                                DAFTAR
                            </button>
                            <br>
                            <a role="button" class="btn w-full flex justify-center bg-red-400 hover:bg-red-500 rounded-full" href="/sispensa/view">Kembali</a>
                        </div>
                    </div>
                    <div class="pt-5 text-center text-gray-400 text-xs">
                        <span>
                            &copy; 2021-2022. TIM 5
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>