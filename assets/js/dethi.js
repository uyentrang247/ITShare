const hocPhanTheoNam = {
          cntt:{
        nam1: [
          { value: "giaitich", text: "Giải tích" },
          { value: "daisotuyentinh", text: "Đại số tuyến tính" },
          { value: "toanlogic", text: "Toán logic" },
          { value: "laptrinhcoban", text: "Lập trình cơ bản" },
          { value: "nmtt", text: "Nhập môn Thuật toán" },
          { value: "phuongphaptinh", text: "Phương pháp tính" }, 
          { value: "csdlSQL", text: "Hệ quản trị cơ sở dữ liệu SQL"}
        ],
         nam2: [
          { value: "ktlt", text: "Kỹ thuật lập trình" },
          { value: "ctdlgt", text: "Cấu trúc dữ liệu và giải thuật" },
          { value: "toanroirac", text: "Toán rời rạc" },
          { value: "lthdt", text: "Lập trình hướng đối tượng" },
          { value: "xacsuatthongke", text: "Xác suất thống kê" },
          { value: "csdl", text: "Cơ sở dữ liệu"},
          { value: "ltdesktop", text: "Lập trình Desktop"}
        ],
      } 
    };
 
    function updateHocPhan() {
      const nganhhocSelect = document.getElementById("nganhhoc");
      const namhocSelect = document.getElementById("namhoc");
      const hocphanSelect = document.getElementById("hocphan");

      const selectedNganh = nganhhocSelect.value;
      const selectedNam = namhocSelect.value;

      hocphanSelect.innerHTML = '<option value="">-- Chọn học phần --</option>';

      if (
        selectedNganh &&
        selectedNam &&
        hocPhanTheoNam[selectedNganh] &&
        hocPhanTheoNam[selectedNganh][selectedNam]
      ) {
        hocPhanTheoNam[selectedNganh][selectedNam].forEach((hocphan) => {
          const option = document.createElement("option");
          option.value = hocphan.value;
          option.textContent = hocphan.text;
          hocphanSelect.appendChild(option);
        });
      } 
      document.getElementById("tailieu-container").style.display = "none";
      document.getElementById("tailieu-links").innerHTML = "";
    }
 