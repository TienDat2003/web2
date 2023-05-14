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
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
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
                            <a class="nav-link me-lg-3" href="./donhangdadat.php" id="cart-1" type="button" onclick="if (status1!=1) {alert('Đăng nhập rồi cho xem -.-');}">
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
                        <!-- <li class="nav-item header-account"><a class="nav-link me-lg-3" href="./Register.php"><i class="ri-edit-2-line"></i> Đăng Ký</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="box container py-5" style="text-align: center; margin-top: 12rem;margin-bottom: 15rem; border-collapse: separate; border-radius: 15px;">
        <div class="container mb-3">
            <div class="row">
                <div class="col-4">
                    <h5>Địa chỉ giao hàng</h5>
                </div>
                <div class="col-2">
                    <h5> Ngày đặt</h5>
                </div>
                <div class="col-2">
                    <h5>Số điện thoại</h5>
                </div>
                <div class="col-2">
                    <h5>Chi tiết hóa đơn</h5>
                </div>
                <div class="col-2">
                    <h5>Trạng thái</h5>
                </div>
            </div>
            <hr>
            <div id="order-list">
                
<?php

$sql = "SELECT * FROM donhang WHERE `tendangnhap` = '".$_SESSION['user']."'";
$result = executeQuery($sql);
while ($row = $result -> fetch_array())
   {
    echo '
    <div class="row">
    <div class="col-4">
        <h5>'. $row['diachi'] .'</h5>
    </div>
    <div class="col-2">
        <h5>'. $row['ngay'] .'</h5>
    </div>
    <div class="col-2">
        <h5>'. $row['sodienthoai'] .'</h5>
    </div>
    <div class="col-2">
    <button type="button" class="btn btn-outline-success btn-edit" data-bs-toggle="modal" data-bs-target="#myModal_edit_'. $row["madonhang"] .'"><i class="ri-file-text-fill"></i></button>
    </div>
    <div class="col-2">';
    if ($row['daduyet']=="0")
        echo '<button type="button" class="btn btn-outline-danger btn-delete" id="btnDaduyet" disabled>Chưa được duyệt</button>';    
    else 
        echo '<button type="button" class="btn btn-outline-danger btn-delete" id="btnDaduyet" disabled>Đã được duyệt</button>';    
        
        echo '
    </div>
</div>
<hr>
    ';

   }
  echo '</select>';

?>


            </div>
        </div>
    </div>
        
        <!-- <div class="total-price" style="width:650px">
            <h5 style="margin-left: 630px;width: 100px;margin: right 0px;">Total:</h5>
        </div> -->
    </div>
    

    <?php
