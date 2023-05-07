<?php
require '../DataProvider.php';
session_start();

if (isset($_GET['khoa']))
{   
    $sql = "UPDATE `nguoidung` SET `trangthai`='0' WHERE `tendangnhap`='".$_GET['khoa']."'";
    executeQuery($sql);
    header("Location: customer.php");
}
if (isset($_GET['bokhoa']))
{   
    $sql = "UPDATE `nguoidung` SET `trangthai`='1' WHERE `tendangnhap`='".$_GET['bokhoa']."'";
    executeQuery($sql);
    header("Location: customer.php");
}

if (isset($_POST['tendangnhap']))
{   
    $sql = "UPDATE `nguoidung` SET `tendangnhap`='" . $_POST['tendangnhapmoi'] . "
    ', `email`='" . $_POST['email'] . "' WHERE `tendangnhap`='" . $_POST['tendangnhap'] . "'";
    executeQuery($sql);
    header("Location: customer.php");
}

if (isset($_POST['tendangnhap1']))
{   
    $sql = "INSERT INTO `nguoidung`(`tendangnhap`, `matkhau`, `email`, `trangThai`) VALUES ('" . $_POST['tendangnhap1'] . "','" . $_POST['email1'] . "','" . $_POST['password1'] . "','1')";
    executeQuery($sql);
    header("Location: customer.php");
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
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <title>Document</title>
</head>
<body style="overflow-x: hidden;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 min-vh-100 bg-dark min-vh-100">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 position-fixed">
                    <span class="fs-5 d-none d-sm-inline">Xin chào Minh</span>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="admin.php" class="nav-link align-middle px-0">
                                <i class="ri-home-fill"></i> <span class="ms-1 d-none d-sm-inline">Trang chủ</span>
                            </a>
                        </li>
                        <li>
                            <a href="./donhang.php" class="nav-link px-0 align-middle">
                                <i class="ri-file-list-3-fill"></i> <span class="ms-1 d-none d-sm-inline">Đơn hàng</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./addProduct.php" class="nav-link px-0"><i class="ri-add-line"></i> <span class="d-none d-sm-inline">Thêm sản phẩm</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="./productList.php" class="nav-link px-0"><i class="ri-list-settings-line"></i> <span class="d-none d-sm-inline">Danh sách sản phẩm</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="./customer.php" class="px-0 align-middle">
                                <i class="ri-file-user-line"></i> <span class="ms-1 d-none d-sm-inline">Khách hàng</span> </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="../index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <i class="ri-logout-box-line"></i><h3 class="fs-5 d-none d-sm-inline">Đăng xuất</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col py-3" id="product-list">
            <div class="row">
            <div class="col-2">
            <button type="button" class="btn btn-outline-success btn-edit" data-bs-toggle="modal" data-bs-target="#myModal_add">Thêm người dùng</button>
            </div>
            </div>

                <br>
                <div class="row">
                    <div class="col-2" style="text-align:center;">
                        <h4>Tên Đăng Nhập</h4>
                    </div>
                    <div class="col-4" style="text-align:center;">
                        <h4> Email</h4>
                     </div>
                    <div class="col-3" style="text-align:center;">
                       <h4> Mật khẩu</h4>
                    </div>
                    <div class="col-2" style="text-align:center;">
                        <h4>Chức năng</h4>
                    </div>
                </div>
                <hr>
<?php
$sql = "SELECT * FROM `nguoidung`";
$result = executeQuery($sql);
while ($row = $result -> fetch_array())
   {
    echo '
                <div class="row">
                    <div class="col-2" style="text-align:center;">
                        <h5>'.$row['tendangnhap'].'</h5>
                    </div>
                    <div class="col-4" style="text-align:center;">
                        <h5>'.$row['email'].'</h5>
                     </div>
                    <div class="col-3" style="text-align:center;">
                       <h5>***************</h5>
                    </div>
        <div class="col-2" style="text-align:center;">
        <button type="button" class="btn btn-outline-success btn-edit" data-bs-toggle="modal" data-bs-target="#myModal_edit_'. $row['tendangnhap'] .'">Sửa</button>&nbsp
                    ';
    if ($row['trangThai']==1)
        echo '<a href="./customer.php?khoa='. $row["tendangnhap"] .'"><button type="button" class="btn btn-outline-danger btn-delete">Khóa</button></a>';
    else 
        echo '<a href="./customer.php?bokhoa='. $row["tendangnhap"] .'"><button type="button" class="btn btn-outline-danger btn-delete">Mở</button></a>';          
    echo '
                    </div>
                </div>
                <hr>
    ';
   }
// Mệt thật chứ,cmn
?>

</div>


        </div>
        
    </div>
<?php
$sql = "SELECT * FROM `nguoidung`";
$result = executeQuery($sql);
while ($row = $result -> fetch_array()) {  
    echo '
    <div class="modal" id="myModal_edit_'. $row['tendangnhap'] .'">
        <div class="modal-dialog d-flex" style="min-width: 100%;">
            <div class="container">
            <div class="modal-content" style="width:60%;">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-auto col-md-3 col-xl-3 px-sm-6 px-2"  style="margin-left: 15em;">
                        <div class="d-flex flex-column align-items-center align-items-sm-center px-3 pt-2">            
                            <form style="width: 40rem;" method="POST">
                            <input type="text" class="form-control"  style="display: none;" name="tendangnhap" id="inputName" value="'. $row['tendangnhap'] .'">
                            <div class="row mb-3">
                                <label for="inputName" class="col-sm-3 col-form-label">Tên đăng nhập:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tendangnhapmoi" id="inputName" value="'. $row['tendangnhap'] .'">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputParValue" class="col-sm-3 col-form-label">Email:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="inputParValue"  value="'. $row['email'] .'">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btn-confirm">Lưu thay đổi</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
                    </div>
                </div>
                </div>';
}
?>

<div class="modal" id="myModal_add">
<div class="modal-dialog d-flex" style="min-width: 100%;">
    <div class="container">
    <div class="modal-content" style="width:60%;">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div class="col-auto col-md-3 col-xl-3 px-sm-6 px-2"  style="margin-left: 15em;">
                <div class="d-flex flex-column align-items-center align-items-sm-center px-3 pt-2">            
                    <form style="width: 40rem;" method="POST" onsubmit="return validateForm()">
                    <div class="row mb-3">
                        <label for="inputName1" class="col-sm-3 col-form-label">Tên đăng nhập:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tendangnhap1" id="inputName1">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail1" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email1" id="inputEmail1">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword1" class="col-sm-3 col-form-label">Mật khẩu:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password1" id="inputPassword1">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword2" class="col-sm-3 col-form-label">Nhập lại mật khẩu:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputPassword2">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-confirm">Thêm</button>
                </form>
            </div>
        </div>
    </div> 
</div>
            </div>
        </div>
        </div>
    <!-- <script src="./customer.js"></script> -->
    <script>
    funtion validateForm(){
            let username = document.getElementById("inputName1");
            let email = document.getElementById("inputEmail1");
            let password = document.getElementById("inputPassword1");
            let repassword = document.getElementById("inputPassword2");
            if (!username.value || !email.value || !password.value || !repassword.value) {
                alert("Vui lòng nhập đầy đủ thông tin");
                return false;
            } else {
                if (email.value.indexOf("@gmail.com")==-1) {
                    alert("Email không hợp lệ")
                    return false;
                }
                else {
                if (password.value != repassword.value) {
                    alert("Mật khẩu không khớp");
                    return false;
                }
        }
        return true;
    }
}
    </script>
</body>
</html>