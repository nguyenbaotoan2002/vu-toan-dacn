<?php
include('config/config.php');
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Truy vấn để lấy mật khẩu đã mã hóa từ cơ sở dữ liệu
    $sql = "SELECT * FROM tbl_admin WHERE username = '$username'";
    $query = mysqli_query($mysqli, $sql);
    $row_user = mysqli_fetch_array($query);
    // Kiểm tra xem mật khẩu nhập vào có khớp với mật khẩu đã mã hóa hay không
    if ($row_user && password_verify($password, $row_user['password'])) {
        $_SESSION['role'] = $row_user['role'];
        $_SESSION['username'] = $row_user['fullname'];
        if ($_SESSION['role'] == 1) {
            header('Location:index.php');
        } elseif ($_SESSION['role'] == 0) {
            header('Location:../index.php');
        } else {
            header('Location:index.php');
        }
    } else {
        $message = "Đăng Nhập Thất Bại ! Vui Lòng tạo Đăng Kí Tài Khoản!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../assets/css/register.css">
</head>
<body>
    <div class="wrapper-container">
        <h2>Đăng Nhập</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="" name="password" required>
            </div>
            <div class="form-group btn btn--primary">
                <button type="submit" name="login">Đăng nhập</button>
            </div>
            <div class="form-group-link">
                <p>Bạn chưa có tài khoản ?<a href="../admin/register.php"> Đăng ký</a></p>
                <p> Bạn gặp vấn đề ?<a href="#">Quên mật khẩu</a></p>
            </div>
        </form>
    </div>
</body>
</html>
<script>
    // PHP variable to JavaScript variable
    var message = "<?php echo $message; ?>";
    
    // Kiểm tra xem message có giá trị không và hiển thị alert
    if (message) {
        alert(message);
      
    }
</script>
