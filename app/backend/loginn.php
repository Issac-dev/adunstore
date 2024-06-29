<?php
require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
require('functions.php');
session_start();


if (isset($_POST['login'])) {
    $log = new functions();
    // $log->setparameters($email);
    $email = $log->cleanme($_POST['user-name']);
    $password = $log->cleanme($_POST['user-password']);

    $log->login($email, $password);
}
