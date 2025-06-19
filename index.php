<?php
require 'site.php';
load_top();
load_menu();
load_header();
?>

<main class="main-content-trangchu">
    <section class="intro">
        <h2>Chào mừng bạn đến với ứng dụng chia sẻ tài liệu học tập!</h2>
        <p>Website cung cấp tài liệu học tập, đề thi, bài tập mẫu cho nhiều chuyên ngành như Công nghệ Thông tin</p>
    </section>

    <!-- Thống kê ngành CNTT -->
    <section class="thong-ke">
        <h2>Thống kê tài nguyên CNTT</h2>
        <div class="luoi-thong-ke">
            <div class="muc-thong-ke">
                <h3>1,200+</h3>
                <p>Tài liệu lập trình & công nghệ</p>
            </div>
            <div class="muc-thong-ke">
                <h3>800+</h3>
                <p>Sinh viên CNTT tham gia</p>
            </div>
            <div class="muc-thong-ke">
                <h3>30+</h3>
                <p>Môn học CNTT được hỗ trợ</p>
            </div>
        </div>
    </section>

    <!-- Danh mục môn học CNTT -->
    <section class="danh-muc-mon-hoc">
    <h2>Các môn học phổ biến</h2>
    <div class="danh-sach-mon">
        <div class="mon">
            <i class="fas fa-code icon-mon"></i>
            <h3>Kỹ thuật lập trình</h3>
        </div>
        <div class="mon">
            <i class="fas fa-database icon-mon"></i>
            <h3>Hệ quản trị CSDL</h3>
        </div>
        <div class="mon">
            <i class="fas fa-project-diagram icon-mon"></i>
            <h3>Cấu trúc dữ liệu</h3>
        </div>
        <div class="mon">
            <i class="fas fa-network-wired icon-mon"></i>
            <h3>Mạng máy tính</h3>
        </div>
        <div class="mon">
            <i class="fas fa-laptop-code icon-mon"></i>
            <h3>Lập trình Web</h3>
        </div>
    </div>
    </section>



    <section class="box-section">
            <h2>📰 Tin tức & Sự kiện nổi bật</h2>
        </div>
        <div class="document-list">
            <div class="document-item">
                <h3><i class="fas fa-calendar-alt"></i> IT DAY 2025 - CUỘC THI SẢN PHẨM PHẦN MỀM</h3>
                <p><small>13/05/2025</small></p>
                <p>Sân chơi công nghệ để rèn luyện tư duy sáng tạo và phát triển sản phẩm ứng dụng cao.</p>
                <a href="TinNoiBat2.php" class="view-doc-btn">Xem chi tiết 👁️</a>
            </div>
            <div class="document-item">
                <h3><i class="fas fa-trophy"></i> ITDAY2025: CHUNG KẾT CUỘC THI LẬP TRÌNH IT QNU CHALLENGE (ITQC)</h3>
                <p><small>13/05/2025</small></p>
                <p>Cơ hội cọ xát với bài toán lập trình hấp dẫn, nhận giải thưởng giá trị.</p>
                <a href="TinNoiBat3.php" class="view-doc-btn">Xem chi tiết 👁️</a>
            </div>
        </div>
        <p style="text-align: right; margin-top: 1em;"><a href="tintuc.php" class="view-doc-btn">Xem thêm tin tức ➡️</a></p>
    </section>


    <section class="features">
        <h2>Lý do bạn nên sử dụng nền tảng của chúng tôi</h2>
        <div class="feature-list">
            <div class="feature-item">
                <i class="fas fa-check-circle"></i>
                <h3>Miễn phí 100%</h3>
                <p>Toàn bộ tài liệu có thể tải về mà không mất phí.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-clock"></i>
                <h3>Tiết kiệm thời gian</h3>
                <p>Tìm kiếm tài liệu nhanh chóng, theo ngành học, môn học.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-share-alt"></i>
                <h3>Chia sẻ dễ dàng</h3>
                <p>Gửi tài liệu của bạn để giúp cộng đồng sinh viên học tốt hơn.</p>
            </div>
        </div>
    </section>
</main>

<?php
load_footer();
?>  
