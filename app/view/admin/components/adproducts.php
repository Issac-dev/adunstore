<?php
require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
if (isset($_GET['adproducts'])) {
    $ID = $_GET['adproducts'];
    $sql = "DELETE FROM `products` WHERE `id` = '$ID'";
    $delete = mysqli_query($con, $sql);
    if ($delete) {
        header('Location: /products');
    }
}
