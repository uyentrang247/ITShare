<?php
// Xử lý khi người dùng nhấn GỬI liên hệ
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include(__DIR__ . '/assets/database/dbungdung_tailieu.php');

    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $noidung = $_POST['noidung'];

    $sql = "INSERT INTO lienhe (hoten, email, noidung) 
            VALUES ('$hoten', '$email', '$noidung')";

    if (mysqli_query($kn, $sql)) {
        echo "<script>alert('Đã gửi thành công!'); window.location.href='lienhe.php';</script>";
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($kn);
    }

    mysqli_close($kn);
}
?>

<?php
require 'site.php';
load_top();
load_menu();
load_header();
?>

<main class="trang-lien-he">
    <!-- Phần Thông tin liên hệ -->
    <section class="hop-thong-tin">
        <h2><i class="thong-tin-lien-he"></i> Thông tin liên hệ</h2>
        <p><i class="dia-chi"></i> Địa chỉ: Trường Đại học Quy Nhơn, 170 An Dương Vương, TP. Quy Nhơn, Bình Định</p>
        <p><i class="dien-thoai"></i> Điện thoại: 0989 519 514</p>
        <p><i class="email-lien-he"></i> Email: itshareqnu@gmail.com</p>

        <div class="ban-do-google">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3923.248289393202!2d109.22928297506635!3d13.779502386620308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3170f73335ec2dc5%3A0x9451083ff0d0bfb0!2zVHLGsOG7nW5nIMSQ4bqhaSBI4bqjaSBRdXkgTmjhuq1u!5e0!3m2!1svi!2s!4v1716451907325!5m2!1svi!2s"
                width="100%" 
                height="500" 
                style="border:0; border-radius: 8px;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </section>

    <!-- Phần Gửi góp ý -->
    <section class="hop-gop-y">
        <h2><i></i> Gửi góp ý hoặc câu hỏi</h2>
        <form action="" method="POST" class="bieu-mau-lien-he"> 
            <label for="hoten">Họ và tên:</label>
            <input type="text" id="hoten" name="hoten" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="noidung">Nội dung:</label>
            <textarea id="noidung" name="noidung" rows="6" required></textarea>

            <button type="submit"><i class="fas fa-paper-plane"></i> Gửi liên hệ</button>
        </form>
    </section>
</main>

<?php
load_footer();
?>
