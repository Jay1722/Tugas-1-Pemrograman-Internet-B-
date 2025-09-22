<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <?php
    $mahasiswa = [
        "2250" => "Jason",
        "2202" => "Budi",
        "2203" => "Citra",
        "2204" => "Dewi",
        "2205" => "Eka"
    ];

    // Jika ada pencarian
    $cari = $_GET['cari'] ?? "";

    echo "<h3 class='text-xl font-bold mb-3'>Daftar Mahasiswa</h3>";
    echo "<form method='get' class='mb-3'>
            <input type='text' name='cari' placeholder='Cari nama...' value='$cari'
                   class='border px-3 py-1 rounded'>
            <button type='submit' class='bg-blue-500 text-white px-3 py-1 rounded ml-1'>Cari</button>
          </form>";

    echo "<ul class='bg-white p-4 rounded shadow list-disc list-inside'>";
    foreach ($mahasiswa as $nim => $nama) {
        if ($cari == "" || stripos($nama, $cari) !== false) {
            echo "<li>NIM: <span class='font-semibold'>$nim</span> - Nama: <span class='font-semibold'>$nama</span></li>";
        }
    }
    echo "</ul>";
    ?>
</body>
</html>
