<?php
include "koneksi.php";

if (!isset($_GET['id'])) { header("Location: index2.php"); exit; }
$id = (int)$_GET['id'];

$stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id=?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    header("Location: index2.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
?>
