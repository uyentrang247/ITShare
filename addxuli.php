<?php
include(__DIR__ . '/assets/database/dbungdung_tailieu.php');
// Kiểm tra nếu form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $nganhhoc = $_POST['nganhhoc'];
    $namhoc = $_POST['namhoc'];
    $hocphan = $_POST['hocphan'];
    $tenfile = $_POST['tenfile'];
    $duongdan = $_POST['duongdan'];

    // Câu truy vấn chèn dữ liệu
    $sql = "INSERT INTO dethi (nganhhoc, namhoc, hocphan, tenfile, duongdan) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nganhhoc, $namhoc, $hocphan, $tenfile, $duongdan);

    // Thực thi câu lệnh
    if ($stmt->execute()) {
       echo 
       "<script>
       alert('Thêm đề thi thành công!');
       window.location.href = 'add_dethi.php';
       </script>";
    } else {
        echo "<p class='error'>Lỗi khi thêm đề thi: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
