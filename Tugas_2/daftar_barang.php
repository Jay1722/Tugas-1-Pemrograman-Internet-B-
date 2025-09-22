<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <?php
    $barang = ["Buku Tulis", "Pulpen", "Penggaris", "Penghapus", "Spidol"];

    echo "<h3 class='text-xl font-bold mb-3'>Daftar Barang (Total: ".count($barang).")</h3>";
    echo "<ol class='list-decimal list-inside bg-white p-4 rounded shadow'>";
    foreach ($barang as $i => $b) {
        echo "<li class='text-gray-700'>"." $b</li>";
    }
    echo "</ol>";
    ?>
</body>
</html>
