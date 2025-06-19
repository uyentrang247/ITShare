<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chia sẻ tài liệu hoặc </title>
    <link rel="stylesheet" href='/myweb/assets/css/chiasedethi.css'>
</head>
<body>
    <div class=".chiase upload-container">
        <h2>Chia sẻ tài liệu hoặc đề thi</h2>
        <?php
        session_start();
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file_upload'])) {
            if (!isset($_SESSION['username'])) {
                $message = "Bạn cần đăng nhập để sử dụng tính năng này";
            } else {
                // Kết nối cơ sở dữ liệu
                include_once(__DIR__ . '/../assets/database/dbungdung_tailieu.php');

                $username = $_SESSION['username'];
                $upload_dir = __DIR__ . "/uploads/" . $username . "/";

                // Tạo thư mục nếu chưa tồn tại
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                // Hàm chuyển tiếng Việt có dấu sang không dấu
                function chuyenTenFileKhongDau($ten_goc) {
                    $ten_khong_dau = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $ten_goc);
                    $ten_khong_dau = preg_replace('/[^A-Za-z0-9.\s]/', '', $ten_khong_dau); // Loại bỏ ký tự đặc biệt
                    $ten_khong_dau = preg_replace('/\s+/', '_', $ten_khong_dau); // Thay khoảng trắng thành _
                    return $ten_khong_dau;
                }

                $ten_file_goc = basename($_FILES['file_upload']['name']);
                $ten_file_moi = chuyenTenFileKhongDau($ten_file_goc);
                $target_path = $upload_dir . $ten_file_moi;

                if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_path)) {
                    $nganhhoc = $_POST['nganhhoc'];
                    $namhoc = $_POST['namhoc'];
                    $hocphan = $_POST['hocphan'];
                    $tenfile = $_POST['tenfile']; // Tên hiển thị cho người dùng
                    $duongdan = "uploads/" . $username . "/" . $ten_file_moi; // Đường dẫn lưu trong DB
                    $ngaytao = date("Y-m-d H:i:s");

                    $sql = "INSERT INTO tailieu_users (username, nganhhoc, namhoc, hocphan, tenfile, duongdan, ngaytao) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);

                    if ($stmt) {
                        $stmt->bind_param("sssssss", $username, $nganhhoc, $namhoc, $hocphan, $tenfile, $duongdan, $ngaytao);
                        if ($stmt->execute()) {
                            $message = "✅ Tải lên thành công: " . htmlspecialchars($ten_file_moi) . "và đã cập nhật vào cơ sở dữ liệu.";
                        } else {
                            $message = "❌ Lỗi khi cập nhật cơ sở dữ liệu: " . $stmt->error;
                        }
                        $stmt->close();
                    } else {
                        $message = "❌ Lỗi chuẩn bị câu lệnh: " . $conn->error;
                    }
                    $conn->close();
                } else {
                    $message = "❌ Có lỗi xảy ra khi tải lên file.";
                }
            }
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nganhhoc">Ngành học:</label>
            <select id="nganhhoc" name="nganhhoc" required> 
                <option value= "CNTT">Công nghệ thông tin</option>
            </select>

            <label for="namhoc">Năm học:</label>
            <select id="namhoc" name="namhoc" required>
                <option value="">-- Chọn năm học --</option>
                <option value="Năm 1">Năm 1</option>
                <option value="Năm 2">Năm 2</option>
            </select>

            <label for="hocphan">Học phần:</label>
            <select id="hocphan" name="hocphan" required>
                <option value="">-- Chọn học phần --</option>
                <!-- Học phần Năm 1 -->
                <optgroup label="Năm 1">
                    <option value="giatich">Giải tích</option>
                    <option value="toanlogic">Toán logic</option>
                    <option value="laptrinhcoban">Lập trình cơ bản</option>
                    <option value="tienganh1">Tiếng Anh 1</option>
                    <option value="triethocmaclenin">Triết học Mác-Lênin</option>
                    <option value="kinhtechinhtri">Kinh tế chính trị</option>
                    <option value="phapluatdaicuong">Pháp luật đại cương</option>
                    <option value="kynanggiaotiep">Kỹ năng giao tiếp</option>
                    <option value="nhapmonthuattoan">Nhập môn Thuật toán</option>
                    <option value="phuongphaptinh">Phương pháp tính</option>
                    <option value="hequantricsdl">Hệ quản trị cơ sở dữ liệu</option>
                </optgroup>
                <!-- Học phần Năm 2 -->
                <optgroup label="Năm 2">
                    <option value="chxh">Chủ nghĩa xã hội khoa học</option>
                    <option value="laptrinhhuongdoituong">Lập trình hướng đối tượng</option>
                    <option value="xacsuatthongke">Xác suất thống kê</option>
                    <option value="toanroirac">Toán rời rạc</option>
                    <option value="kythuatlaptrinh">Kỹ thuật lập trình</option>
                    <option value="nhapmonmang">Nhập môn mạng</option>
                    <option value="laptrinhdesktop">Lập trình Desktop</option>
                    <option value="nhapmoncsdl">Nhập môn cơ sở dữ liệu</option>
                    <option value="laptrinhungdungweb">Lập trình ứng dụng web</option>
                    <option value="lichsudang">Lịch sử Đảng</option>
                    <option value="cautrucdulieu">Cấu trúc dữ liệu</option>
                </optgroup>
            </select>

            <label for="tenfile">Tên tài liệu:</label>
            <input type="text" id="tenfile" name="tenfile" placeholder="Nhập tên tài liệu" required>

            <label for="file_upload">Chọn file PDF:</label>
            <input type="file" id="file_upload" name="file_upload" accept=".pdf" required>
            <button type="submit">Tải lên</button>
        </form>
        <form action="../index.php" method="post">
        <button type="submit" class="back-btn">Quay lại trang chủ</button>
        <?php if (!empty($message)) echo "<p>$message</p>"; ?>
    </form>
        
    </div>
</body>
</html>