$sql = "SELECT * FROM `donhang`";
$result = executeQuery($sql);
while ($row = $result -> fetch_array()){
echo '
<div class="modal" id="myModal_edit_'.$row["madonhang"].'" style="margin-top: 2%;">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 style="color:pink;">Chi tiết đơn hàng : '.$row["madonhang"].'</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- Modal body -->
                        <div class="row">
                            <div class="col-1">
                                </div>
                            <div class="col-4">
                            <h5>Tên đăng nhập : '.$row["tendangnhap"].'</h5>
                            </div>
                        </div>  
                        <div class="row">
                        <div class="col-1">
                                </div>
                            <div class="col-4">
                            <h5>Số điện thoại : '.$row["sodienthoai"].'</h5>
                            </div>
                        </div> 
                        <div class="row">
                        <div class="col-1">
                                </div>
                            <div class="col-10">
                            <h5>Địa chỉ giao hàng : '.$row["diachi"].'</h5>
                            </div>
                        </div> 
                        <div class="row">
                        <div class="col-1">
                                </div>
                            <div class="col-10">
                            <h5>Ngày đặt : '.$row["ngay"].'</h5>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-1">
                                </div>
                            <div class="col-10">
                            <h5>Hình thức thanh toán : '.$row["thanhtoan"].'</h5>
                            </div>
                        </div>        
                        <hr>
                        <div class="row">
                            <div class="col-1">
                            </div>
                            <div class="col-1">
                                <h5>Mã sách</h5>
                            </div>
                            <div class="col-4" text-align="center">
                                <h5>Tên sách</h5>
                            </div>
                            <div class="col-2">
                                <h5>Giá</h5>
                            </div>
                            <div class="col-2">
                                <h5 style="font-size:19px;">Số lượng</h5>
                            </div>
                            <div class="col-2 d-flex">
                                <h5 class="sum-cart">Tổng tiền</h5>
                            </div>
                    </div>';
$sql1 = "SELECT * FROM `chitietdonhang` WHERE `madonhang`='" . $row["madonhang"] . "'";
$result1 = executeQuery($sql1);
$sum=0;
while ($row1 = $result1 -> fetch_array()){
    $sql2 = "SELECT * FROM sach WHERE masach ='". $row1["masach"] ."'";
    $result2 = executeQuery($sql2);
    $row2 = $result2-> fetch_array();
    $sum=$sum+$row2["gia"]*$row1["soluong"];
    echo '
        <div class="row">
        <div class="col-1">
        </div>
        <div class="col-1">
            <h6>'. $row1["masach"] .'</h6>
        </div>
        <div class="col-4" text-align="center">
            <h6>'. $row2["tensach"] .'</h6>
        </div>
        <div class="col-2">
            <h6>'. $row2["gia"]/1000 .'.000đ</h6>
        </div>
        <div class="col-2">
            <h6 style="margin-left: 20px;">'. $row1["soluong"] .'</h6>
        </div>
        <div class="col-2 d-flex">
            <h6 class="sum-cart">'. $row2["gia"]*$row1["soluong"]/1000  .'.000đ</h6>
        </div>
    </div>';
}
echo '
<div class="row">
        <div class="col-1">
        </div>
        <div class="col-5">
        </div>
        <div class="col-4">
        <h4>Tổng giá trị đơn hàng: </h4>
        </div>
        <div class="col-2 d-flex">
            <h5 class="sum-cart">' . $sum/1000 .'.000đ</h5>
        </div>

    </div>';
echo '
</div>
</div>
</div>
                        
';
}
?>




    <footer class="" id="footer-index">
        <div class="box bg-light py-5">
            <div class="container">
                <div class="row">
                  <div class="col">
                    <h5><img src="./asset/image/hpolicy_img1.jpg" alt="">DỊCH VỤ TẬN TÂM</h5>
                  </div>
                  <div class="col">
                    <h5><img src="./asset/image/hpolicy_img2.jpg" alt="">SẢN PHẨM ĐA DẠNG</h5>
                  </div>
                  <div class="col">
                    <h5><img src="./asset/image/hpolicy_img3.jpg" alt="">VẬN CHUYỂN CHU ĐÁO</h5>
                  </div>
                  <div class="col">
                    <h5><img src="./asset/image/hpolicy_img4.jpg" alt="">GIÁ CẢ HỢP LÝ</h5>
                  </div>
                </div>
              </div>
              <div class="container mt-5">
                <div class="row">
                  <div class="col">
                    <h5>LIÊN KẾT NHANH</h5>
                    <br>
                    <P>Sách Thiếu Nhi</P>
                    <p>Trinh Thám</p>
                    <p>Sách Văn học</p>
                    <p>Sách Có Chữ Ký</p>
                    <p>Văn Phòng Phẩm</p>
                    <p>Gợi Ý Cho Bạn</p>
                  </div>
                  <div class="col">
                    <h5>CÁC BỘ SƯU TẬP</h5>
                    <br>
                    <p>Bút - Viết</p>
                    <p>Dụng Cụ Học Sinh</p>
                    <p>Sản Phẩm Về Giấy</p>
                    <p>Dụng Cụ Văn Phòng</p>
                    <p>Dụng Cụ Vẽ</p>
                    <p>Sản Phẩm Điện Tử</p>
                    <p>Văn Phòng Phẩm Khác</p>
                  </div>
                  <div class="col">
                    <h5>HỖ TRỢ KHÁCH HÀNG</h5>
                    <br>
                    <p>Chính sách bảo mật</p>
                    <p>Hướng dẫn mua hàng</p>
                    <p>Phương thức thanh toán</p>
                    <p>Phương thức vận chuyển</p>
                    <p>Chính sách bảo hành</p>
                    <p>Chính sách đổi trả</p>
                    <p>Tin tuyển dụng</p>
                  </div>
                  <div class="col">
                    <h5>CHĂM SÓC KHÁCH HÀNG</h5>
                    <br>
                    <p>Liên hệ hỗ trợ</p>
                    <p>Hệ thống cửa hàng</p>
                    <p>Tin tuyển dụng</p>
                  </div>
                  <div class="col">
                    <h5>ĐỐI TÁC KINH DOANH</h5>
                    <br>
                    <p>Công Ty Phát Hành Sách</p>
                    <p>Văn Phòng Phẩm</p>
                  </div>
                </div>
                <br>
                <p style="text-align: center;">Sách Tiếng Việt | Sách Ngoại Văn | Văn Phòng Phẩm | Đồ Chơi | Đồ Trang Trí - Lưu Niệm | Theo Nhà Cung Cấp | Gợi Ý Quà Tặng | Sách có chữ ký</p>
                <p style="text-align: center;">Công ty TNHH Sách & Lịch Đại Nam Số ĐKKD 0311752595 do Sở KHĐT Tp. HCM cấp ngày 25/04/2012</p>
                <img style="max-width: 160px; padding-bottom: 15px; display: block; margin: auto;" alt="" title="" src="https://theme.hstatic.net/1000363117/1000606112/14/logosalenoti_large.png">
              </div>
        </div>
    </footer>
    </div>
</body>
</html>