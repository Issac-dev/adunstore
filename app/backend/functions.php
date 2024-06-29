<?php
require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';

class functions
{
    public $string;

    function setparameters($email)
    {
        $this->$email = $email;
    }

    function cleanme($string)
    {
        global $con;
        $input = $string;
        // This removes all the HTML tags from a string. This will sanitize the input string, and block any HTML tag from entering into the database.
        // filter_var($geeks, FILTER_SANITIZE_STRING);
        $input = filter_var($input, FILTER_SANITIZE_STRING);
        $input = trim($input, " \t\n\r");
        // htmlspecialchars() convert the special characters to HTML entities while htmlentities() converts all characters.
        // Convert the predefined characters "<" (less than) and ">" (greater than) to HTML entities:
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        // prevent javascript codes, Convert some characters to HTML entities:
        $input = htmlentities($input, ENT_QUOTES, 'UTF-8');
        $input = stripslashes(strip_tags($input));
        $input = mysqli_real_escape_string($con, $input);

        return $input;
    }

    function login($email, $passwordd)
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
        $validateuser = "SELECT * FROM `users` WHERE `username` = '$email'";
        $user = mysqli_query($con, $validateuser);

        //Check if user exists
        if (empty(mysqli_fetch_array($user))) {
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
                        title: 'Oops...',
                        title: 'User Does Not Exist'
                    })
                </script>
            </body>

            </html>
            <?php
            require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/view/login.php';
        } else {

            $sql = "SELECT * FROM `users` WHERE `password` = '$passwordd' AND `username` = '$email'";
            $login = mysqli_query($con, $sql);
            if (!empty(mysqli_fetch_array($login))) {
                $userDetails = "SELECT * FROM `users` WHERE `username` = '$email' AND `password` = '$passwordd'";
                $details = mysqli_query($con, $userDetails);
                while ($row = mysqli_fetch_array($details)) {
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['uid'] = $row['id'];
                    // $_SESSION['active'] = $row['active'];
                    header('Location: /user');
                }
            } else {
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
                            title: 'Oops...',
                            title: 'Incorrect Password'
                        })
                    </script>
                </body>

                </html>
<?php
                require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/view/login.php';
            }
        }
    }

    function signup($email, $name, $brand, $passwordd)
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
        $sql = "INSERT INTO `users`(`email`, `username`, `brand_name`, `password`) VALUES 
          ('$email','$name','$brand','$passwordd')";
        $register = mysqli_query($con, $sql);

        if ($register) {
            header("Location: /login");
        }
    }
}
function cleanme($string)
{
    global $con;
    $input = $string;
    // This removes all the HTML tags from a string. This will sanitize the input string, and block any HTML tag from entering into the database.
    // filter_var($geeks, FILTER_SANITIZE_STRING);
    $input = filter_var($input, FILTER_SANITIZE_STRING);
    $input = trim($input, " \t\n\r");
    // htmlspecialchars() convert the special characters to HTML entities while htmlentities() converts all characters.
    // Convert the predefined characters "<" (less than) and ">" (greater than) to HTML entities:
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    // prevent javascript codes, Convert some characters to HTML entities:
    $input = htmlentities($input, ENT_QUOTES, 'UTF-8');
    $input = stripslashes(strip_tags($input));
    $input = mysqli_real_escape_string($con, $input);

    return $input;
}

if (isset($_POST['add_product'])) {
    $product = $_POST['product'];
    $date = date("l jS \of F Y h:i:s A");
    $price = $_POST['price'];
    $uid = $_POST['uid'];
    $size = $_POST['size'];

    $image = $_FILES['img']['name'];

    if (preg_match('/\'/', $product)) {
        $product = preg_replace('/\'/', '', $product);
    };
    $tags = $product . "," . $size . "";
    foreach ($_POST["tags"] as $option) {
        $tags = $tags . "," . $option;
    }
    // if (preg_match('/\'/', $body)) {
    //     $body = preg_replace('/\'/', '', $body);
    // };

    $folder = "adun/app/backend/media/";
    move_uploaded_file($_FILES["img"]["tmp_name"], "$folder" . $_FILES["img"]["name"]);
    $target = "adun/app/backend/media/" . basename($image);
    $sql = "INSERT INTO `products` (`brand_id`, `product`, `image`, `price`, `tag`, `date`) VALUES ('$uid', '$product', '$image', '$price', '$tags', '$date')";
    $add = mysqli_query($con, $sql);
    if ($add) {
        header('Location: /user_products');
    }
}
if (isset($_GET['delete_products'])) {
    $delete_key = $_GET['delete_products'];
    $sql = "DELETE FROM `products` WHERE `id` = '$delete_key'";
    $add = mysqli_query($con, $sql);
    if ($add) {
        header('Location: /user_products');
    }
}
if (isset($_GET['delete_notifications'])) {
    $delete_key = $_GET['delete_notifications'];
    $sql = "DELETE FROM `notifications` WHERE `id` = '$delete_key'";
    $add = mysqli_query($con, $sql);
    if ($add) {
        header('Location: /notifications');
    }
}
if (isset($_POST['change_brand'])) {
    $new_brand = $_POST['new_brand'];
    $uid = $_POST['uid'];
    $sql = "UPDATE `users` SET `brand_name`= '$new_brand' WHERE `id`= '$uid'";
    $add = mysqli_query($con, $sql);
    if ($add) {
        header('Location: /profile');
    }
}
if (isset($_POST['change_profilepic'])) {
    $uid = $_POST['uid'];
    $image = $_FILES['img']['name'];
    $folder = "adun/app/backend/media/";
    move_uploaded_file($_FILES["img"]["tmp_name"], "$folder" . $_FILES["img"]["name"]);
    $target = "adun/app/backend/media/" . basename($image);
    $sql = "UPDATE `users` SET `profilepic`= '$image' WHERE `id`= '$uid'";
    $add = mysqli_query($con, $sql);
    if ($add) {
        header('Location: /profile');
    }
}
if (isset($_POST['verify'])) {
    $phone = $_POST['phone'];
    $bio = $_POST['bio'];
    $address = $_POST['address'];
    $uid = $_POST['uid'];
    $sql = "UPDATE `users` SET `number`= '$phone', `address` = '$address', `bio` = '$bio' WHERE `id`= '$uid'";
    $add = mysqli_query($con, $sql);
    if ($add) {
        header('Location: /profile');
    }
}
if (isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $uid = $_POST['uid'];
    $sql = "UPDATE `users` SET `password`= '$password' WHERE `id`= '$uid'";
    $add = mysqli_query($con, $sql);
    if ($add) {
        header('Location: /profile');
    }
}

