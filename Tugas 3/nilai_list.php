<?php
include "koneksi.php";

// Pastikan ada parameter id
if (!isset($_GET['id'])) die("Mahasiswa tidak ditemukan.");

// Ambil ID mahasiswa
$mhs_id = intval($_GET['id']);

// Ambil data mahasiswa
$stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id=?");
$stmt->bind_param("i", $mhs_id);
$stmt->execute();
$mhs = $stmt->get_result()->fetch_assoc();

if (!$mhs) die("Mahasiswa tidak ditemukan.");

// Ambil data nilai
$stmt_nilai = $conn->prepare("SELECT * FROM nilai WHERE mahasiswa_id=?");
$stmt_nilai->bind_param("i", $mhs_id);
$stmt_nilai->execute();
$nilai_result = $stmt_nilai->get_result();

// Hitung IPK
$total_sks = 0;
$total_bobot = 0;
while ($n = $nilai_result->fetch_assoc()) {
    $total_sks += $n['sks'];
    $total_bobot += $n['sks'] * $n['nilai_angka'];
    $data_nilai[] = $n;
}
$ipk = ($total_sks > 0) ? number_format($total_bobot / $total_sks, 2) : 0.00;
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Nilai - <?= htmlspecialchars($mhs['nama']); ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function konfirmasiHapusNilai(id, mhs) {
      if (confirm("Yakin ingin menghapus nilai ini?")) {
        window.location.href = "nilai_hapus.php?id=" + id + "&mhs=" + mhs;
      }
    }
  </script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4 text-center">Detail Nilai Mahasiswa</h2>

    <div class="bg-gray-50 p-4 rounded mb-4 border">
      <p><b>Nama:</b> <?= htmlspecialchars($mhs['nama']); ?></p>
      <p><b>NIM:</b> <?= htmlspecialchars($mhs['nim']); ?></p>
      <p><b>Prodi:</b> <?= htmlspecialchars($mhs['prodi']); ?></p>
      <p class="mt-2 font-semibold text-blue-700">IPK: <?= $ipk; ?></p>
    </div>

    <div class="flex justify-between mb-3">
      <a href="index2.php" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">← Kembali</a>
      <a href="tambah_nilai.php?mhs=<?= $mhs_id ?>" 
         class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Nilai</a>
    </div>

    <table class="w-full border border-gray-300 text-center">
      <thead class="bg-gray-200">
        <tr>
          <th class="border px-3 py-2">No</th>
          <th class="border px-3 py-2">Mata Kuliah</th>
          <th class="border px-3 py-2">SKS</th>
          <th class="border px-3 py-2">Huruf</th>
          <th class="border px-3 py-2">Angka</th>
          <th class="border px-3 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($data_nilai)): ?>
          <?php $no = 1; foreach ($data_nilai as $n): ?>
            <tr class="hover:bg-gray-50">
              <td class="border px-3 py-2"><?= $no++; ?></td>
              <td class="border px-3 py-2"><?= htmlspecialchars($n['mata_kuliah']); ?></td>
              <td class="border px-3 py-2"><?= $n['sks']; ?></td>
              <td class="border px-3 py-2"><?= $n['nilai_huruf']; ?></td>
              <td class="border px-3 py-2"><?= $n['nilai_angka']; ?></td>
              <td class="border px-3 py-2">
                <a href="nilai_edit.php?id=<?= $n['id']; ?>&mhs=<?= $mhs_id; ?>" 
                   class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                <button onclick="konfirmasiHapusNilai(<?= $n['id']; ?>, <?= $mhs_id; ?>)" 
                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="border px-3 py-2 text-gray-500">Belum ada data nilai.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>

    <div class="text-right mt-4">
      <span class="text-lg font-semibold">IPK Akhir: 
        <span class="text-blue-700"><?= $ipk; ?></span>
      </span>
    </div>
  </div>
</body>
</html>
