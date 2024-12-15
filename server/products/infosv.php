<?php
// Bật hiển thị lỗi để dễ debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Bắt đầu session để lấy thông tin sinh viên
session_start();

// Kiểm tra xem thông tin sinh viên có trong session không
if (isset($_SESSION['student'])) {
    $student = $_SESSION['student'];  // Lấy thông tin sinh viên từ session

    // Hiển thị thông tin sinh viên
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
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
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
        </head>
        <body>
            <div class='container'>
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
                            <th>Điểm A</th>
                            <th>Điểm B</th>
                            <th>Điểm C</th>
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
                            <td>" . htmlspecialchars($student['c']) . "</td>
                            <td>" . htmlspecialchars($student['b']) . "</td>
                            <td>" . htmlspecialchars($student['a']) . "</td>
                        </tr>
                    </tbody>
                </table>
                <div class='footer'>
                    <p>&copy; 2024 Hệ thống quản lý sinh viên</p>
                </div>
            </div>
        </body>
    </html>";
} else {
    // Nếu không có thông tin sinh viên trong session, yêu cầu đăng nhập lại
    echo "Thông tin sinh viên không tìm thấy. Vui lòng đăng nhập lại.";
}
?>