if (isset($_POST['checkout'])) {
    $orderID = "AD" . uniqid(mt_rand(), true);
    $item = $_POST['items'];
    $brand = $_POST['brandID'];
    $fullName = $_POST['firstName'] . " " . $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['street'] . "," . $_POST['city'] . "," .  $_POST['province'] . "," . $_POST['postal'];
    $date = date("l jS \of F Y h:i:s A");
    $message = $fullName . " just made an order";
    $List = explode("-", $item);
    $List = array_slice($List, 0, -1);
    $itemList = "";
    $totalPrice = 0;
    foreach ($List as $value) {
        $sql = "SELECT * FROM `products` WHERE `id` = '$value'";
        $feed = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($feed)) {
            $id = $row['id'];
            $product = $row['product'];
            $image = $row['image'];
            $price = (int)$row['price'];
            $itemList = $itemList . $product . ", ";
            $totalPrice += $price;
        }
    }

    $sql = "INSERT INTO `orders`( `order_id`, `brand_id`, `name`, `email`, `contents`, `price`, `address`, `date`) 
        VALUES ('$orderID','$brand','$fullName','$email', '$itemList','$totalPrice','$address','$date')";

    //Update notifications
    $sqlNotifications = "INSERT INTO `notifications`(`brand_id`, `message`, `date`) 
        VALUES ('$brand','$message','$date')";
    $addNotifications = mysqli_query($con, $sqlNotifications);
    $add = mysqli_query($con, $sql);
    if ($add) {
        header("Location: /payment?orderID=$orderID");
    }
}


if (isset($_POST['adminNotification'])) {
    $message = $_POST['message'];
    $date = date("l jS \of F Y h:i:s A");
    $sql = "INSERT INTO `notifications`(`brand_id`, `message`, `date`) 
    VALUES ('0','$message','$date')";
    $add = mysqli_query($con, $sql);
    if ($add) {
        header('Location: /notification');
    }
}


if (isset($_POST['add_blog'])) {
    $title = $_POST['title'];
    $date = date("l jS \of F Y h:i:s A");
    $body = $_POST['body'];
    $uid = $_POST['uid'];
    $keywords = $_POST['keywords'];

    $image = $_FILES['img']['name'];

    if (preg_match('/\'/', $title)) {
        $title = preg_replace('/\'/', '', $title);
    };
    if (preg_match('/\'/', $body)) {
        $body = preg_replace('/\'/', '', $body);
    };
    if (preg_match('/\'/', $keywords)) {
        $body = preg_replace('/\'/', '', $keywords);
    };

    $folder = "adun/app/backend/media/";
    move_uploaded_file($_FILES["img"]["tmp_name"], "$folder" . $_FILES["img"]["name"]);
    $target = "adun/app/backend/media/" . basename($image);
    $sql = "INSERT INTO `blogs`(`uid`, `title`, `body`, `image`, `keywords`, `date`) VALUES ('$uid', '$title', '$body', '$image', '$keywords', '$date')";
    $add = mysqli_query($con, $sql);
    if ($add) {
        header('Location: /adblog');
    }
}
if (isset($_GET['oorder'])) {
    $oid = $_GET['oorder'];
    $brandsql = "SELECT * FROM `orders` WHERE `order_id`= '$oid'";
    $feed = mysqli_query($con, $brandsql);
    while ($row = mysqli_fetch_array($feed)) {
        $brand = $row['brand_id'];
        $amount = (int)$row['price'];
    }
    $sql = "UPDATE `orders` SET `status`= 1 WHERE `order_id`= '$oid'";
    $add = mysqli_query($con, $sql);
    if ($add) {
        $sql = "SELECT * FROM `users` WHERE `id` = '$brand'";
        $feed = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($feed)) {
            $balance = (int)$row['balance'];
        }
        $newBalance = $balance + $amount;
        $sql2 = "UPDATE `users` SET `balance`= '$newBalance' WHERE `id` = '$brand'";
        $add2 = mysqli_query($con, $sql2);
        if ($add2) {
            header('Location: /');
        }
    }
}
?>