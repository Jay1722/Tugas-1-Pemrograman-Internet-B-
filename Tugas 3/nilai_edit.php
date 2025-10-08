<?php
include "koneksi.php";
if (!isset($_GET['id']) || !isset($_GET['mhs'])) die("Data tidak lengkap.");

$nilai_id = intval($_GET['id']);
$mhs_id   = intval($_GET['mhs']);

// ambil data mahasiswa
$mhs = $conn->query("SELECT * FROM mahasiswa WHERE id=$mhs_id")->fetch_assoc();
if (!$mhs) die("Mahasiswa tidak ditemukan.");

// ambil data nilai
$stmt = $conn->prepare("SELECT * FROM nilai WHERE id=? AND mahasiswa_id=?");
$stmt->bind_param("ii", $nilai_id, $mhs_id);
$stmt->execute();
$nilai = $stmt->get_result()->fetch_assoc();
if (!$nilai) die("Nilai tidak ditemukan.");

if (isset($_POST['update'])) {
    $mk   = $_POST['mata_kuliah'];
    $sks  = intval($_POST['sks']);
    $huruf = $_POST['nilai_huruf'];
    $angka = 0.00;

    if ($huruf == "A") $angka = 4.00;
    elseif ($huruf == "B") $angka = 3.00;
    elseif ($huruf == "C") $angka = 2.00;
    elseif ($huruf == "D") $angka = 1.00;
    else $angka = 0.00;

    $upd = $conn->prepare("UPDATE nilai SET mata_kuliah=?, sks=?, nilai_huruf=?, nilai_angka=? WHERE id=? AND mahasiswa_id=?");
    $upd->bind_param("sisdii", $mk, $sks, $huruf, $angka, $nilai_id, $mhs_id);

    if ($upd->execute()) {
        header("Location: nilai_list.php?id=$mhs_id");
        exit;
    } else {
        echo "Error: " . $upd->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Nilai <?= $mhs['nama']; ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6">
    <h3 class="text-xl font-bold mb-4">Edit Nilai untuk <?= $mhs['nama']; ?></h3>

    <form method="post" class="space-y-4">
      <div>
        <label class="block">Mata Kuliah:</label>
        <input type="text" name="mata_kuliah" value="<?= $nilai['mata_kuliah']; ?>" 
               class="border px-3 py-2 rounded w-full">
      </div>
      <div>
        <label class="block">SKS:</label>
        <input type="number" name="sks" value="<?= $nilai['sks']; ?>" 
               class="border px-3 py-2 rounded w-full" min="1" max="6">
      </div>
      <div>
        <label class="block">Nilai Huruf:</label>
        <select name="nilai_huruf" class="border px-3 py-2 rounded w-full">
          <option value="A" <?= $nilai['nilai_huruf']=="A"?"selected":""; ?>>A</option>
          <option value="B" <?= $nilai['nilai_huruf']=="B"?"selected":""; ?>>B</option>
          <option value="C" <?= $nilai['nilai_huruf']=="C"?"selected":""; ?>>C</option>
          <option value="D" <?= $nilai['nilai_huruf']=="D"?"selected":""; ?>>D</option>
          <option value="E" <?= $nilai['nilai_huruf']=="E"?"selected":""; ?>>E</option>
        </select>
      </div>
      <input type="submit" name="update" value="Update" 
             class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
      <a href="nilai_list.php?id=<?= $mhs_id ?>" 
         class="ml-2 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Kembali</a>
    </form>
  </div>
</body>
</html>
