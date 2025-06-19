<?php
require 'site.php';
load_top();
load_menu();
load_header();
?>


<div class="chuong-trinh-dao-tao-wrapper">
    <div class="chuong-trinh-dao-tao-row">
        <div class="tieu-de-dao-tao">
            <h2 class="tieu-de">GIỚI THIỆU CHƯƠNG TRÌNH ĐÀO TẠO</h2>
        </div>
        <div class="nganh-hoc-container">
            <!-- Ngành KHMT -->
            <div class="nganh-hoc-item">
                <div class="nganh-hoc-noi-dung">
                    <div class="nganh-hoc-hinh-anh">
                        <a href="KHMT.php"><img src="assets/images/khmt.jpg" alt="Ngành KHMT"></a>
                    </div>
                    <h4 class="nganh-hoc-ten">KHOA HỌC MÁY TÍNH (THẠC SĨ)</h4>
                    <div class="nganh-hoc-lien-ket"><a href="KHMT.php">Chi tiết</a></div>
                </div>
            </div>

            <!-- Ngành CNTT -->
            <div class="nganh-hoc-item">
                <div class="nganh-hoc-noi-dung">
                    <div class="nganh-hoc-hinh-anh">
                        <a href="CNTT.php"><img src="assets/images/cntt.jpg" alt="CNTT"></a>
                    </div>
                    <h4 class="nganh-hoc-ten">CÔNG NGHỆ THÔNG TIN</h4>
                    <div class="nganh-hoc-lien-ket"><a href="CNTT.php">Chi tiết</a></div>
                </div>
            </div>

            <!-- Ngành KTPM -->
            <div class="nganh-hoc-item">
                <div class="nganh-hoc-noi-dung">
                    <div class="nganh-hoc-hinh-anh">
                        <a href="KTPM.php"><img src="assets/images/ktpm.jpg" alt="KTPM"></a>
                    </div>
                    <h4 class="nganh-hoc-ten">KĨ THUẬT PHẦN MỀM</h4>
                    <div class="nganh-hoc-lien-ket"><a href="KTPM.php">Chi tiết</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="tin-noi-bat">
        <div class="container">
            <h2 class="title">TIN NỔI BẬT</h2>
            <div class="cards">
                <div class="card">
                    <img src="assets/images/a1.jpg" alt="IT Day 2025 - Chuỗi hoạt động" class="card-img">
                    <div class="card-content">
                        <a href="TinNoiBat1.php" class="card-title">
                            IT DAY 2025 – CHUỖI HOẠT ĐỘNG SÔI NỔI, GẮN KẾT VÀ SÁNG TẠO
                        </a>
                        <p class="card-date">14/05/2025</p>
                    </div>
                </div>
                <div class="card">
                    <img src="assets/images/a2.jpg" alt="Cuộc thi phần mềm" class="card-img">
                    <div class="card-content">
                        <a href="TinNoiBat2.php" class="card-title">
                            IT DAY 2025 – CUỘC THI SẢN PHẨM PHẦN MỀM
                        </a>
                        <p class="card-date">13/05/2025</p>
                    </div>
                </div>
                <div class="card">
                    <img src="assets/images/a3.jpg" alt="Chung kết lập trình ITQC" class="card-img">
                    <div class="card-content">
                        <a href="TinNoiBat3.php" class="card-title">
                            ITDAY2025: CHUNG KẾT CUỘC THI LẬP TRÌNH IT QNU CHALLENGE (ITQC)
                        </a>
                        <p class="card-date">13/05/2025</p>
                    </div>
                </div>
            </div>
        </div>
</section>



<?php
load_footer();
?>  
