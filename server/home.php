<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý điêm sinh viên</title>
    <link rel="stylesheet" href="../web/css/style/style.css">
    <script src="https://kit.fontawesome.com/f464ed5cf0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- header -->
    <div class="page-header">
        <div class="container">
            <div class="header">
                <div class="content">
                    <img src="../web/img/1.png" alt="">
                    <div class="content-text">
                        <p>Trường đại học mỏ - địa chất</p>
                        <p style="font-size: 14px; font-weight: 600;">Ha noi university of mining and geology</p>
                    </div>
                </div>
               <div class="login">
                    <div class="content-login">
                        <i class="fa-solid fa-user"></i><a href="../server/login.php">Đăng nhập</a>
                    </div>
                    <div class="content-search">
                        <input type="text" name="" id="" placeholder="Tìm kiếm">
                    </div>
               </div>
            </div>
        </div>
    </div>
    <!-- list education -->
    <div class="list-education">
        <div class="container">
            <div class="home">
                <i class="fa-solid fa-house"></i>
            </div>
            <div class="dropdown">
                <button class="btn " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Giới thiệu
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Về chúng tôi</a></li>
                  <li><a class="dropdown-item" href="#">Cơ cấu tổ chức</a></li>
                  <li><a class="dropdown-item" href="#">Đảng bộ </a></li>
                </ul>
              </div>

              <div class="dropdown">
                <button class="btn " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Tuyển sinh
                </button>
              </div>
              <div class="dropdown">
                <button class="btn " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Tin tức
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Thông báo</a></li>
                  <li><a class="dropdown-item" href="#">Sinh viên </a></li>
                  <li><a class="dropdown-item" href="#">Đảng đoàn thể</a></li>
                </ul>
              </div>
              <div class="dropdown">
                <button class="btn " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Đào tạo-Đbclgd
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Đại học</a></li>
                  <li><a class="dropdown-item" href="#">Sau đại học</a></li>
                  <li><a class="dropdown-item" href="#">Tin tức</a></li>
                </ul>
              </div>
              <div class="dropdown">
                <button class="btn " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Khoa học-Công nghệ
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Thông báo</a></li>
                  <li><a class="dropdown-item" href="#">Tin tức</a></li>
                  <li><a class="dropdown-item" href="#">Văn bản</a></li>
                </ul>
              </div>
              <div class="dropdown">
                <button class="btn " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Hợp tác-đối ngoại
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Dự án hợp tác</a></li>
                  <li><a class="dropdown-item" href="#">Thông báo</a></li>
                  <li><a class="dropdown-item" href="#">Tin tức</a></li>
                </ul>
              </div>
              <div class="dropdown">
                <button class="btn " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Sinh viên
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Hoạt động sinh viên</a></li>
                  <li><a class="dropdown-item" href="#">Sinh viên tình nguyện</a></li>
                  <li><a class="dropdown-item" href="#">Sinh viên khởi nghiệp</a></li>
                </ul>
              </div>
        </div>
    </div>
    <!-- banner -->
    <div class="banner">
        <div class="container">
            <div class="slide-banner">
                <div class="list-slide">
                    <ul>
                        <li>
                            <img src="../web/img/3.png" alt="">
                        </li>
                        <li>
                            <img src="../web/img/4.png" alt="">
                        </li>
                        <li>
                            <img src="../web/img/5.png" alt="">
                        </li>
                        <li>
                            <img src="../web/img/6.png" alt="">
                        </li>
                        <li>
                            <img src="../web/img/7.png" alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- list content -->
    <div class="list-content">
        <div class="container" style="display: block; margin: 20px auto; padding: 20px 20px;">
            <h2>Tin tức</h2>
            <div class="row align-items-start">
                <div class="col">
                    <img src="../web/img/8.png" alt="">
                    <p>Trường Đại học Mỏ - Địa chất tổ chức thành công Hội nghị Đại biểu Viên chức Trường lần thứ 51</p>
                    <ul>
                        <li>Chúc mừng đội tuyển Olympic Vật lý của Trường Đại học Mỏ - Địa chất đạt giải Nhì toàn đoàn trong cuộc thi Olympic Vật lý Sinh viên toàn quốc lần thứ XXVI - 2024</li>
                        <li>Lãnh đạo HUMG thăm và chúc mừng Tập đoàn Dầu khí Quốc gia Việt Nam (PVN) và Tổng công ty Thăm dò và Khai thác Dầu khí (PVEP) nhân kỷ niệm 63 năm Ngày truyền thống ngành Dầu Khí.</li>
                        <li>Lãnh đạo HUMG thăm và chúc mừng Tập đoàn Dầu khí Quốc gia Việt Nam (PVN) và Tổng công ty Thăm dò và Khai thác Dầu khí (PVEP) nhân kỷ niệm 63 năm Ngày truyền thống ngành Dầu Khí.</li>
                        <li>Chào mừng kỷ niệm 63 năm Ngày truyền thống ngành Dầu khí Việt Nam 27/11 </li>
                        <li>Đại hội đại biểu Đoàn TNCS Hồ Chí Minh Trường Đại học Mỏ – Địa chất lần thứ XXIX, nhiệm kỳ 2024 – 2027 thành công tốt đẹp</li>
                    </ul>
                </div>
                <div class="col">
                    <img src="../web/img/9.png" alt="">
                    <p>Hội thảo cấp Khoa về Xây dựng chương trình đào tạo trình độ đại học Ngành Ngôn ngữ Trung Quốc</p>
                    <ul>
                        <li>Trường Đại học Mỏ - Địa chất tổ chức Lễ khai giảng năm học 2023 - 2024</li>
                        <li>Lễ Khai giảng khóa đào tạo Thạc sĩ K46 và Tiến sĩ 2023 - 2026</li>
                        <li>Trường Đại học Mỏ - Địa chất tổ chức lễ trao bằng Tiến sĩ, Thạc sĩ K41 và K42</li>
                        <li>Lễ khai giảng khoá đào tạo tiến sĩ 2022 – 2025 và thạc sĩ 2022 – 2024 (K44)</li>
                    </ul>
                </div>
                <div class="col">
                    <img src="../web/img/10.png" alt="">
                    <p>Nghiệm thu cấp Bộ đề tài NCKH cấp Bộ mã số B2022-MDA-09 do PGS.TS Lê Đức Tình làm chủ nhiệm</p>
                    <ul>
                        <li>Nghiệm thu cấp Bộ đề tài NCKH cấp Bộ mã số B2022-MDA-07 do TS Nguyễn Duyên Phong làm chủ nhiệm</li>
                        <li>Nghiệm thu cấp Bộ đề tài NCKH cấp Bộ mã số B2022-MDA-13 do PGS.TS Trần Vân Anh làm chủ nhiệm</li>
                        <li>Nghiệm thu cấp Cơ sở đề tài KH&CN cấp Tỉnh ( tỉnh Bắc Kạn) mã số 5.2022.06 do TS Tô Xuân Bản chủ nhiệm</li>
                        <li>Nghiệm thu cấp Bộ đề tài NCKH cấp Bộ mã số B2022-MDA-03 do TS Lê Thị Duyên làm chủ nhiệm</li>
                    </ul>
                </div>
                <div class="col">
                    <img src="../web/img/11.png" alt="">
                    <p>Trường Đại học Mỏ - Địa chất tăng cường hợp tác với Hàn Quốc</p>
                    <ul>
                        <li>Hội nghị quốc tế ANGEL Erasmus+ (AIC) tại Đại học Công nghệ Malaysia</li>
                        <li>Trường Đại học Mỏ - Địa chất và Trường Đại học Cần thơ phối hợp tổ chức Hội thảo Quốc gia về Khởi nghiệp và Lãnh đạo xanh trong khuôn khổ dự án ANGEL</li>
                        <li>Trường Đại học Mỏ - Địa chất tham gia đoàn công tác của Bộ Giáo dục và Đào tạo và Hội đồng Anh tại Vương quốc Anh</li>
                        <li>Đoàn lưu học sinh Lào của Trường Đại học Mỏ - Địa chất tham gia cuộc thi “Hùng biện Tiếng Việt cho lưu học sinh nước ngoài năm 2023”</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row align-items-start" >  
                <div class="list-footer">
                   <div class="col-p">
                    <p>  Bản đồ chỉ dẫn</p>
                    <a href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+M%E1%BB%8F+-+%C4%90%E1%BB%8Ba+ch%E1%BA%A5t/@21.0723005,105.7719334,17z/data=!4m6!3m5!1s0x3134552defbed8e9:0x1584f79c805eb017!8m2!3d21.0720703!4d105.773929!16s%2Fm%2F0tkhxpt?entry=ttu&g_ep=EgoyMDI0MTIwNC4wIKXMDSoASAFQAw%3D%3D"><img src="/img/12.png" alt=""></a>
                </div>
                <div class="col-p">
                    <p>Mạng xã hội</p>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-youtube"></i>             
                    <i class="fa-brands fa-twitter"></i>
                </div>
                <div class="col-p">
                    <p>Sơ đồ trang</p>
                </div>
                    <div class="col-p">
                    <p>Các phòng ban</p>
                    <p>Các Khoa đào tạo</p>
                    <p>Các Công ty -Trung tâm</p>
                </div>
                </div>
            </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="../web/js/index.js"></script>
</html>