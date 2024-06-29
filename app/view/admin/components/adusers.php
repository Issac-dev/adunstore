<?php
require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
if (isset($_GET['adusers'])) {
    $ID = $_GET['adusers'];
    $sql = "DELETE FROM `users` WHERE `id` = '$ID'";
    $delete = mysqli_query($con, $sql);
    if ($delete) {
        $sql = "DELETE FROM `products` WHERE `brand_id` = '$ID'";
        $delete = mysqli_query($con, $sql);
        if ($delete) {
            $sql = "DELETE FROM `orders` WHERE `brand_id` = '$ID'";
            $delete = mysqli_query($con, $sql);
            if ($delete) {
                header('Location: /users');
            }
        }
    }
}
