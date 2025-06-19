  const hocPhanTheoNam = {
      cntt:{
        nam1: [
          { value: "giaitich", text: "Giải tích" },
          { value: "daisotuyentinh", text: "Đại số tuyến tính" },
          { value: "toanlogic", text: "Toán logic" },
          { value: "laptrinhcoban", text: "Lập trình cơ bản" },
          { value: "tienganh1", text: "Tiếng Anh 1" },
          { value: "triet", text: "Triết học Mác-Lênin" },
          { value: "kinhtechinhtri", text: "Kinh tế chính trị" },
          { value: "pldc", text: "Pháp luật đại cương" },
          { value: "kynanggiaotiep", text: "Kỹ năng giao tiếp" },
          { value: "tienganh2", text: "Tiếng Anh 2" },
          { value: "nhapmonthuattoan", text: "Nhập môn Thuật toán" },
          { value: "phuongphaptinh", text: "Phương pháp tính" }, 
          { value: "hequantricsdl", text: "Hệ quản trị cơ sở dữ liệu SQL"}
        ],
         nam2: [
          { value: "chunghiaxahoikhoahoc", text: "Chủ nghĩa xã hội khoa học" },
          { value: "lthuongdoituong", text: "Lập trình hướng đối tượng" },
          { value: "xacsuatthongke", text: "Xác suất thống kê" },
          { value: "toanroirac", text: "Toán rời rạc" },
          { value: "kythuatlaptrinh", text: "Kỹ thuật lập trình" },
          { value: "nhapmonmang", text: "Nhập môn mạng máy tính"},
          { value: "laptrinhdesktop", text: "Lập trình Desktop"},
          { value: "csdl", text: "Nhập môn cơ sở dữ liệu"},
          { value: "laptrinhweb", text: "Lập trình ứng dụng Web"},
          { value: "lichsudang", text: "Lịch sử Đảng"},
          { value: "cautrucdulieu", text: "Cấu trúc dữ liệu và giải thuật" }
        ],
      } 
    };

    const taiLieuHocPhan = {
  giaitich: [
    { title: "Giải tích căn bản - Video 1", url: "https://youtu.be/GcK5soeRI9c?si=Wk_r3KiiLq6edhM0" },
    { title: "Giải tích căn bản - Video 2", url: "https://youtu.be/-WKE4klF6-A?si=CsN4L1Ykr7_LgDJc" },
    { title: "Giải tích căn bản - Video 3", url: "https://youtu.be/ncfDxdRc8-Q?si=RIEl73Xvgf6RFdm1" }
  ],
  laptrinhcoban: [
    { title: "Lập trình cơ bản với ngôn ngữ C - Video 1", url: "https://youtu.be/vpqMmfkSAMo?si=zlirVpy1it43M7V6" },
    { title: "Lập trình cơ bản với ngôn ngữ C - Video 2", url: "https://youtu.be/UxKymdnbTvI?si=w7nkJu-_sQgNoz5G" },
    { title: "Lập trình cơ bản với ngôn ngữ C - Video 3", url: "https://youtu.be/P0-WK0wandE?si=E5ZCTLl_yeD6FAb7" },
    { title: "Lập trình cơ bản với ngôn ngữ C - Video 4", url: "https://youtu.be/MBbuDohJXN8?si=x-Z-_N8HpJZgWuTI" }
  ],
  csdl: [
    { title: "Hệ quản trị CSDL - Video 1", url: "https://youtu.be/h6UqRl_hrOw?si=_n03r_6JP-7uZjuI" },
    { title: "Hệ quản trị CSDL - Video 2", url: "https://youtu.be/2fanjSYVElY?si=s7yFJJtXmx5dN0zx" }
  ],
    toanlogic: [
    { title: "Logic học - Khái niệm phần 1", url: "https://www.youtube.com/watch?v=yo6dgh8zAAw" },
    { title: "Logic học - Logic mệnh đề", url: "https://www.youtube.com/watch?v=psFg7PSmxdQ" },
    { title: "Mệnh đề và các phép toán mệnh đề | Lý thuyết và bài tập", url: "https://www.youtube.com/watch?v=UXgpKLI6L18" }
  ],
   daisotuyentinh: [
    { title: "Đại số tuyến tính - Chương 2. Bài 1. Ma trận", url: "https://www.youtube.com/watch?v=fmzWDXZxawE" },
    { title: "Đại số tuyến tính - Chương 2. Bài 2. Định thức P1", url: "https://www.youtube.com/watch?v=DPZYLKwjwvc" },
    { title: "Đại số tuyến tính - Chương 5. Bài 1. Không gian Euclide P1", url: "https://www.youtube.com/watch?v=tFrrZfYX90c" }
  ],
    nhapmonthuattoan: [
    { title: "Nhập môn thuật toán - Bài 1", url: "https://www.youtube.com/watch?v=he4-AJi2Nm0" },
    { title: "Nhập môn thuật toán - Bài 2", url: "https://www.youtube.com/watch?v=TrekndnmTZo" },
    { title: "Nhập môn tư duy thuật toán (phần 1)", url: "https://www.youtube.com/watch?v=1Pdd37syf4E" }
  ],
  phuongphaptinh: [
    { title: "Phương pháp tính - Buổi 1: Số gần đúng và sai số", url: "https://www.youtube.com/watch?v=s8lajqk-i3c" },
    { title: "Phương pháp tính - Buổi 2: Bài tập sai số + Chương 2: Hệ PTTT - PP lặp đơn", url: "https://www.youtube.com/watch?v=RAhQXYT6bh4" },
    { title: "Phương pháp tính - Chương 2 - phần 4 - Phương pháp Newton", url: "https://www.youtube.com/watch?v=o51x4AqOSkU" }
  ],
   kythuatlaptrinh: [
      { title: "Kỹ thuật lập trình - Part 1 (HCMUS)", url: "https://m.youtube.com/watch?v=NlrWzfNn6lA" },
      { title: "Giải đề thi giữa kỳ Kỹ thuật lập trình 2022-2023 (HCMUS)", url: "https://m.youtube.com/watch?v=kkE9-ykmOjk" },
      { title: "Kỹ thuật lập trình C/C++ - Đại học Bách Khoa - Cuối kỳ", url: "https://www.youtube.com/watch?v=lGUajW2Uke8" }
    ],
    cautrucdulieu: [
      { title: "Cấu trúc dữ liệu và giải thuật - Bài 1", url: "https://www.youtube.com/watch?v=ASlcp2V8dzA" },
      { title: "Cấu trúc dữ liệu và giải thuật - Buổi 1", url: "https://m.youtube.com/watch?v=XySXEp5vELQ" },
      { title: "Cấu trúc dữ liệu và giải thuật - Playlist", url: "https://www.youtube.com/playlist?list=PLux-_phi0Rz0nsE6QikvCgve8afhistvU" }
    ],
    toanroirac: [
      { title: "Toán rời rạc - Chương 1: Cơ sở logic - Phần 1", url: "https://m.youtube.com/watch?v=zdNrvcmgE60" },
      { title: "Toán rời rạc - Chương 1: Cơ sở logic - Phần 2", url: "https://www.youtube.com/watch?v=gXifdrT45M4" },
      { title: "Toán rời rạc 1 - P1: Giới thiệu học phần lý thuyết tập hợp", url: "https://www.youtube.com/watch?v=wl0IJWK_Vh8" }
    ],
    lthuongdoituong: [
      { title: "Lập trình hướng đối tượng - Buổi 1 (PTIT - Cô Vân Anh)", url: "https://www.youtube.com/watch?v=wms42A4Heuc" },
      { title: "Lập trình hướng đối tượng - Bài 1", url: "https://www.youtube.com/watch?v=ImuwuiguqEs" },
      { title: "Lập trình hướng đối tượng - Bài 2: Class - Object - Attribute", url: "https://www.youtube.com/watch?v=D8wKRgQfblI" }
    ],
    xacsuatthongke: [
      { title: "Xác suất thống kê - Bài 1: Các khái niệm mở đầu", url: "https://www.youtube.com/watch?v=9JXc0yTo0qc" },
      { title: "Xác suất và thống kê - Chương 1", url: "https://m.youtube.com/watch?v=y4pkITgIMLA" },
      { title: "Xác suất và thống kê - Chương 2 phần 1: Biến ngẫu nhiên", url: "https://www.youtube.com/watch?v=xysJI15jpAw" }
    ],
    tienganh1: [
      { title: "Tiếng Anh 1 - Học 100 từ vựng tiếng anh mỗi ngày", url: "https://youtu.be/NaBFJBNXGF0?si=UGd7O0Q9u_3XcCPT" },
      { title: "Tiếng Anh 1 - Cách tự học Tiếng Anh", url: "https://youtu.be/_nuQ39Y4T5Q?si=fbmqQ15LhyILi5Ge" },
      { title: "Tiếng Anh 1 - 12 thì Tiếng Anh", url: "https://youtu.be/bCngYqYPTGo?si=zwS4fUyspjnI0JQK" }
    ],
    triet: [
      { title: "Triết học Mác-Lênin - Chương 1", url: "https://youtu.be/iVMGo2QppIQ?si=jbi1BPujzzohFCE-" },
      { title: "Triết học Mác-Lênin - Chương 2", url: "https://youtu.be/F56-i8QOsuU?si=jjr2rBzzbktxjuG0" },
      { title: "Triết học Mác-Lênin - Chương 3", url: "https://youtu.be/sExaZ3dqZ5w?si=8fPfoxVwOifX0Gy4" }
    ],
    kinhtechinhtri: [
      { title: "Kinh tế chính trị Mác-Lênin - Chương 1", url: "https://youtu.be/3AmZehnKCtg?si=uvFyt4Rq31EVUD9B" },
      { title: "Kinh tế chính trị Mác-Lênin - Chương 2", url: "https://youtu.be/4FNGrRcQ4vM?si=h65hIaU-kSyMf3MY" },
      { title: "Kinh tế chính trị Mác-Lênin - Chương 3", url: "https://youtu.be/JJ4L62f7fI4?si=TTECll_urUqhudrP" },
      { title: "Kinh tế chính trị Mác-Lênin - Chương 4", url: "https://youtu.be/AzDqjs_OqFs?si=sIYmtVFV3ZD1onz4" },
      { title: "Kinh tế chính trị Mác-Lênin - Chương 5", url: "https://youtu.be/5AdiO6GyJ2Q?si=OXfk9WnOETcaISA3" },
      { title: "Kinh tế chính trị Mác-Lênin - Chương 6", url: "https://youtu.be/LXuUfzBvhPw?si=ITORD8g_RMiDdCmN" }
    ],
    pldc: [
      { title: "Pháp luật đại cương - Chương 1", url: "https://youtu.be/Ku6Lv-aAkIU?si=YutOrqaMp36VuC9t" },
      { title: "Pháp luật đại cương - Chương 2", url: "https://youtu.be/X9HU6M9f1Uk?si=KSjuxKkk3mUk-HQW" },
      { title: "Pháp luật đại cương - Chương 3", url: "https://youtu.be/KrnMQaB1rRc?si=cgAFHDbW5vzAMMg3" },
      { title: "Pháp luật đại cương - Chương 4 & 5", url: "https://youtu.be/Yei9PIu0hiw?si=L5QKpX-ner2VYo_G" }
    ],
    kynanggiaotiep: [
      { title: "Kỹ năng giao tiếp - Cách vượt qua nỗi sợ giao tiếp dở", url: "https://youtu.be/_iinxrEMWlk?si=APnh_jf6tj2dwcft" },
      { title: "Kỹ năng giao tiếp - Cách hết ngại và sợ khi giao tiếp", url: "https://youtu.be/8w5F-KhmVjA?si=2ijOT8N3g7v2PKMJ" }
    ],
    tienganh2: [
      { title: "Tiếng Anh 2 - Luyện nghe tiếng anh Level B1", url: "https://youtu.be/C5ymWyX8wsw?si=EFK74R8Ka9uz1WK6" },
      { title: "Tiếng Anh 2 - 3000 từ vựng tiếng Anh thông dụng", url: "https://youtu.be/GEK78wvy4bM?si=qnfnhZq4Smgo5boo" },
      { title: "Tiếng Anh 2 - Cách luyện nói tiếng Anh bằng phương pháp Shadowing", url: "https://youtu.be/YYN9wzkeoDU?si=9-BuziEeAOycPHSD" }
    ],
    hequantricsdl: [
      { title: "Hệ quản trị cở sở dữ liệu SQL - Bài 1: Hướng dẫn cài đặt SQL Serer 2022", url: "https://youtu.be/kQRpe1HkALE?si=m5pwVAeCj4wQOhLR" },
      { title: "Hệ quản trị cở sở dữ liệu SQL  - Bài 2: Chuẩn bị CSDL để thực hành câu lệnh SQL", url: "https://youtu.be/z8tme072AI0?si=gV_A8RZebhp_IjVv" },
      { title: "Hệ quản trị cở sở dữ liệu SQL  - Bài 3: Câu lệnh truy vấn SELECT", url: "https://youtu.be/KPdxLcbHlso?si=5rCgCTsBhIKk8vck" }
    ],
    chunghiaxahoikhoahoc: [
      { title: "Chủ nghĩa xã hội khoa học - Chương 1", url: "https://youtu.be/Feo7EN2vkmM?si=ZEAEbJx82NbX0gIg" },
      { title: "Chủ nghĩa xã hội khoa học - Ôn tập nhanh", url: "https://youtu.be/ENBY7SxBVUg?si=m_gr2j8o3afJoOfY" },
      { title: "Chủ nghĩa xã hội khoa học - Chương 2", url: "https://youtu.be/BIVwmer0jgk?si=_g2uvu--Q3tjUw26" }
    ],
    nhapmonmang: [
      { title: "Nhập môn mạng máy tính - Cấu hình cơ bản cho Router", url: "https://youtu.be/MzfLVdmRves?si=uOAHA494uuUEzc4k" },
      { title: "Nhập môn mạng máy tính - Các câu lệnh cơ bản trên Cisco Packet Tracer", url: "https://youtu.be/N7ABR9ntV40?si=kg7h01SFmoQ6drEH" },
      { title: "Nhập môn mạng máy tính - Cấu hình DHCP DNS EMAIL WEB FTP Server", url: "https://youtu.be/J15Ybdetzio?si=I_UWIm_aTBmyKQfM" }
    ],
    ltdesktop: [
      { title: "Lập trình Desktop - Tổng quan lập trình Winform", url: "https://youtu.be/dtYVRWfGhzI?si=mdZ4ty5VjgIG1nJE" },
      { title: "Lập trình Desktop - LinQ", url: "https://youtu.be/3YFM0rPsc7o?si=hySakF_7YiaNsjws" },
      { title: "Lập trình Desktop - ADO.NET", url: "https://youtu.be/5qx9MzRdB4U?si=vlSJp8MjzU0yyNgO" }
    ],
    csdl: [
      { title: "Nhập môn cơ sở dữ liệu - Phép chọn", url: "https://youtu.be/xOhvWQ1GakY?si=Yp5AfXL5lHx7cddr" },
      { title: "Nhập môn cơ sở dữ liệu - Phụ thuộc hàm", url: "https://youtu.be/pqsoNWeKCC0?si=TCbhgtkT5Tw7Cx24" },
      { title: "Nhập môn cơ sở dữ liệu - Tìm khóa tối thiểu", url: "https://youtu.be/I5uEtZVvS1Y?si=QV8MxqCYgN4xr6ZT" },
      { title: "Nhập môn cơ sở dữ liệu - Dạng chuẩn của lược đồ quan hệ", url: "https://youtu.be/8sLWen3GkQU?si=pNd1RcuBOqJnHCZz" }
    ],
    laptrinhweb: [
      { title: "Lập trình ứng dụng Web - Hướng dẫn thao tác CSDL MySQL PHPMyAdmin", url: "https://youtu.be/bSs1f1MGphs?si=wbGyaDOHqiF5cNrg" },
      { title: "Lập trình ứng dụng Web - Xây dựng hàm lọc dữ liệu (FilterData)", url: "https://www.youtube.com/watch?v=ohTPyYRXHcI" },
      { title: "Lập trình ứng dụng Web - Học lập trình PHP cơ bản cho người mới bắt đầu", url: "https://youtu.be/r1qie9pDweE?si=LvmoE56M7vhu7_Ss" },
      { title: "Lập trình ứng dụng Web - Tự học lập trình Javascript cơ bản", url: "https://youtu.be/NEgDBzHg9_c?si=9UyhHTm0LvmXTWuB" }
    ],
    lichsudang: [
      { title: "Lịch sử Đảng - Chương 1", url: "https://youtu.be/newMiA2-VDI?si=3DXxB7I-bPHe39xR" },
      { title: "Lịch sử Đảng - Chương 2", url: "https://youtu.be/M7Rx8Rvt_Rw?si=ehzYTAuTIcfD6ffe" },
      { title: "Lịch sử Đảng - Chương 3", url: "https://youtu.be/SXAbcIv-3IQ?si=aGtU3DRnCgRTtuL7" }
    ]
 
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

    function updateTaiLieu() {
      const hocphanSelect = document.getElementById("hocphan");
      const tailieuContainer = document.getElementById("tailieu-container");
      const tailieuLinks = document.getElementById("tailieu-links");

      const selectedHocPhan = hocphanSelect.value;

      tailieuLinks.innerHTML = "";

      if (selectedHocPhan && taiLieuHocPhan[selectedHocPhan]) {
        taiLieuHocPhan[selectedHocPhan].forEach((tl) => {
          const a = document.createElement("a");
          a.href = tl.url;
          a.target = "_blank";
          a.rel = "noopener noreferrer";
          a.textContent = tl.title;
          tailieuLinks.appendChild(a);
        });
        tailieuContainer.style.display = "block";
      } else {
        tailieuContainer.style.display = "none";
      }
    }