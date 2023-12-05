<?php
// Pastikan Anda telah melakukan koneksi ke database dengan benar (gunakan kode yang telah dibuat sebelumnya)
include "koneksi.php";

// Query untuk mengambil data dari tabel laporan
$query = "SELECT nomor_laporan, judul_laporan, tanggal, status FROM tb_laporan";
$result = mysqli_query($koneksi, $query);

// Ambil semua baris data dari hasil query sebagai array
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html data-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/ico" href="img/icon-sispensa.png">
    <title>SISPENSA - Sistem Pengaduan Kejaksaan</title>
    <link rel="stylesheet" href="../dist/styles.css" />
    <!--Regular Datatables CSS-->
    <link href="../dist/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="../dist/responsive.dataTables.min.css" rel="stylesheet">
    <style>
        /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }
    </style>
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
            <!-- <a class="btn btn-ghost normal-case text-xl" href="/sispensa/view">SISPENSA</a> -->
            <a href="/sispensa/view">
                <img src=" img/logo-sispensa2.png" alt="">
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
    <div class="min-h-screen p-10 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <div class="bg-white rounded shadow-lg p-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm lg:grid-cols-3 mt-6">
                        <div class="text-gray-600">
                            <p class="text-2xl font-semibold mb-2">Tabel Pengaduan</p>
                            <hr>
                            <br>
                            <table id="example" class="cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                <thead>
                                    <tr>
                                        <th data-priority="1">No. Laporan</th>
                                        <th data-priority="2">Judul Laporan</th>
                                        <th data-priority="3">Tanggal</th>
                                        <th data-priority="4">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Loop menggunakan foreach untuk menampilkan data dari database
                                    foreach ($data as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['nomor_laporan'] . "</td>";
                                        echo "<td>" . $row['judul_laporan'] . "</td>";
                                        echo "<td>" . $row['tanggal'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
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

<!-- Inisialisasi DataTables pada tabel -->
<!-- jQuery -->
<script type="text/javascript" src="../dist/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="../dist/jquery.dataTables.min.js"></script>
<script src="../dist/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {

        var table = $('#example').DataTable({
                responsive: true
            })
            .columns.adjust()
            .responsive.recalc();
    });
</script>

</html>