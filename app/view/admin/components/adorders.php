<?php
require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
if (isset($_GET['delete'])) {
    $orderID = $_GET['delete'];
    $sql = "DELETE FROM `orders` WHERE `order_id` = '$orderID'";
    $delete = mysqli_query($con, $sql);
    if ($delete) {
        header('Location: /orders');
    }
}
if (isset($_GET['adorders'])) {
    $orderID = $_GET['adorders'];
    $sql = "UPDATE `orders` SET `status`= '1' WHERE `order_id` = '$orderID'";
    $update = mysqli_query($con, $sql);
    if ($update) {
        header('Location: /orders');
    }
}
