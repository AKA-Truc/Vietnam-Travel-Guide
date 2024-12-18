<?php
    // Include các controller cần thiết
    include_once "../../Controllers/adminController.php";
    include_once "../../Controllers/authController.php";
    
    $adController = new AdminController();
    $auth = new AuthController();
    $auth->checkAdmin();
    
    // Kiểm tra nếu form "Thêm Người Dùng" được submit
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userName1"])) {
        if (isset($_POST['userID']) && isset($_POST['userName1']) && isset($_POST['address1']) 
        && isset($_POST['gender1'])){
            $adController->updateUser();
        }
        else{
            echo "<script>alert('Vui Lòng Điền Đủ Thông Tin!');</script>";
        echo "<script>window.location.href = '../../Views/admin/user_management.php';</script>";
        }
    }
    else{
        echo "<script>alert('Không Có Sự Kiện Submit Nào!');</script>";
        echo "<script>window.location.href = '../../Views/admin/user_management.php';</script>";
    }
?>