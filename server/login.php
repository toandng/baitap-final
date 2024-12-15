<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }
        .form-login {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #6a11cb, #2575fc);
        }
        .login-header {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-header .text-header {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
        }
        .bg-login {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }
        .form-control {
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }
        .btn-primary {
            width: 100%;
            background-color: #2575fc;
            border-color: #2575fc;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #6a11cb;
            border-color: #6a11cb;
        }
        .text-header p {
            font-size: 14px;
            color: #888;
        }
        #userInfo {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        #userInfo h3 {
            color: #2575fc;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="form-login">
        <form class="login-header" id="loginForm" action="index.php" name="myForm" method="POST">
            <div class="div">
                <p>Trường đại học mỏ-địa chất</p> 
                <p style="font-size: 14px; font-weight: 600;">Ha Noi University of Mining and Geology</p>
            </div>
            <h2 class="text-header">Đăng nhập hệ thống</h2>
            <div class="bg-login">
                <div class="mb-3">
                    <label for="msv" class="form-label">MSV</label>
                    <input type="text" name="msv" class="form-control" id="msv" required>
                    <div id="msv-error" class="text-danger mt-1"></div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                    <div id="password-error" class="text-danger mt-1"></div>
                </div>
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </div>
        </form>
        <div id="userInfo" style="display: none; padding-top: 20px;">
            <h3>Chào mừng <span id="userName"></span></h3>
            <p>Mã sinh viên: <span id="userMSV"></span></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
