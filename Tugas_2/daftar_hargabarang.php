<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Harga Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <?php
    $barang = [
        "Buku" => 5000,
        "Pulpen" => 3000,
        "Penggaris" => 4000,
        "Penghapus" => 2000,
        "Spidol" => 6000
    ];

    $total = array_sum($barang);

    echo "<h3 class='text-xl font-bold mb-3'>Daftar Harga Barang</h3>";
    echo "<table class='table-auto border-collapse border border-gray-400 bg-white shadow rounded w-1/2'>";
    echo "<tr class='bg-gray-200'>
            <th class='border px-4 py-2 text-left'>Nama Barang</th>
            <th class='border px-4 py-2 text-right'>Harga</th>
          </tr>";
    foreach ($barang as $nama => $harga) {
        echo "<tr>
                <td class='border px-4 py-2'>$nama</td>
                <td class='border px-4 py-2 text-right'>Rp " . number_format($harga,0,",",".") . "</td>
              </tr>";
    }
    echo "<tr class='bg-gray-100 font-bold'>
            <td class='border px-4 py-2'>Total</td>
            <td class='border px-4 py-2 text-right'>Rp " . number_format($total,0,",",".") . "</td>
          </tr>";
    echo "</table>";
    ?>
</body>
</html>
