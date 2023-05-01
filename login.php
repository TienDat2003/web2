<!-- Đức Phật nơi đây xin phù hộ code con chạy không Bug. Nam mô A Di Đà Phật.
                           _
                        _ooOoo_
                       o8888888o
                       88" . "88
                       (| -_- |)
                       O\  =  /O
                    ____/`---'\____
                  .'  \\|     |//  `.
                 /  \\|||  :  |||//  \
                /  _||||| -:- |||||_  \
                |   | \\\  -  /'| |   |
                | \_|  `\`---'//  |_/ |
                \  .-\__ `-. -'__/-.  /
              ___`. .'  /--.--\  `. .'___
           ."" '<  `.___\_<|>_/___.' _> \"".
          | | :  `- \`. ;`. _/; .'/ /  .' ; |
          \  \ `-.   \_\_`. _.'_/_/  -' _.' /
===========`-.`___`-.__\ \___  /__.-'_.'_.-'================
                        `=--=-'         ＜（＾－＾）＞ -->
<?php
require 'DataProvider.php';
?>
<!-- Đăng ký -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $sql = "INSERT INTO `nguoidung`(`tendangnhap`, `matkhau`, `hoten`, `sodienthoai`, `email`, `trangThai`) VALUES ('"
    .$_POST['name']. "','" .$_POST['password']. "',' ',' ','".$_POST['email']."','1')"  ;
    $result = executeQuery($sql);
}
// Kết nối tới cơ sở dữ liệu (thay đổi thông tin kết nối tương ứng với hệ thống của bạn)


// Truy vấn kiểm tra tên đăng nhập và mật khẩu trong cơ sở dữ liệu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])){
$sql = "SELECT * FROM nguoidung WHERE tendangnhap = '".$_POST['username']."' AND matkhau='".$_POST['password']."' AND trangThai='1' ";
$result = executeQuery($sql);

if ( $result -> fetch_array()) {
    // Đăng nhập thành công
    session_start();
    $_SESSION['user'] = $_POST['username']; // Lưu trữ dữ liệu trong session 
    header("Location: index.php"); // Chuyển hướng đến trang index
} else {
    // Đăng nhập thất bại
    echo "
    <script>
        alert('Đăng nhập thất bại. Vui lòng kiểm tra lại tên đăng nhập và mật khẩu.')
    </script>
    ";
}
}
?>
<?php
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="./asset/themify-icons/themify-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./asset/fonts/remixicon.css">
    <title>Hello World</title>
</head>
<body id="body-login">
    <div class="vh-10">
        <div class="dropdown pb-4">
            <a href="../index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                <i class="ri-logout-box-line"></i><h3 class="fs-5 d-none d-sm-inline" style="font-size: 26px;color: black;">Trang chủ</h3>
            </a>
        </div>
    </div>
    <section class="vh-100 text-dark" id="login">
        <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5" style="margin-top: 180px;">
            <img src="./asset/image/dang-ky-dai-ly-sim-the-dien-thoai-cac-nha-mang-di-dong-tai-viet-nam-removebg-preview.png"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form action="login.php" method="post">
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <p class="lead fw-normal mb-0 me-3">Đăng nhập với</p>
                <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="ri-facebook-circle-fill"></i>
                </button>
    
                <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="ri-github-fill"></i>
                </button>
    
                <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="ri-google-fill"></i>
                </button>
                </div>
    
                <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0">Hoặc</p>
                </div>
    
                <!-- Email input -->
                <i class="ri-mail-fill"> Tên đăng nhập</i></i>
                <div class="form-outline mb-4"> 
                    <input name="username" type="text" id="form3Example3" class="form-control form-control-lg" 
                        placeholder="Nhập tên đăng nhập"/>
                    <label class="form-label" for="form3Example3"></label>
                </div>
    
                <!-- Password input -->
                <i class="ri-lock-fill"> Mật khẩu</i>
                <div class="form-outline mb-3">
                    <input  name="password" type="password" id="form3Example4" class="form-control form-control-lg"
                        placeholder="Nhập mật khẩu"/>
                    <label class="form-label" for="form3Example4"></label>
                    </div>

                <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                    <input class="form-check-input me-2 " type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                    Ghi nhớ mật khẩu
                    </label>
                </div>
                </div>
    
                <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg" id="js-login-button"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Chưa có tài khoản? <a href="./Register.php"
                    class="link-danger">Đăng ký</a></p>
                </div>
    
            </form>
            </div>
        </div>
        <!-- Right -->
        </div>
    </section>
    
   
    <!-- <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

</body>
</html>
';
?>

