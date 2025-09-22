<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa & Kelulusan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <?php
    $mahasiswa = [
        ["nim" => "2405551150", "nama" => "Jason", "umur" => 20, "prodi" => "TI", "nilai" => 85],
        ["nim" => "2105551050", "nama" => "Adhim", "umur" => 19, "prodi" => "TI", "nilai" => 65],
        ["nim" => "2205551051", "nama" => "Arya", "umur" => 18, "prodi" => "TI", "nilai" => 70],
        ["nim" => "2205551052", "nama" => "Sinta", "umur" => 19, "prodi" => "SI", "nilai" => 90],
        ["nim" => "2205551053", "nama" => "Ayu", "umur" => 20, "prodi" => "TI", "nilai" => 55]
    ];

    $total = 0;

    echo "<h3 class='text-xl font-bold mb-3'>Data Mahasiswa + Status Kelulusan</h3>";
    echo "<table class='table-auto border-collapse border border-gray-400 bg-white shadow rounded w-full mb-4'>";
    echo "<tr class='bg-gray-200'>
            <th class='border px-4 py-2'>NIM</th>
            <th class='border px-4 py-2'>Nama</th>
            <th class='border px-4 py-2'>Umur</th>
            <th class='border px-4 py-2'>Prodi</th>
            <th class='border px-4 py-2'>Nilai</th>
            <th class='border px-4 py-2'>Status</th>
          </tr>";
    foreach ($mahasiswa as $mhs) {
        $status = ($mhs['nilai'] >= 70) ? 
                  "<span class='text-green-600 font-bold'>Lulus</span>" : 
                  "<span class='text-red-600 font-bold'>Tidak Lulus</span>";
        $total += $mhs['nilai'];
        echo "<tr>
                <td class='border px-4 py-2'>{$mhs['nim']}</td>
                <td class='border px-4 py-2'>{$mhs['nama']}</td>
                <td class='border px-4 py-2 text-center'>{$mhs['umur']}</td>
                <td class='border px-4 py-2'>{$mhs['prodi']}</td>
                <td class='border px-4 py-2 text-center'>{$mhs['nilai']}</td>
                <td class='border px-4 py-2 text-center'>$status</td>
              </tr>";
    }
    $rata = $total / count($mahasiswa);
    echo "<tr class='bg-gray-100 font-bold'>
            <td colspan='4' class='border px-4 py-2 text-right'>Rata-rata Nilai Kelas</td>
            <td colspan='2' class='border px-4 py-2 text-center'>".number_format($rata,2)."</td>
          </tr>";
    echo "</table>";
    ?>
</body>
</html>
