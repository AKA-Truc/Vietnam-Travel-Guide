<?php
include_once "../../Controllers/adminController.php";
include_once "../../Controllers/authController.php";

// $auth = new AuthController();
// $auth->checkAdmin();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $adController = new AdminController();
    $adController->updatePost();
}
else{
    echo "Không có sự kiện submit nào";
}
?>