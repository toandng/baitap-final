<?php
// Bật hiển thị lỗi để dễ debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Bắt đầu session để lấy thông tin sinh viên
session_start();

// Kiểm tra xem thông tin sinh viên có trong session không
if (isset($_SESSION['student'])) {
    $student = $_SESSION['student']; // Lấy thông tin sinh viên từ session
    
    $average = ($student['a'] + $student['b'] + $student['c']) /3;
    $rank = '';

    if($average >= 8) {
        $rank = "Xuất xắc";
    }elseif($average >= 7.0){
        $rank = "Khá";
    }elseif($average >= 5.0){
        $rank = "Khá";
    }else{
        $rank = "Trung bình";
    }

    // Hiển thị thông tin sinh viên và các chức năng
    echo "
    <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f7fc;
                    color: #333;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    height: 100vh;
                }

                .sidebar {
                    width: 250px;
                    background-color: #4CAF50;
                    color: white;
                    padding: 20px;
                    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
                    height: 100%;
                    position: fixed;
                    top: 0;
                    left: 0;
                }

                .sidebar h3 {
                    margin-top: 0;
                }

                .sidebar ul {
                    list-style-type: none;
                    padding: 0;
                }

                .sidebar ul li {
                    margin: 15px 0;
                }

                .sidebar ul li a {
                    color: white;
                    text-decoration: none;
                    display: block;
                    padding: 10px;
                    background-color: #66bb6a;
                    border-radius: 5px;
                }

                .sidebar ul li a:hover {
                    background-color: #43a047;
                }

                .content {
                    margin-left: 270px;
                    padding: 20px;
                    flex-grow: 1;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .container {
                    width: 80%;
                    margin: 20px;
                    background-color: #fff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }

                h2 {
                    text-align: center;
                    color: #4CAF50;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 20px 0;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }

                th, td {
                    padding: 12px;
                    text-align: left;
                    border: 1px solid #ddd;
                }

                th {
                    background-color: #4CAF50;
                    color: white;
                }

                tr:nth-child(even) {
                    background-color: #f2f2f2;
                }

                tr:hover {
                    background-color: #ddd;
                }

                .footer {
                    text-align: center;
                    margin-top: 20px;
                    font-size: 14px;
                    color: #888;
                }
            </style>
            <script>
                function showSection(sectionId) {
                    // Ẩn tất cả các section
                    document.getElementById('student-info').style.display = 'none';
                    document.getElementById('subject-scores').style.display = 'none';

                    // Hiển thị section được chọn
                    document.getElementById(sectionId).style.display = 'block';
                }
            </script>
        </head>
        <body>
            <div class='sidebar'>
                <h3>Chức năng</h3>
                <ul>
                    <li><a href='javascript:void(0)' onclick=\"showSection('student-info')\">Thông tin sinh viên</a></li>
                    <li><a href='javascript:void(0)' onclick=\"showSection('subject-scores')\">Xem điểm thành phần</a></li>
                    <li><a href='http://localhost/baitap-final/server/login.php'>Đăng Xuất</a></li>
                </ul>
            </div>

            <div class='content'>
                <div id='student-info' class='container'>
                    <h2>Thông Tin Sinh Viên</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Mã SV</th>
                                <th>Họ Lót</th>
                                <th>Tên</th>
                                <th>Mã Lớp</th>
                                <th>Điện Thoại</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>" . htmlspecialchars($student['MSV']) . "</td>
                                <td>" . htmlspecialchars($student['Họ lót']) . "</td>
                                <td>" . htmlspecialchars($student['Tên']) . "</td>
                                <td>" . htmlspecialchars($student['Mã lớp']) . "</td>
                                <td>" . htmlspecialchars($student['Điện thoại']) . "</td>
                                <td>" . htmlspecialchars($student['Email']) . "</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id='subject-scores' class='container' style='display: none;'>
                    <h2>Điểm Thành Phần</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Điểm A</th>
                                <th>Điểm B</th>
                                <th>Điểm C</th>
                                <th>Xếp loại học lực </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>" . htmlspecialchars($student['a']) . "</td>
                                <td>" . htmlspecialchars($student['b']) . "</td>
                                <td>" . htmlspecialchars($student['c']) . "</td>
                                <td>".$rank."</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </body>
    </html>";
} else {
    echo "<p>Thông tin sinh viên không tìm thấy. Vui lòng <a href='http://localhost/baitap-final/server/login.php'>đăng nhập lại</a>.</p>";
}
?>
