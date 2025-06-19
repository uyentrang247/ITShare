<?php
include(__DIR__ . '/assets/database/dbungdung_tailieu.php');

// Kiểm tra nếu form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $hocphan = $_POST['hocphan'];
    $tieude = $_POST['tieude'];
    $link = $_POST['duongdan'];

    // Câu truy vấn chèn dữ liệu
    $sql = "INSERT INTO video (hocphan, tieude, link) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $hocphan, $tieude, $link);

    // Thực thi câu lệnh
    if ($stmt->execute()) {
        echo 
        "<script>
        alert('Thêm video thành công!');
        window.location.href = 'add_video.php';
        </script>";
    } else {
        echo "<p class='error'>Lỗi khi thêm video: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
