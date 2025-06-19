<?php
include(__DIR__ . '/assets/database/dbungdung_tailieu.php');

$grouped = [];
$videos = [];
$items_per_page = 5;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hocphan'])) {
    $selected_hocphan = $_POST['hocphan'];

    // Tài liệu
    $stmt = $conn->prepare("SELECT * FROM tailieu WHERE hocphan = ?");
    $stmt->bind_param("s", $selected_hocphan);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    $grouped['Tất cả tài liệu'] = $data;

    // Video
    $stmt = $conn->prepare("SELECT * FROM videos WHERE hocphan = ?");
    $stmt->bind_param("s", $selected_hocphan);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $videos[] = $row;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8"> 
    <title>Danh sách tài liệu</title>
    <link rel="stylesheet" href='/myweb/assets/css/dsdethi.css'>
    <script src="/myweb/assets/js/Danhsachtailieu.js"></script>
</head>
<body>
<div class="sidebar">
    <div class="resizer" id="resizer"></div>
    <h2> <a href="TaiLieu.php" class="back-button">↩️
               DANH SÁCH TÀI LIỆU
               </a></h2>

    <form method="POST" style="margin-bottom: 20px;">
        <div class="form-group">
            <label for="hocphan" style="font-weight: bold; font-size: 16px; display: block; margin-bottom: 6px;">
                📘 Chọn học phần:</label>
            <div class="select-wrapper">
                <select id="hocphan" name="hocphan" onchange="this.form.submit()"
                 style="padding: 10px; font-size: 16px; border-radius: 8px; border: 1px solid #ccc; background-color: #f9f9f9;">
                    <option value="">-- Chọn học phần --</option>
                    <?php
                    $options = [
                        "Năm 1" => [
                            ["value" => "giaitich", "text" => "Giải tích"],
                            ["value" => "daisotuyentinh", "text" => "Đại số tuyến tính"],
                            ["value" => "toanlogic", "text" => "Toán logic"],
                            ["value" => "laptrinhcoban", "text" => "Lập trình cơ bản"],
                            ["value" => "tienganh1", "text" => "Tiếng Anh 1"],
                            ["value" => "triet", "text" => "Triết học Mác-Lênin"],
                            ["value" => "kinhtechinhtri", "text" => "Kinh tế chính trị"],
                            ["value" => "pldc", "text" => "Pháp luật đại cương"],
                            ["value" => "kynanggiaotiep", "text" => "Kỹ năng giao tiếp"],
                            ["value" => "tienganh2", "text" => "Tiếng Anh 2"],
                            ["value" => "nhapmonthuattoan", "text" => "Nhập môn Thuật toán"],
                            ["value" => "phuongphaptinh", "text" => "Phương pháp tính"],
                            ["value" => "hequantricsdl", "text" => "Hệ quản trị cơ sở dữ liệu SQL"]
                        ],
                        "Năm 2" => [
                            ["value" => "chunghiaxahoikhoahoc", "text" => "Chủ nghĩa xã hội khoa học"],
                            ["value" => "lthuongdoituong", "text" => "Lập trình hướng đối tượng"],
                            ["value" => "xacsuatthongke", "text" => "Xác suất thống kê"],
                            ["value" => "toanroirac", "text" => "Toán rời rạc"],
                            ["value" => "kythuatlaptrinh", "text" => "Kỹ thuật lập trình"],
                            ["value" => "nhapmonmang", "text" => "Nhập môn mạng máy tính"],
                            ["value" => "ltdesktop", "text" => "Lập trình Desktop"],
                            ["value" => "csdl", "text" => "Nhập môn cơ sở dữ liệu"],
                            ["value" => "laptrinhweb", "text" => "Lập trình ứng dụng Web"],
                            ["value" => "lichsudang", "text" => "Lịch sử Đảng"],
                            ["value" => "cautrucdulieu", "text" => "Cấu trúc dữ liệu và giải thuật"]
                        ]
                    ];
                    foreach ($options as $nhom => $dsHocPhan) {
                        echo "<optgroup label=\"$nhom\">";
                         foreach ($dsHocPhan as $hp) {
                            $selected = (isset($selected_hocphan) && $selected_hocphan == $hp['value']) ? 'selected' : '';
                            echo "<option value=\"{$hp['value']}\" $selected>{$hp['text']}</option>";
                        }
                        echo "</optgroup>";
                    }

                    ?>
                </select>
            </div>
        </div>
    </form>

    <div class="search-box">
        <input type="text" id="searchInput" placeholder="🔍 Tìm tài liệu theo từ khóa...">
    </div>

    <div class="main-content">
        <?php if (!empty($grouped)): ?>
            <?php foreach ($grouped as $tennhom => $exams): ?>
                <div class="year-section">
                    <div class="year-title">📚 <?= htmlspecialchars($tennhom) ?></div>
                    <?php foreach ($exams as $exam): ?>
                        <div class="exam-item" onclick="loadExam('<?= htmlspecialchars($exam['duongdan']) ?>', this)">
                               <img src="/myweb/assets/images/pdf.png" alt="icon">
                            <?= htmlspecialchars($exam['tenfile']) ?>
                            <a href="<?= htmlspecialchars($exam['duongdan']) ?>" target="_blank">Xem</a>
                            <a href="<?= htmlspecialchars($exam['duongdan']) ?>" download>Tải về</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <p style="padding: 20px; font-size: 18px;">❌ Không có tài liệu cho học phần này.</p>
        <?php endif; ?>

        <?php if (!empty($videos)): ?>
            <div class="year-section">
                <div class="year-title">🎬 Video ôn tập</div>
                <?php foreach ($videos as $video): ?>
                    <a class="video-item" href="<?= htmlspecialchars($video['link']) ?>" target="_blank" rel="noopener noreferrer">
                        <?= htmlspecialchars($video['tieude']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="content">
    <iframe name="viewer" class="viewer" width="100%"></iframe>

    <div class="share-container">
        <a href="chiasetailieu/chiasetailieu.php" class="share-link">
            Chia sẻ tài liệu của bạn ngay tại đây <span class="arrow">➤</span>
        </a>
    </div>
</div>