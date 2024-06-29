<?php
require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
session_start();
$uid = $_SESSION['uid'];
$sql = "SELECT * FROM `users` WHERE `id` = '$uid'";
$feed = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($feed)) {
    $id = $row['id'];
    $username = $row['username'];
    $email = $row['email'];
    $brand = $row['brand_name'];
    $image = $row['profilepic'];
    $bio = $row['bio'];
    $phone = $row['number'];
    $address = $row['address'];
    $balance = $row['balance'];
}

//Total orders
$total_orders = "SELECT COUNT(*) AS total_orders FROM `orders` WHERE `brand_id` = '$uid'";
$order_result = $con->query($total_orders);
$fetch_order = mysqli_fetch_assoc($order_result);
$total_order = $fetch_order['total_orders'];

//Orders in Array
// $order_array = "SELECT `price` FROM `orders`";
// $result_order = $con->query($order_array);
// $orderArray = array();
// while ($row = $result_order->fetch_assoc()) {
//     $orderArray[] = $row;
// }
// $orderArray = json_encode($orderArray);



//Earnings monthly
$pmonths = array();
$months = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
foreach ($months as $month) {
    $pJan = "SELECT SUM(price) AS p_sum FROM `orders` WHERE `brand_id` = '$uid' AND `date` LIKE '%" . $month . "%'";
    $p_result = $con->query($pJan);
    $fetch_p = mysqli_fetch_assoc($p_result);
    $total_p = $fetch_p['p_sum'];
    switch ($total_p) {
        case null:
            $total_p = 0;
            break;
        default:
            $total_p = intval($fetch_p['p_sum']);
            break;
    }
    array_push($pmonths, $total_p);
}
$priceMonth = json_encode($pmonths);



//Orders monthly
$omonths = array();
foreach ($months as $month) {
    $oJan = "SELECT COUNT(*) AS o_sum FROM `orders` WHERE `brand_id` = '$uid' AND `date` LIKE '%" . $month . "%'";
    $o_result = $con->query($oJan);
    $fetch_o = mysqli_fetch_assoc($o_result);
    $total_o = $fetch_o['o_sum'];
    switch ($total_o) {
        case null:
            $total_o = 0;
            break;
        default:
            $total_o = intval($fetch_o['o_sum']);
            break;
    }
    array_push($omonths, $total_o);
}
$orderMonth = json_encode($omonths);


//Products monthly
$prmonths = array();
foreach ($months as $month) {
    $prJan = "SELECT COUNT(*) AS pr_sum FROM `products` WHERE `brand_id` = '$uid' AND `date` LIKE '%" . $month . "%'";
    $pr_result = $con->query($prJan);
    $fetch_pr = mysqli_fetch_assoc($pr_result);
    $total_pr = $fetch_pr['pr_sum'];
    switch ($total_pr) {
        case null:
            $total_pr = 0;
            break;
        default:
            $total_pr = intval($fetch_pr['pr_sum']);
            break;
    }
    array_push($prmonths, $total_pr);
}
$productMonth = json_encode($prmonths);

//Total products
$total_products = "SELECT COUNT(*) AS total_products FROM `products` WHERE `brand_id` = '$uid'";
$product_result = $con->query($total_products);
$fetch_product = mysqli_fetch_assoc($product_result);
$total_product = $fetch_product['total_products'];

if (!$_SESSION['email']) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src=;sweetalert2.min.js;></script>
        <link rel='stylesheet' href=;sweetalert2.min.css;>
    </head>

    <body>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login or Create an Account'
            })
            var delay = ms => new Promise(res => setTimeout(res, ms));
            var hold = async () => {
                await delay(1000);
                window.location.href = "/login";
            };
            hold();
        </script>
    </body>

    </html>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- <script>
    // Given string representation
    var stringRepresentation = '';

    // Removing the "Array" text
    var jsonString = stringRepresentation.replace(/^Array/, '');

    // Parsing the JSON string into a JavaScript array
    var jsonArray = JSON.parse(jsonString);

    // Initialize an empty array to store numbers
    var numbersArray = [];

    // Iterate through the array of objects
    for (var i = 0; i < jsonArray.length; i++) {
        // Access the "price" property of each object and parse it as a number
        var price = parseInt(jsonArray[i].price);

        // Check if the parsed price is a valid number
        if (!isNaN(price)) {
            // Add the valid number to the numbers array
            numbersArray.push(price);
        }
    }
</script> -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="https://demos.creative-tim.com/material-dashboard/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="https://demos.creative-tim.com/material-dashboard/assets/img/favicon.png">
    <title>
        Adun - User Dashboard
    </title>

    <link rel="canonical" href="https://adun.store" />

    <meta name="keywords" content="Adun store Dashboard">
    <meta name="description" content="Adun store Dashboard">

    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@adun">
    <meta name="twitter:title" content="Adun store Dashboard">
    <meta name="twitter:description" content="Adun store Dashboard">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/50/original/material-dashboard.jpg">

    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Adun store Dashboard" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://adun.store" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/50/original/material-dashboard.jpg" />
    <meta property="og:description" content="Adun store Dashboard" />
    <meta property="og:site_name" content="Adun store Dashboard" />

    <link rel=" stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <link href="https://demos.creative-tim.com/material-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/material-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <link id="pagestyle" href="https://demos.creative-tim.com/material-dashboard/assets/css/material-dashboard.min.css?v=3.0.0" rel="stylesheet" />

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>

</head>

<body class="g-sidenav-show  bg-gray-200">


    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <img src="https://demos.creative-tim.com/material-dashboard/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Adun Dashboard</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="/user">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="/user_orders">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="/user_products">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="/profile">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="/notifications">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">notifications</i>
                        </div>
                        <span class="nav-link-text ms-1">Notifications</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="/logout">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">login</i>
                        </div>
                        <span class="nav-link-text ms-1">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none"><?php echo $username; ?></span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">

                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="/notifications" class="nav-link text-body p-0" id="dropdownMenuButton">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>