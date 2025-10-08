<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    // Fungsi konfirmasi hapus
    function konfirmasiHapus(id) {
      if (confirm("Yakin ingin menghapus mahasiswa ini? Data nilai terkait juga akan dihapus!")) {
        window.location.href = "hapus.php?id=" + id;
      }
    }
  </script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <h3 class="text-2xl font-bold mb-4 text-center">Daftar Mahasiswa</h3>

    <div class="flex justify-between mb-4">
      <a href="tambah.php" 
         class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Mahasiswa</a>

      <input type="text" id="keyword" placeholder="Cari mahasiswa..." 
             class="border px-3 py-2 rounded w-1/2" />
    </div>

    <table class="w-full border border-gray-300">
      <thead class="bg-gray-200">
        <tr>
          <th class="border px-3 py-2">ID</th>
          <th class="border px-3 py-2">NIM</th>
          <th class="border px-3 py-2">Nama</th>
          <th class="border px-3 py-2">Prodi</th>
          <th class="border px-3 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody id="hasil">
        <?php
        $result = $conn->query("SELECT * FROM mahasiswa");
        while ($row = $result->fetch_assoc()) {
          echo "<tr class='hover:bg-gray-50'>
                  <td class='border px-3 py-2 text-center'>{$row['id']}</td>
                  <td class='border px-3 py-2'>{$row['nim']}</td>
                  <td class='border px-3 py-2'>{$row['nama']}</td>
                  <td class='border px-3 py-2'>{$row['prodi']}</td>
                  <td class='border px-3 py-2 text-center'>
                    <a href='edit.php?id={$row['id']}' 
                       class='bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600'>Edit</a>
                    <button onclick='konfirmasiHapus({$row['id']})'
                       class='bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700'>Hapus</button>
                    <a href='nilai_list.php?id={$row['id']}'
                       class='bg-green-600 text-white px-2 py-1 rounded hover:bg-green-700'>Nilai</a>
                  </td>
                </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Fitur pencarian AJAX -->
  <script>
  document.querySelector("#keyword").oninput = function() {
    let key = this.value;
    fetch("cari.php?keyword=" + key)
      .then(res => res.json())
      .then(data => {
        let isi = "";
        data.forEach(m => {
          isi += `<tr class='hover:bg-gray-50'>
                    <td class='border px-3 py-2 text-center'>${m.id}</td>
                    <td class='border px-3 py-2'>${m.nim}</td>
                    <td class='border px-3 py-2'>${m.nama}</td>
                    <td class='border px-3 py-2'>${m.prodi}</td>
                    <td class='border px-3 py-2 text-center'>
                      <a href='edit.php?id=${m.id}' 
                         class='bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600'>Edit</a>
                      <button onclick='konfirmasiHapus(${m.id})'
                         class='bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700'>Hapus</button>
                      <a href='nilai_list.php?id=${m.id}'
                         class='bg-green-600 text-white px-2 py-1 rounded hover:bg-green-700'>Nilai</a>
                    </td>
                  </tr>`;
        });
        document.querySelector("#hasil").innerHTML = isi;
      });
  };
  </script>
</body>
</html>
