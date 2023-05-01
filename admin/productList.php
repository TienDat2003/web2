<?php
require '../DataProvider.php';

session_start();
// Lấy giá trị của biến session

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
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark min-vh-100">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white position-fixed min-vh-100">
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
                    <div class="col-12">
                    <h2>Chọn loại sản phẩm:</h2>
                    <form method="POST">
                    <select name="loai" class="form-select form-select-sm" id="select-bottom" style="width: 200px;margin-right: 14px;" aria-label=".form-select-sm example">
                        <option value="0" selected="selected">Tất cả</option>
                        <option value="1">Tiểu thuyết</option>
                        <option value="2">Tâm lý</option>
                        <option value="3">Kinh dị - Giả tưởng</option>
                        <option value="4">Tạp văn</option>
                    </select>
                    <button type="submit">Xác nhận</button>
                    </form>

                </div>
                </div>
                <hr>
                <?php
                    // Thực hiện câu truy vấn SQL để đếm số lượng bản ghi trong bảng sách
                    $sql = "SELECT COUNT(*) as count FROM sach";
                    $result = executeQuery($sql);
                    $count = $result->fetch_assoc()["count"];

                    // Hiển thị kết quả số lượng sản phẩm
                    echo '<div class="row">';
                    echo '<h2 id="header">Số lượng sản phẩm: ' . $count . '</h2>';
                    echo '</div>';
                ?>

                <br>
                <br>
                <div class="row">
                    <div class="col-1">
                        <h4 style="text-align:center;">STT</h4>
                    </div>
                    <div class="col-2">
                        <h4>Tên sách</h4>
                    </div>
                    <div class="col-1">
                        <h4>Hình ảnh</h4>
                    </div>
                    <div class="col-2">
                        <h4 style="text-align:center;"> Thể loại</h4>
                    </div>
                    <div class="col-1">
                        <h4> Giá bìa </h4>
                    </div>
                    <div class="col-2">
                        <h5 style="text-align:center;">NXB</h5>
                    </div>
                    <div class="col-1">
                        <h5 style="text-align:center;">Tác giả</h5>
                    </div>
                    <div class="col-1" style="text-align:center;">
                        <h5>Số lượng</h5>
                    </div>
                    <div class="col-1">
                        <h5>Chức năng</h5>
                    </div>
                </div>
    <?php
        // Lấy danh sách sản phẩm và loại sản phẩm từ cơ sở dữ liệu
        $sql = "SELECT s.masach, s.tensach, s.gia, s.soluong, s.nxb, s.tacgia, s.mota, s.trangthai, l.tenloai FROM sach s INNER JOIN loaisach l ON s.maloai = l.maloai ORDER BY s.masach ASC";
        // kiểm tra xem form có được submit hay chưa
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy giá trị của select và lưu vào biến
            $loai = $_POST['loai'];
            // xử lý dữ liệu tương ứng với giá trị lấy được
            if ($loai == 0) {
                $sql = "SELECT s.masach, s.tensach, s.gia, s.soluong, s.nxb, s.tacgia, s.mota, s.trangthai, l.tenloai FROM sach s INNER JOIN loaisach l ON s.maloai = l.maloai ORDER BY s.masach ASC";
            } else {
            // ...xử lý khi chọn giá trị khác 0
                $sql = "SELECT s.masach, s.tensach, s.gia, s.soluong, s.nxb, s.tacgia, s.mota, s.trangthai, l.tenloai 
                FROM sach s 
                INNER JOIN loaisach l ON s.maloai = l.maloai
                WHERE s.maloai = " . $loai;
            }
        }
        $result = executeQuery($sql);
        $link="../asset/image/";
        // Duyệt qua danh sách sản phẩm và hiển thị thông tin tương ứng
        while($row = $result->fetch_array()) {
            echo '<hr>';
            echo '<div class="row" id="row-' . $row["masach"] . '">';
            echo '<div class="col-1" style="text-align:center;">';
            echo '<h5>' . $row["masach"] . '</h5>';
            echo '</div>';
            echo '<div class="col-2">';
            echo '<h5>' . $row["tensach"] . '</h5>';
            echo '</div>';
            echo '<div class="col-1">';
            echo '<img class="card-img-top" style="width:100%;height:100%;" src="' . $link . $row["masach"] . '.png" alt="Book image">';
            echo '</div>';
            echo '<div class="col-2">';
            echo '<h5 style="text-align:center;">' . $row["tenloai"] . '</h5>';
            echo '</div>';
            echo '<div class="col-1">';
            echo '<h5>' . number_format($row["gia"]) . '</h5>';
            echo '</div>';
            echo '<div class="col-2">';
            echo '<h5>' . $row["nxb"] . '</h5>';
            echo '</div>';
            echo '<div class="col-1">';
            echo '<h5>' . $row["tacgia"] . '</h5>';
            echo '</div>';
            echo '<div class="col-1" style="text-align:center;">';
            echo '<h5>' . $row["soluong"] . '</h5>';
            echo '</div>';
            echo '<div class="col-1">';
            echo '<button type="button" class="btn btn-outline-success btn-edit" data-bs-toggle="modal" data-bs-target="#myModal-edit">Sửa</button>';
            echo '<button type="button" class="btn btn-outline-danger btn-delete" data-bs-toggle="modal" data-bs-target="#myModal-delete">Ẩn</button>';
            echo '</div>';
            echo '</div>';
        }
    ?>
