<?php
include "koneksi.php";
function e($s){ return htmlspecialchars($s, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'); }

if (!isset($_GET['id'])) { header("Location: index2.php"); exit; }
$id = (int)$_GET['id'];
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = trim($_POST['nim'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $prodi = trim($_POST['prodi'] ?? '');

    if (strlen($nim) < 5 || $nama === '' || $prodi === '') {
        $message = "⚠️ Validasi server: Isi dengan benar (NIM ≥ 5, Nama & Prodi tidak kosong).";
    } else {
        $stmt = $conn->prepare("UPDATE mahasiswa SET nim=?, nama=?, prodi=? WHERE id=?");
        $stmt->bind_param("sssi", $nim, $nama, $prodi, $id);
        if ($stmt->execute()) {
            header("Location: index2.php");
            exit;
        } else {
            $message = "❌ Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

// ambil data mahasiswa
$stmt = $conn->prepare("SELECT id, nim, nama, prodi FROM mahasiswa WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$data = $res->fetch_assoc() ?? null;
$stmt->close();

if (!$data) { echo "Data tidak ditemukan."; exit; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

  <div class="max-w-md w-full bg-white shadow-xl rounded-lg p-6">
    <div class="mb-4 flex justify-between items-center">
      <h3 class="text-2xl font-bold text-blue-700">Edit Mahasiswa</h3>
      <a href="index2.php" 
         class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
         ← Kembali
      </a>
    </div>

    <?php if ($message): ?>
      <p class="text-red-600 text-sm mb-4"><?= e($message) ?></p>
    <?php endif; ?>

    <form method="post" onsubmit="return validasi()" class="space-y-4">
      <div>
        <label for="nim" class="block font-semibold mb-1">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?= e($data['nim']) ?>" 
               class="border border-gray-300 px-3 py-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label for="nama" class="block font-semibold mb-1">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= e($data['nama']) ?>" 
               class="border border-gray-300 px-3 py-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label for="prodi" class="block font-semibold mb-1">Prodi:</label>
        <input type="text" id="prodi" name="prodi" value="<?= e($data['prodi']) ?>" 
               class="border border-gray-300 px-3 py-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <p id="pesan" class="text-red-600 text-sm"></p>

      <div class="flex justify-end">
        <input type="submit" value="Update"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
      </div>
    </form>
  </div>

  <script>
  function validasi() {
    let nim = document.querySelector("#nim").value.trim();
    let nama = document.querySelector("#nama").value.trim();
    let prodi = document.querySelector("#prodi").value.trim();
    const pes = document.querySelector("#pesan");

    if (nim.length < 5) {
      pes.innerHTML = "⚠️ NIM minimal 5 karakter!";
      return false;
    }
    if (nama === "" || prodi === "") {
      pes.innerHTML = "⚠️ Nama dan Prodi tidak boleh kosong!";
      return false;
    }
    pes.innerHTML = "";
    return true;
  }
  </script>

</body>
</html>
