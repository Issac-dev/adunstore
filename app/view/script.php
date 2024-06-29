<?php
require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
if (isset($_GET['brand']) || isset($_GET['filter'])) {
    $brand = $_GET['brand'];
    $sql_brand = "SELECT * FROM `users` WHERE `brand_name` = '$brand'";
    $feed = mysqli_query($con, $sql_brand);
    while ($row = mysqli_fetch_array($feed)) {
        $brand_id = $row['id'];
        $img = $row['profilepic'];
        $bio = $row['bio'];
        $brand = $row['brand_name'];
    }
    $filter_search = !empty($_GET['filter_search']) ? $_GET['filter_search'] : null;
    $filter = !empty($_GET['filter']) ? $_GET['filter'] : null;
    $size = !empty($_GET['size']) ? $_GET['size'] : null;
    $tag = !empty($_GET['tag']) ? $_GET['tag'] : null;
}


$keyword_search = !empty($_GET['keyword_search']) ? $_GET['keyword_search'] : null;
$keyword = !empty($_GET['keyword']) ? $_GET['keyword'] : null;

if (isset($_GET['idblog'])) {
    $id = $_GET['idblog'];
}
