<?php
$servername = "localhost";
$username = "db_final";
$password = "test123";
$dbname = "baitap-final";

// Kết nối tới cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Query tính tổng số lượng sinh viên theo từng điểm
$sql = "SELECT 'C' AS category, SUM(c) AS total FROM tbl_sinhvien
        UNION ALL
        SELECT 'B', SUM(b) FROM tbl_sinhvien
        UNION ALL
        SELECT 'A', SUM(a) FROM tbl_sinhvien";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [$row['category'], (int)$row['total']];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // Load Google Charts
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            // Dữ liệu từ PHP
            var phpData = <?php echo json_encode($data); ?>;

            // Hàm vẽ biểu đồ
            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Category');
                data.addColumn('number', 'Total');
                data.addRows(phpData);

                var options = {
                    is3D: true
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
            // hover vào thanh sibar
            document.addEventListener('DOMContentLoaded', function () {
            // Lấy URL hiện tại
            const currentUrl = window.location.href;

            // Lặp qua tất cả các liên kết trong menu
            document.querySelectorAll('.nav-link').forEach(link => {
                    // Kiểm tra nếu URL của liên kết trùng với URL hiện tại
                    if (currentUrl.includes(link.href)) {
                        link.classList.add('active');
                    } else {
                        link.classList.remove('active');
                    }
                });
            });
        </script>
</head>
<style>
   .title{
        background-color: rgb(13,110,253);
        font-size: 30px;
        font-weight: 700;
        text-align: center;
        padding: 30px 20px;
        color: #fff;
   }
    /* Thay đổi màu nền của navbar khi hover */
.navbar-nav .nav-link:hover {
    background-color:rgb(20, 148, 157); 
    color: white; 
    border-radius: 5px; 
}

.navbar-nav .nav-link.active {
    background-color:rgb(41, 152, 172);  
    color: white;  
    font-weight: bold;  
    border-radius: 5px;  
}


.navbar-nav .nav-link:focus {
    background-color:rgb(13, 131, 158); 
    color: white;  
    border-radius: 5px;  
}


.navbar-light .navbar-brand:hover {
    color:rgb(9, 151, 125);  }
    .btn-primary{
    width: 11%;
    height: 40px;
    margin-top: 40px;
}
</style>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Thông kê - Điểm sinh viên</a>
                <div class="d-flex">
                    <a href="http://localhost/baitap-final/server/login.php" class="btn btn-outline-light">Đăng Xuất</a>
                </div>
        </div>
    </nav>
    <div class="container mt-4">
    <button class="btn btn-primary mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                    Menu
            </button>

            <!-- Offcanvas menu -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost/baitap-final/server/category/profilesv.php">Danh Sách Sinh Viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/baitap-final/server/category/student.php">Tra cứu sinh viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/baitap-final/server/category/major.php">Lớp chuyên nghành</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/baitap-final/server/category/section.php">Lớp học phần</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/baitap-final/server/category/static.php">Thống kê</a>
                        </li>
                    </ul>
                </div>
            </div>
        <div id="piechart" style="width: 900px; height: 500px; margin: auto;"></div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
