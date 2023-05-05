<?php
require 'DataProvider.php';
session_start();
?>


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
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
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
</head>
<body>
    <!-- header -->
    <div id="header">
        <nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top shadow-sm mb" id="mainNav">
            <div class="container-fluid px-5">
                <a class="navbar-brand fw-bold header-logo" href="index.php">
                    <img src="./asset/image/Untitled.png" alt="Logo" style="width:40px;" class="rounded-pill me-2">
                    Chú Khỉ Buồn
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="cart nav-item">
                            <a class="nav-link me-lg-3" href="./donhangdadat.php" id="cart-1" type="button" onclick="if (status1!=1) alert('Vui lòng đăng nhập để xem đơn hàng đã đặt')">
                                <i class="ri-luggage-cart-line"></i> Đơn hàng đã đặt
                            </a>
                        </li>
                        <li class="cart nav-item">
                            <a class=" nav-link me-lg-3" href="./shopping-cart.php">
                                <i class="ti-shopping-cart"></i> Giỏ hàng
                            </a>
                        </li>
<?php

if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
    echo '<li class="nav-item header-log-out"><a class="nav-link me-lg-3" href="./index.php" style="white-space: nowrap;"><i class="ti-user"></i> '.$username.'</a></li>';
    echo '<li class="nav-item header-log-out"><a class="nav-link me-lg-3" id="header_1" href="./index.php?out=1" style="white-space: nowrap;"><i class="ri-logout-box-line"></i> Đăng xuất</a></li>';
} 
else {
    // Biến session không tồn tại
    echo '<li class="nav-item header-login"><a class="nav-link me-lg-3" id="header_1" href="./login.php" style="white-space: nowrap;"><i class="ri-login-box-line"></i> Đăng Nhập/Đăng Ký</a></li>';
}
?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="box bg-light small-box-middle-container py-5" style="text-align: center; margin-top: 12rem; border-collapse: separate; border-radius: 15px;">
        <div class="small-middle-container mb-3">
            <div class="row">
                <div class="col-1">
                    <h5></h5>
                </div>
                <div class="col-3">
                    <h5>Sản phẩm</h5>
                </div>
                <div class="col-2">
                    <h5>Giá tiền</h5>
                </div>
                <div class="col-3">
                    <h5>Số lượng</h5>
                </div>
                <div class="col-3 d-flex justify-content-end">
                    <h5>Tổng tiền</h5>
                </div>
            </div>
        </div>
        <div class="products">


<?php
$sum = 0;
// Hiển thị thông tin giỏ hàng
if (isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
    $i=0;
    foreach ($cart as $book_id => $quantity) {
        // Lấy thông tin chi tiết sản phẩm từ cơ sở dữ liệu hoặc nguồn dữ liệu khác
        // Hiển thị thông tin sản phẩm và số lượng trong giỏ hàng
        $sql = "SELECT * FROM sach WHERE masach=$book_id";
        $result = executeQuery($sql);
        $row = $result -> fetch_array();
        echo '
        <div class="small-middle-container" id="cart-child-${dem}" style="text-align: center;margin-bottom: 1rem">
            <div class="row">
                <div class="col-1">
                    <button type="button" class="navbar-toggler delete">
                        <span class="text-danger d-flex align-items-center">
                            <i class="ri-delete-bin-5-line"></i>
                        </span>
                    </button>
                </div>
                <div class="col-3">
                    <span>'. $row['tensach'] . '</span>
                </div>
                <div class="col-2">
                    <span>'. $row['gia']/1000 .'.000đ</span>
                </div>
                <div class="col-3 in-cart">
                    <button class="navbar-toggler minus" type="button" style="margin-right:20px;" ><i class="ti-minus text-danger"></i></button>
                    <span style="font-size:19px;" id="add_cart_'.$i.'">'.$quantity.'</span>
                    <button class="navbar-toggler plus" type="button" style="margin-left:20px;"><i class="ti-plus text-primary"></i></button>
                </div>
                <div class="col-3 d-flex justify-content-end">
                    <h5 class="sum_cart" id="sum_cart_'.$i.'">'. $row['gia']/1000*$quantity .'.000đ</h5>
                </div>
                
            </div>
        </div> 
        ';
        $sum =$sum + $row['gia']*$quantity;
        $i=$i+1;
    }   
}   
?>
        </div>
        <div class="small-middle-container " style="text-align: center;">
            <div class="row">
                <div class="col-3">
                    <h5></h5>
                </div>
                <div class="col-3">
                    <h5></h5>
                </div>
                <div class="col-3">
                    <h5>Tổng Cộng</h5>
                </div>
                <div class="col-3 d-flex justify-content-end">
<?php
             echo '<h5 id="total-price">'. $sum/1000 . '.000đ</h5>';

