<?php
require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
if (isset($_GET['adnotification'])) {
    $ID = $_GET['adnotification'];
    $sql = "DELETE FROM `notifications` WHERE `id` = '$ID'";
    $delete = mysqli_query($con, $sql);
    if ($delete) {
        header('Location: /notification');
    }
}
