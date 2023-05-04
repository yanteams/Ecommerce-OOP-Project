<?php
include 'inc/header.php';

$login_check = Session::get('customer_login');
if ($login_check == false) {
    Session::destroy();
}
?>