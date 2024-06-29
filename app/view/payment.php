<?php
require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
if (isset($_GET['orderID'])) {
    $id = $_GET['orderID'];
    $sql = "SELECT * FROM `orders` WHERE `order_id` = '$id'";
    $feed = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($feed)) {
        $product = $row['contents'];
        $price = (int)$row['price'] * 100;
    }
    $ID = "AD" . uniqid(mt_rand(), true) . "xxd" . uniqid(mt_rand(), true);
    $decoy = uniqid(mt_rand(), true);
    require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/stripe/vendor/autoload.php';

    $stripe_secret_key = "sk_test_51P6zdOJH1nrnrrRkXAqN95I9JFEDRzv4hdH6hjShsaKVV3RerYVHKt8yKWRhRKBNgCOX8OqDXAkSHzSl79JirrAZ00u3SNcu31";

    \Stripe\Stripe::setApiKey($stripe_secret_key);

    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => "http://localhost/update?$ID=$decoy&oorder=$id",
        "cancel_url" => "http://localhost/error",
        "locale" => "auto",
        "line_items" => [
            [
                "quantity" => 1,
                "price_data" => [
                    "currency" => "usd",
                    "unit_amount" => $price,
                    "product_data" => [
                        "name" => $product
                    ]
                ]
            ]
        ]
    ]);

    http_response_code(303);
    header("Location: " . $checkout_session->url);
}
