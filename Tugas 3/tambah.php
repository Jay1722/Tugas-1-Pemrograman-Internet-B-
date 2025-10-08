<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
  <div class="max-w-md w-full bg-white shadow-xl rounded-lg p-6">

    <!-- Tombol kembali ke index -->
    <div class="mb-4">
      <a href="index2.php" 
         class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
        ← Kembali ke Index
      </a>
    </div>

    <h3 class="text-2xl font-bold mb-6 text-center text-blue-700">Tambah Mahasiswa</h3>

    <form method="post" onsubmit="return validasi()" class="space-y-4">
      <div>
        <label class="block font-semibold mb-1">NIM:</label>
        <input type="text" id="nim" name="nim" 
               class="border border-gray-300 px-3 py-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>
      <div>
        <label class="block font-semibold mb-1">Nama:</label>
        <input type="text" id="nama" name="nama" 
               class="border border-gray-300 px-3 py-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>
      <div>
        <label class="block font-semibold mb-1">Prodi:</label>
        <input type="text" id="prodi" name="prodi" 
               class="border border-gray-300 px-3 py-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>
      <p id="pesan" class="text-red-600 text-sm"></p>

      <div class="flex justify-end">
        <input type="submit" name="simpan" value="Simpan"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
      </div>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
      $nim   = $_POST['nim'];
      $nama  = $_POST['nama'];
      $prodi = $_POST['prodi'];

      $sql = "INSERT INTO mahasiswa (nim, nama, prodi) VALUES ('$nim','$nama','$prodi')";
      if ($conn->query($sql) === TRUE) {
        echo "<p class='mt-4 text-green-600 font-semibold text-center'>✅ Data berhasil disimpan.</p>";
        echo "<div class='text-center mt-2'>
                <a href='index2.php' class='underline text-blue-600 hover:text-blue-800'>Kembali ke Index</a>
              </div>";
      } else {
        echo "<p class='mt-4 text-red-600 text-center'>❌ Error: " . $conn->error . "</p>";
      }
    }
    ?>
  </div>

  <script>
    function validasi() {
      let nim   = document.querySelector("#nim").value;
      let nama  = document.querySelector("#nama").value;
      let prodi = document.querySelector("#prodi").value;

      if (nim.length < 5) {
        document.querySelector("#pesan").innerHTML = "⚠️ NIM minimal 5 karakter!";
        return false;
      }
      if (nama === "" || prodi === "") {
        document.querySelector("#pesan").innerHTML = "⚠️ Nama dan Prodi tidak boleh kosong!";
        return false;
      }
      return true;
    }
  </script>
</body>
</html>