</body>
            </div>
        </div>
    </div>
    <div class="modal" id="myModal-delete" style="margin-top: 15%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="header-name"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <span id="modal-text">
                        Xác nhận ẩn sản phẩm
                    </span>
                    <br>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary no-button" data-bs-dismiss="modal">Không</button>
                    <button type="button" class="btn btn-danger confirm-button" data-bs-dismiss="modal">Có</button>
                </div>
            </div>
        </div>
    </div>


<!-- modal edit -->
        <div class="modal" id="myModal-edit">
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
                                <form style="width: 40rem;">
                                <div class="row mb-3">
                                    <label for="inputImg" class="col-sm-3 col-form-label">Chọn ảnh</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="img-upload" name="img" accept="image/png">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-9" style="margin-left: 7em;" id="image">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputName" class="col-sm-3 col-form-label">Tên sách:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputName">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputParValue" class="col-sm-3 col-form-label">Giá bìa:</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="inputParValue">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPrice" class="col-sm-3 col-form-label">Giá bán:</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="inputPrice">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-3 col-form-label">Số lượng:</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="inputNumber">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNXB" class="col-sm-3 col-form-label">NXB:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputNXB">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputAuthor" class="col-sm-3 col-form-label">Tác giả:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputAuthor">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputContent" class="col-sm-3 col-form-label">Mô tả</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="inputContent" style="height: 90px;"></textarea>
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-3 pt-0">Thể loại:</legend>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Tiểu thuyết">
                                        <label class="form-check-label" for="gridRadios1">
                                            Tiểu thuyết
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Tâm lý">
                                        <label class="form-check-label" for="gridRadios2">
                                            Tâm lý
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="Kinh dị - Giả tưởng">
                                        <label class="form-check-label" for="gridRadios3">
                                            Kinh dị - Giả tưởng
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="Tản văn - Tạp văn">
                                        <label class="form-check-label" for="gridRadios4">
                                            Tản văn - Tạp văn
                                        </label>
                                    </div>
                                <button type="button" class="btn btn-primary" id="btn-confirm">Xác nhận</button>
                                
                            </form>
                            
                        </div>
                        
                    </div>
                </div> 
            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="container">
                    <div class="modal-content" style="width:40%;">
                            <div id="product" style="width:100rem;border: 0px;">
    
                            </div>
                        
                    </div>
                    
                    
            </div>
        </div>
    <script src="./productList.js"></script>
</body>
</html>