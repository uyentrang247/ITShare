<?php
$conn = new mysqli('localhost', 'root', '', 'ungdung_tailieu');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