?>
                </div>
            </div>
        </div>
        <div class="small-middle-container " style="text-align: center;">
            <div class="row">
                <div class="col-1">
                    <h5></h5>
                </div>
                <div class="col-3">
                    <h5></h5>
                </div>
                <div class="col-2">
                    <h5></h5>
                </div>
                <div class="col-3">
                    <h5></h5>
                </div>
                <div class="col-3 d-flex justify-content-end">
                    <button id="pay_button" class="btn btn-primary rounded-pill mb-2 mb-lg-0 btn-pay" data-bs-toggle="modal" data-bs-target="#myModal-pay">
                        <span class="d-flex align-items-center">
                            <i class="ri-money-dollar-box-fill"></i>
                            <span>Thanh toán</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <!-- <div class="total-price" style="width:650px">
            <h5 style="margin-left: 630px;width: 100px;margin: right 0px;">Total:</h5>
        </div> -->
    </div>
    




    <footer class="" id="footer-index">
        <nav class="navbar navbar-expand-lg bg-light navbar-light fixed-bottom shadow-sm mb">
            <div class="container-fluid">
                <div class="d-flex flex-grow-1">
                    <div class="w-100 text-right">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myFooter">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </div>
                <div class="collapse navbar-collapse flex-grow-1 text-right" id="myFooter">
                    <ul class="navbar-nav ms-auto flex-nowrap">
                        <li class="nav-item">
                            <a href="https://www.facebook.com" class="nav-link">
                                <i class="ri-facebook-circle-fill"></i> TCĐTonline
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.instagram.com" class="nav-link">
                                <i class="ri-instagram-fill"></i> TheCaoDienThoai
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tel:+123456789" class="nav-link">
                                <i class="ri-phone-fill"></i> 0123-456-789
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mailto:someone@example.com" class="nav-link">
                                <i class="ri-mail-fill"></i> someone@example.com
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </footer>

    <div class="modal" id="myModal-pay">
        <div class="modal-dialog modal-l">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thanh toán</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body" id="modal-pay">
                <form>
            <div class="row">
                <label for="inputImg" class="col-sm-3 col-form-label">Tên khách hàng:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="customer-name">
                </div>
            </div>
            <div class="row">
                <label for="inputImg" class="col-sm-3 col-form-label">Số điện thoại:</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="phone-number">
                </div>
            </div>
            <div class="form-check" id = "address">
                <h3 for="inputImg" class="col-form-label">Địa chỉ giao hàng:</h3>
                <input type="text" size="40">
                <br>
            </div>
            <div class="form-check">
                <h3 for="inputImg" class="col-form-label">Phương thức thanh toán:</h3>
                <input name="t" class="form-check-input" type="radio" id="gridRadios1">
                <label class="form-check-label" for="gridRadios1">
                    Online
                </label>
                <br>
                <input name="t" class="form-check-input" type="radio" id="gridRadios1">
                <label class="form-check-label" for="gridRadios1">
                    OCD
                </label>
            </div>
        </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger confirm-button" data-bs-dismiss="modal">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="./js/main.js"></script> -->
    <!-- <script src="./js/cart.js"></script> -->
    <script>
        let minus = document.querySelectorAll(".minus")
        let plus = document.querySelectorAll(".plus")
        for (let i=0;i<minus.length;i++)
        {
            minus[i].addEventListener('click',function(){
                let sum = document.getElementById("sum_cart_"+i)
                let cart = document.getElementById("add_cart_"+i)
                let total = document.getElementById("total-price")
                if (parseInt(cart.innerText)>1){
                    sum.innerText = (parseInt(sum.innerText)/parseInt(cart.innerText))*(parseInt(cart.innerText)-1)+".000đ"
                    let sumcart = document.getElementsByClassName("sum_cart")
                    let t=0;
                    for (let i=0;i<sumcart.length;i++)
                        t = t + parseInt(sumcart[i].innerText)
                    total.innerText = t+".000đ"
                    cart.innerText = parseInt(cart.innerText)-1
                }
            })
        }
        for (let i=0;i<plus.length;i++)
        {
            plus[i].addEventListener('click',function(){
                let sum = document.getElementById("sum_cart_"+i)
                let total = document.getElementById("total-price")
                let cart = document.getElementById("add_cart_"+i)
                sum.innerText = (parseInt(sum.innerText)/parseInt(cart.innerText))*(parseInt(cart.innerText)+1)+".000đ"
                let sumcart = document.getElementsByClassName("sum_cart")
                let t=0;
                for (let i=0;i<sumcart.length;i++)
                    t = t + parseInt(sumcart[i].innerText)
                total.innerText = t+".000đ"
                cart.innerText = parseInt(cart.innerText)+1
            })
        }
        let payButton=document.querySelector("#pay_button")
        let header = document.getElementById("header_1")
        payButton.addEventListener('click',function(){
                if (header.innerText!=" Đăng xuất"){
                    alert("Đăng nhập để thanh toán")
                    location.href = "login.php"
                }
            })
    </script>
</body>
</html>