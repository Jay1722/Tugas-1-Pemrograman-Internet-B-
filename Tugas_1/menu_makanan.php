<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Makanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Menu Makanan</h2>

        <form method="POST" class="space-y-4">
            <select name="menu" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition duration-200">
                <option value="nasi_goreng">Nasi Goreng</option>
                <option value="soto">Soto</option>
                <option value="mie_ayam">Mie Ayam</option>
                <option value="bakso">Bakso</option>
                <option value="rawon">Rawon</option>
                <option value="mie_goreng">Mie Goreng</option>
            </select>

            <input type="submit" value="Cek Harga" class="w-full bg-indigo-500 hover:bg-indigo-600 text-white py-2 rounded-lg font-semibold cursor-pointer transition duration-200">
        </form>

        <?php
        if (isset($_POST['menu'])) {
            $menu = $_POST['menu'];
            switch($menu) {
                case "nasi_goreng": $harga = 15000; break;
                case "soto": $harga = 12000; break;
                case "mie_ayam": $harga = 10000; break;
                case "bakso": $harga = 13000; break;
                case "rawon": $harga = 17000; break;
                case "mie_goreng": $harga = 15000; break;
            }
            echo "<p class='mt-6 p-4 bg-green-100 text-green-800 rounded-lg text-center font-medium'>Harga: Rp $harga</p>";
        }
        ?>
    </div>
</body>
</html>
