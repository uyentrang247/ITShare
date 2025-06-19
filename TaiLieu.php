<?php
require 'site.php';
load_top();
load_menu();
load_header();
?>

<div class="form-container">
    <p class="guide">📌 Vui lòng chọn đầy đủ ngành học, năm học và học phần để tìm tài liệu phù hợp.</p>  
    <form action="Danhsachtailieu.php" method="POST">
      <div class="form-group">
        <label for="nganhhoc">Ngành học:</label>
        <select name="nganhhoc" id="nganhhoc" required onchange="updateHocPhan()">
          <option value="">-- Chọn ngành học --</option>
          <option value="cntt">Công nghệ thông tin</option>
        </select>
      </div>

      <div class="form-group">
        <label for="namhoc">Năm học:</label>
        <select name="namhoc" id="namhoc" required onchange="updateHocPhan()">
          <option value="">-- Chọn năm học --</option>
          <option value="nam1">Năm 1</option>
          <option value="nam2">Năm 2</option>
          <!--option value="nam3">Năm 3</option>
          <option value="nam4">Năm 4</option> -->
        </select>
      </div>

      <div class="form-group">
        <label for="hocphan">Tên học phần:</label>
        <select name="hocphan" id="hocphan" required onchange="updateTaiLieu()">
          <option value="">-- Chọn học phần --</option>
        </select>
      </div>

      <div class="form-group center">
        <button type="submit">Tìm kiếm</button>
      </div>
    </form>

    <div id="tailieu-container" style="display:none;">
      <h4>📚 Tài liệu học tập liên quan</h4>
      <div id="tailieu-links"></div>
    </div>
 
    <script src="/myweb/assets/js/tailieu.js"></script>
</div>
<?php
load_footer();
?>