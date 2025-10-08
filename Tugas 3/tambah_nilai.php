<?php
include "koneksi.php";
if (!isset($_GET['mhs'])) die("Mahasiswa tidak dipilih.");
$mhs_id = intval($_GET['mhs']);

$mhs = $conn->query("SELECT * FROM mahasiswa WHERE id=$mhs_id")->fetch_assoc();
if (!$mhs) die("Mahasiswa tidak ditemukan.");

if (isset($_POST['simpan'])) {
    $mk   = $_POST['mata_kuliah'];
    $sks  = intval($_POST['sks']);
    $huruf = $_POST['nilai_huruf'];
    $angka = 0.00;

    if ($huruf == "A") $angka = 4.00;
    elseif ($huruf == "B") $angka = 3.00;
    elseif ($huruf == "C") $angka = 2.00;
    elseif ($huruf == "D") $angka = 1.00;
    else $angka = 0.00;

    $stmt = $conn->prepare("INSERT INTO nilai (mahasiswa_id, mata_kuliah, sks, nilai_huruf, nilai_angka) VALUES (?,?,?,?,?)");
    $stmt->bind_param("isiss", $mhs_id, $mk, $sks, $huruf, $angka);
    if ($stmt->execute()) {
        header("Location: nilai_list.php?id=$mhs_id");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Nilai <?= $mhs['nama']; ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6">
    <h3 class="text-xl font-bold mb-4">Tambah Nilai untuk <?= $mhs['nama']; ?></h3>

    <form method="post" onsubmit="return validasi()" class="space-y-4">
      <div>
        <label class="block">Mata Kuliah:</label>
        <input type="text" id="mk" name="mata_kuliah" class="border px-3 py-2 rounded w-full">
      </div>
      <div>
        <label class="block">SKS:</label>
        <input type="number" id="sks" name="sks" class="border px-3 py-2 rounded w-full" min="1" max="6">
      </div>
      <div>
        <label class="block">Nilai Huruf:</label>
        <select id="huruf" name="nilai_huruf" class="border px-3 py-2 rounded w-full">
          <option value="">Pilih...</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="E">E</option>
        </select>
      </div>
      <p id="pesan" class="text-red-600"></p>
      <input type="submit" name="simpan" value="Simpan" 
             class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
      <a href="nilai_list.php?id=<?= $mhs_id ?>" 
         class="ml-2 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Kembali</a>
    </form>
  </div>

  <script>
    function validasi() {
      let mk = document.querySelector("#mk").value;
      let sks = document.querySelector("#sks").value;
      let huruf = document.querySelector("#huruf").value;

      if (mk === "" || sks === "" || huruf === "") {
        document.querySelector("#pesan").innerHTML = "Semua field wajib diisi!";
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
