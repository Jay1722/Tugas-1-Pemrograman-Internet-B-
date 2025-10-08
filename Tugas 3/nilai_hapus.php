<?php
include "koneksi.php";
if (!isset($_GET['id']) || !isset($_GET['mhs'])) die("Data tidak lengkap.");

$nilai_id = intval($_GET['id']);
$mhs_id   = intval($_GET['mhs']);

$stmt = $conn->prepare("DELETE FROM nilai WHERE id=? AND mahasiswa_id=?");
$stmt->bind_param("ii", $nilai_id, $mhs_id);

if ($stmt->execute()) {
    header("Location: nilai_list.php?id=$mhs_id");
    exit;
} else {
    echo "Error: " . $stmt->error;
}
?>
