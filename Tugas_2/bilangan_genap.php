<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bilangan Genap</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <form method="post" class="bg-white p-4 rounded shadow w-1/3 mb-4">
        <label class="block mb-2">Dari angka:</label>
        <input type="number" name="n1" required class="border rounded px-2 py-1 w-full mb-3">
        <label class="block mb-2">Sampai angka:</label>
        <input type="number" name="n2" required class="border rounded px-2 py-1 w-full mb-3">
        <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tampilkan</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];

        if ($n1 < $n2) {
            echo "<div class='bg-white p-4 rounded shadow w-1/3'>";
            echo "<h3 class='text-lg font-bold mb-2'>Bilangan Genap dari $n1 sampai $n2:</h3>";
            for ($i = $n1; $i <= $n2; $i++) {
                if ($i % 2 == 0) {
                    echo "<span class='inline-block bg-green-100 text-green-700 px-2 py-1 rounded mr-1 mb-1'>$i</span>";
                }
            }
            echo "</div>";
        } else {
            echo "<p class='text-red-500 font-semibold'>Syarat: n1 harus lebih kecil dari n2!</p>";
        }
    }
    ?>
</body>
</html>
