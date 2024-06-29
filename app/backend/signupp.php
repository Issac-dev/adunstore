<?php
require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
require('functions.php');

if (isset($_POST['register'])) {
    $email = cleanme($_POST['user-email']);
    $check = "SELECT `email` FROM `users` WHERE `email` = '$email'";
    $run = mysqli_query($con, $check);
    if ($run) {
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
                    title: 'User Alread Exists',
                    text: 'Create'
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
    } else {
        true;
    }

    if ($_POST['user-password'] == $_POST['confirm-password']) {
        $log = new functions();
        // $log->setparameters($email);
        $email = $log->cleanme($_POST['user-email']);
        $username = $log->cleanme($_POST['user-name']);
        $brandname = $log->cleanme($_POST['user-brand']);
        $password = $log->cleanme($_POST['user-password']);

        $log->signup($email, $username, $brandname, $password);
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
                    title: 'Passwords Do Not Match',
                    text: ''
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
        require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/view/signup.php';
    }
}

?>