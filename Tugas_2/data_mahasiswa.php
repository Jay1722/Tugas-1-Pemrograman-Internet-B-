<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <?php
    $mahasiswa = [
        ["nim" => "2405551150", "nama" => "Jason", "umur" => 20, "prodi" => "Teknologi Informasi"],
        ["nim" => "2105551050", "nama" => "Adhim", "umur" => 19, "prodi" => "Teknologi Informasi"],
        ["nim" => "2205551051", "nama" => "Arya", "umur" => 18, "prodi" => "Teknologi Informasi"],
        ["nim" => "2205551052", "nama" => "Sinta", "umur" => 19, "prodi" => "Sistem Informasi"],
        ["nim" => "2205551053", "nama" => "Ayu", "umur" => 20, "prodi" => "Teknik Informatika"]
    ];

    echo "<h3 class='text-xl font-bold mb-3'>Data Mahasiswa</h3>";
    echo "<table class='table-auto border-collapse border border-gray-400 bg-white shadow rounded w-full'>";
    echo "<tr class='bg-gray-200'>
            <th class='border px-4 py-2'>NIM</th>
            <th class='border px-4 py-2'>Nama</th>
            <th class='border px-4 py-2'>Umur</th>
            <th class='border px-4 py-2'>Program Studi</th>
            <th class='border px-4 py-2'>Angkatan</th>
          </tr>";
    foreach ($mahasiswa as $mhs) {
        $angkatan = substr($mhs['nim'], 0, 2); // 2 digit awal NIM
        echo "<tr>
                <td class='border px-4 py-2'>{$mhs['nim']}</td>
                <td class='border px-4 py-2'>{$mhs['nama']}</td>
                <td class='border px-4 py-2 text-center'>{$mhs['umur']}</td>
                <td class='border px-4 py-2'>{$mhs['prodi']}</td>
                <td class='border px-4 py-2 text-center'>20$angkatan</td>
              </tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
