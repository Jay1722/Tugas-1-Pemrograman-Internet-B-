<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Sederhana</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Kalkulator Sederhana</h2>

        <form method="POST" class="space-y-4">
            <input type="number" name="angka1" placeholder="Angka 1" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
            <input type="number" name="angka2" placeholder="Angka 2" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
            <select name="operator" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
                <option value="tambah">Tambah</option>
                <option value="kurang">Kurang</option>
                <option value="kali">Kali</option>
                <option value="bagi">Bagi</option>
            </select>
            <input type="submit" value="Hitung" class="w-full bg-indigo-500 hover:bg-indigo-600 text-white py-2 rounded-lg font-semibold cursor-pointer">
        </form>

        <?php
        if (isset($_POST['angka1']) && isset($_POST['angka2'])) {
            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];
            $operator = $_POST['operator'];
            $hasil = "";

            switch($operator) {
                case "tambah": $hasil = $angka1 + $angka2; break;
                case "kurang": $hasil = $angka1 - $angka2; break;
                case "kali": $hasil = $angka1 * $angka2; break;
                case "bagi": $hasil = $angka2 != 0 ? $angka1 / $angka2 : "Tidak bisa dibagi 0"; break;
            }

            echo "<p class='mt-6 p-4 bg-green-100 text-green-800 rounded-lg text-center'>Hasil: $hasil</p>";
        }
        ?>
    </div>
</body>
</html>
