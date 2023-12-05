<!DOCTYPE html>
<html>

<head>
  <title>Cetak Laporan</title>
  <!-- Masukkan link ke stylesheet Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <div class="w-full px-6 py-6 mx-auto">
    <!-- Tabel Laporan -->
    <div class="flex flex-wrap -mx-3">
      <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6 class="text-xl font-semibold">Tabel Data Pengaduan</h6>
          </div>
          <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-4 overflow-x-auto">
              <table id="dataTable" class="stripe hover" style="width: 100%; padding-top: 1em; padding-bottom: 1em;">
                <thead>
                  <tr>
                    <th data-priority="1">Nomor Laporan</th>
                    <th data-priority="2">Nama</th>
                    <th data-priority="3">Email</th>
                    <th data-priority="4">Telepon</th>
                    <th data-priority="5">Judul Laporan</th>
                    <th data-priority="6">Tanggal</th>
                    <th data-priority="7">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Koneksi ke database, sesuaikan dengan konfigurasi Anda
                  $koneksi = mysqli_connect("localhost", "root", "", "sispensa");

                  // Pastikan koneksi berhasil
                  if (mysqli_connect_errno()) {
                    die("Koneksi database gagal: " . mysqli_connect_error());
                  }

                  // Query untuk mengambil semua data laporan
                  $query = "SELECT * FROM tb_laporan";
                  $result = mysqli_query($koneksi, $query);

                  // Pastikan data ditemukan sebelum menampilkan data
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['nomor_laporan'] . "</td>";
                      echo "<td>" . $row['nama_pelapor'] . "</td>";
                      echo "<td>" . $row['email'] . "</td>";
                      echo "<td>" . $row['telepon'] . "</td>";
                      echo "<td>" . $row['judul_laporan'] . "</td>";
                      echo "<td>" . $row['tanggal'] . "</td>";
                      echo "<td>" . $row['status'] . "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='7'>Tidak ada data laporan.</td></tr>";
                  }

                  // Tutup koneksi database
                  mysqli_close($koneksi);
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Tombol untuk export data ke Excel -->
    <div class="mt-6">
      <button id="exportButton" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">Export to Excel</button>
    </div>
  </div>

  <!-- Script untuk library SheetJS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

  <script>
    // Fungsi untuk mengambil data dari tabel dan melakukan export ke Excel
    function exportToExcel() {
      // Ambil data dari tabel
      const table = document.getElementById('dataTable');
      const rows = table.getElementsByTagName('tr');

      // Buat variabel untuk menyimpan data
      const data = [];

      // Loop untuk mengambil data dari setiap baris tabel
      for (let i = 0; i < rows.length; i++) {
        const row = rows[i].getElementsByTagName('td');
        const rowData = [];

        // Loop untuk mengambil data dari setiap sel pada baris
        for (let j = 0; j < row.length; j++) {
          rowData.push(row[j].innerText);
        }

        data.push(rowData);
      }

      // Buat worksheet dengan data yang diambil dari tabel
      const worksheet = XLSX.utils.aoa_to_sheet(data);

      // Buat workbook dan tambahkan worksheet ke dalamnya
      const workbook = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');

      // Export data ke Excel dan simpan dalam format file
      const excelBuffer = XLSX.write(workbook, {
        bookType: 'xlsx',
        type: 'array'
      });
      const excelData = new Blob([excelBuffer], {
        type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      });
      const excelUrl = URL.createObjectURL(excelData);

      // Buat link untuk mengunduh file Excel
      const downloadLink = document.createElement('a');
      downloadLink.href = excelUrl;
      downloadLink.download = 'daftar_laporan.xlsx';
      downloadLink.click();
    }

    // Tambahkan event listener untuk tombol export
    document.getElementById('exportButton').addEventListener('click', exportToExcel);
  </script>
</body>

</html>