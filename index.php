<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        require __DIR__ . '/adun/app/view/index.php';
        break;
    case '/about':
        require __DIR__ . '/adun/app/view/about.php';
        break;
    case '/contact':
        require __DIR__ . '/adun/app/view/contact.php';
        break;
    case '/login':
        require __DIR__ . '/adun/app/view/login.php';
        break;
    case '/login':
        require __DIR__ . '/adun/app/view/login.php';
        break;
    case '/store':
        require __DIR__ . '/adun/app/view/store.php';
        break;
    case '/liststore':
        require __DIR__ . '/adun/app/view/stores.php';
        break;
    case '/blog':
        require __DIR__ . '/adun/app/view/blog.php';
        break;
    case '/script':
        require __DIR__ . '/adun/app/view/script.php';
        break;
    case '/checkout':
        require __DIR__ . '/adun/app/view/checkout.php';
        break;
    case '/comment':
        require __DIR__ . '/adun/app/view/comment.php';
        break;
    case '/charge':
        require __DIR__ . '/adun/app/view/charge.php';
        break;
    case (preg_match('/\\?orderID/i', $request) ? true : false):
        require __DIR__ . '/adun/app/view/payment.php';
        break;
    case (preg_match('/\\?AD.*xxd.*/i', $request) ? true : false):
        require __DIR__ . '/adun/app/backend/functions.php';
        break;
    case (preg_match('/\\?items/i', $request) ? true : false):
        require __DIR__ . '/adun/app/view/checkout.php';
        break;
    case (preg_match('/\\?brand/i', $request) ? true : false):
        require __DIR__ . '/adun/app/view/store.php';
        break;
    case (preg_match('/\\?keyword/i', $request) ? true : false):
        require __DIR__ . '/adun/app/view/blog.php';
        break;
    case (preg_match('/\\?idblog/i', $request) ? true : false):
        require __DIR__ . '/adun/app/view/blogs.php';
        break;
    case '/media/style.css':
        require __DIR__ . '/adun/app/view/media/style.css';
        break;
    case '/media/script.js':
        require __DIR__ . '/adun/app/view/media/script.js';
        break;
    case '/signupp':
        require __DIR__ . '/adun/app/backend/signupp.php';
        break;
    case '/loginn':
        require __DIR__ . '/adun/app/backend/loginn.php';
        break;
    case '/logout':
        require __DIR__ . '/adun/app/backend/logout.php';
        break;
    case '/functions':
        require __DIR__ . '/adun/app/backend/functions.php';
        break;
    case '/admin':
        require __DIR__ . '/adun/app/view/admin/index.php';
        break;
    case '/users':
        require __DIR__ . '/adun/app/view/admin/users.php';
        break;
    case '/products':
        require __DIR__ . '/adun/app/view/admin/products.php';
        break;
    case '/orders':
        require __DIR__ . '/adun/app/view/admin/orders.php';
        break;
    case '/notification':
        require __DIR__ . '/adun/app/view/admin/notification.php';
        break;
    case '/users':
        require __DIR__ . '/adun/app/view/admin/users.php';
        break;
    case '/adblog':
        require __DIR__ . '/adun/app/view/admin/blog.php';
        break;
    case (preg_match('/\\?aduser/i', $request) ? true : false):
        require __DIR__ . '/adun/app/view/admin/components/adusers.php';
        break;
    case (preg_match('/\\?adorders/i', $request) ? true : false):
        require __DIR__ . '/adun/app/view/admin/components/adorders.php';
        break;
    case (preg_match('/\\?adproducts/i', $request) ? true : false):
        require __DIR__ . '/adun/app/view/admin/components/adproducts.php';
        break;
    case (preg_match('/\\?adnotification/i', $request) ? true : false):
        require __DIR__ . '/adun/app/view/admin/components/adnotification.php';
        break;
    case (preg_match('/\\?addblog/i', $request) ? true : false):
        require __DIR__ . '/adun/app/view/admin/components/addblog.php';
        break;
    case '/user':
        require __DIR__ . '/adun/app/view/profile/index.php';
        break;
    case '/profile':
        require __DIR__ . '/adun/app/view/profile/profile.php';
        break;
    case '/user_orders':
        require __DIR__ . '/adun/app/view/profile/orders.php';
        break;
    case '/user_products':
        require __DIR__ . '/adun/app/view/profile/products.php';
        break;
    case (preg_match('/\\?delete_products/i', $request) ? true : false):
        require __DIR__ . '/adun/app/backend/functions.php';
        break;
    case (preg_match('/\\?delete_notifications/i', $request) ? true : false):
        require __DIR__ . '/adun/app/backend/functions.php';
        break;
    case '/notifications':
        require __DIR__ . '/adun/app/view/profile/notifications.php';
        break;
    case '/admin/connection.php':
        require __DIR__ . '/adun/app/admin/connection.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/adun/app/view/error.php';
        break;
}
