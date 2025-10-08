<?php
include "koneksi.php";
header('Content-Type: application/json; charset=utf-8');

$keyword = $_GET['keyword'] ?? '';
$keyword = "%".$keyword."%";

$stmt = $conn->prepare("SELECT id,nim,nama,prodi FROM mahasiswa WHERE nama LIKE ? OR nim LIKE ? ORDER BY id DESC");
$stmt->bind_param("ss", $keyword, $keyword);
$stmt->execute();
$res = $stmt->get_result();
$data = [];
while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
$stmt->close();
?>
