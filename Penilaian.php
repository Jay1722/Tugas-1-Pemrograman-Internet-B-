<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nilai Huruf</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Konversi Nilai ke Huruf</h2>

        <form method="POST" class="space-y-4">
            <input type="number" name="nilai" placeholder="Masukkan Nilai (0-100)" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
            <input type="submit" value="Cek" class="w-full bg-indigo-500 hover:bg-indigo-600 text-white py-2 rounded-lg font-semibold cursor-pointer">
        </form>

        <?php
        if (isset($_POST['nilai'])) {
            $nilai = $_POST['nilai'];
            if ($nilai >= 80) $grade = "A";
            elseif ($nilai >= 75) $grade = "B+";
            elseif ($nilai >= 70) $grade = "B";
            elseif ($nilai >= 65) $grade = "C+";
            elseif ($nilai >= 60) $grade = "C";
            elseif ($nilai >= 50) $grade = "D";
            else $grade = "E";

            echo "<p class='mt-6 p-4 bg-green-100 text-green-800 rounded-lg text-center'>Nilai: $nilai → Grade: $grade</p>";
        }
        ?>
    </div>
</body>
</html>
