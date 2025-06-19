 <?php
include(__DIR__ . '/assets/database/dbungdung_tailieu.php');

$grouped = [];
$videos = []; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hocphan'])) {
    $selected_hocphan = $_POST['hocphan'];

    // Lấy danh sách đề thi theo học phần
    $stmt = $conn->prepare("SELECT * FROM dethi WHERE hocphan = ? ORDER BY namhoc");
    $stmt->bind_param("s", $selected_hocphan);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $grouped[$row['namhoc']][] = $row;
    }
    $stmt->close();

    // Lấy danh sách video ôn tập theo học phần
    $stmt = $conn->prepare("SELECT * FROM video WHERE hocphan = ?");
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
    <title>Danh sách đề thi</title>
    <link rel="stylesheet" href="/myweb/assets/css/dsdethi.css">
    <script src="/myweb/assets/js/Danhsachdethi.js"></script>

</head>
<body>
    <?php if (!empty($grouped)): ?>
        <div class="sidebar">
            <div class="resizer" id="resizer"></div>
            <h2>
               <a href="Dethi.php" class="back-button">↩️
               DANH SÁCH ĐỀ THI
               </a>
            </h2>
 
            <form method="POST" >
                <div class="form-group">
                    <label for="hocphan">
                        📘 Chọn học phần:
                    </label>
                    <div class="select-wrapper">
                        <select id="hocphan" name="hocphan" onchange="this.form.submit()">
                            <option value="">-- Chọn học phần --</option>
                            <?php
                            $options = [
                                "Năm 1" => [
                                    ["value" => "giaitich", "text" => "Giải tích"],
                                    ["value" => "daisotuyentinh", "text" => "Đại số tuyến tính"],
                                    ["value" => "toanlogic", "text" => "Toán logic"],
                                    ["value" => "laptrinhcoban", "text" => "Lập trình cơ bản"],
                                    ["value" => "nmtt", "text" => "Nhập môn Thuật toán"],
                                    ["value" => "phuongphaptinh", "text" => "Phương pháp tính"],
                                    ["value" => "csdlSQL", "text" => "Hệ quản trị cơ sở dữ liệu SQL"]
                                ],
                                "Năm 2" => [
                                    ["value" => "ktlt", "text" => "Kỹ thuật lập trình"],
                                    ["value" => "ctdlgt", "text" => "Cấu trúc dữ liệu và giải thuật"],
                                    ["value" => "toanroirac", "text" => "Toán rời rạc"],
                                    ["value" => "lthdt", "text" => "Lập trình hướng đối tượng"],
                                    ["value" => "xacsuatthongke", "text" => "Xác suất thống kê"],
                                    ["value" => "csdl", "text" => "Cơ sở dữ liệu"],
                                    ["value" => "ltdesktop", "text" => "Lập trình Desktop"]
                                ]
                            ];

                            foreach ($options as $year => $subjects) {
                                echo "<optgroup label=\"$year\">";
                                foreach ($subjects as $subject) {
                                    $selected = (isset($selected_hocphan) && $selected_hocphan == $subject['value']) ? 'selected' : '';
                                    echo "<option value=\"{$subject['value']}\" $selected>{$subject['text']}</option>";
                                }
                                echo "</optgroup>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </form>

            <div class="search-box">
                <input type="text" id="searchInput" placeholder="🔍 Tìm đề theo từ khóa...">
            </div>

            <?php foreach ($grouped as $namhoc => $exams): ?>
                <div class="year-section">
                    <div class="year-title">📅 Năm học: <?= htmlspecialchars($namhoc) ?></div>
                    <?php foreach ($exams as $exam): ?>
                        <div class="exam-item" onclick="loadExam('<?= htmlspecialchars($exam['duongdan']) ?>', this)">
                            <img src="/myweb/assets/images/pdf.png" alt="icon">
                            <?= htmlspecialchars($exam['tenfile']) ?> (<?= htmlspecialchars($exam['namhoc']) ?>)
                            <a href="<?= htmlspecialchars($exam['duongdan']) ?>" target="_blank">Xem</a>
                            <a href="<?= htmlspecialchars($exam['duongdan']) ?>" download>Tải về</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

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
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p style="padding: 20px; font-size: 18px;">❌ Không có đề thi cho học phần này.</p>
    <?php endif; ?>

    <?php $conn->close(); ?>

    <div class="content">
        <iframe name="viewer" class="viewer" width="100%"></iframe>

        <div class="share-container">
            <a href="chiasetailieu/chiasetailieu.php" class="share-link">
                Chia sẻ đề thi của bạn ngay tại đây <span class="arrow">➤</span>
            </a>
        </div>
    </div>