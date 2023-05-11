<?php
session_start();
// include"DataProvider.php"; 
require 'DataProvider.php'
$temp=0;
if (isset($_POST['username']) && isset($_POST['password']))
{
    function validate ($data) 
    {
        $data = trim ($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return data;
    }


$username = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM nguoidung WHERE tendangnhap='$username' AND matkhau = '$pass' AND vaitro='1'";

$result =  mysqli_query($sql);

if (mysqli_num_rows($result) === 1)
{
    $row = mysqli_fetch_assoc ($result); 
        $_SESSION['user'] = $username; 
        header ("Location: productList.php");
        exit(); 
}
else 
{
    header ("Location: login.php");
    $temp = 1;
    exit();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="../asset/themify-icons/themify-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/fonts/remixicon.css">
    <title>Hello World</title>
</head>
<body id="body-login" class="bg-dark p-3">
    <div class="vh-10">
        <div class="dropdown pb-4">
            <a href="../index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-decoration-none">
                <i class="ri-logout-box-line"></i><h3 class="fs-5 d-none d-sm-inline" style="font-size: 26px;color: black;">Trang chủ</h3>
            </a>
        </div>
    </div>
    <section class="vh-90 text-dark" id="login">
        <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5" style="margin-top: 180px;">
            <img src="../asset/image/dang-ky-dai-ly-sim-the-dien-thoai-cac-nha-mang-di-dong-tai-viet-nam-removebg-preview.png"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form action="admin.php" action="POST" >
                <!-- Email input -->
                <i class="ri-mail-fill">Tên đăng nhập</i>
                <div class="form-outline mb-4">
                <input type="email" id="form3Example3" name="username" class="form-control form-control-lg"
                    placeholder="Nhập email hoặc số điện thoại" />
                <label class="form-label" for="form3Example3"></label>
                </div>
    
                <!-- Password input -->
                <i class="ri-lock-fill"> Mật khẩu</i>
                <div class="form-outline mb-3">
                <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
                    placeholder="Nhập mật khẩu" />
                <label class="form-label" for="form3Example4"></label>
                </div>

                <button type="submit" class="btn btn-primary btn-lg" id="js-login-button"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
            </form>
            </div>
        </div>
        <!-- Right -->
        </div>
    </section>
<?php
if ($temp==1)
echo '
    <script>
        alert("Đăng nhập thất bại");
    </script>';
else
echo '
    <script>
        alert("Đăng nhập thành công");
    </script>';
?>
    <!-- <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</body>
</html>