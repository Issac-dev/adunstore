<?php
require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
if (isset($_GET['addblog'])) {
    $ID = $_GET['addblog'];
    $sql = "DELETE FROM `blogs` WHERE `id` = '$ID'";
    $delete = mysqli_query($con, $sql);
    if ($delete) {
        header('Location: /adblog');
    }
}
