<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Ucapan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Form Ucapan</h2>

        <form method="POST" class="space-y-4">
            <input type="text" name="nama" placeholder="Masukkan Nama" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
            <input type="submit" value="Kirim" class="w-full bg-indigo-500 hover:bg-indigo-600 text-white py-2 rounded-lg font-semibold cursor-pointer">
        </form>

        <?php
        if (isset($_POST['nama'])) {
            $nama = $_POST['nama'];
            echo "<p class='mt-6 p-4 bg-green-100 text-green-800 rounded-lg text-center'>Halo, $nama selamat belajar PHP!</p>";
        }
        ?>
    </div>
</body>
</html>
