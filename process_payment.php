<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment'])) {
    $payment_method = $_POST['payment_method'];

    if ($payment_method == 'cash_on_delivery') {
        header('Location: success.php');
        exit;
    } elseif ($payment_method == 'vnpay') {
        header('Location: pay.php');
        exit;
        // } elseif ($payment_method == 'pay_with_check') {
        //     header('Location: pay_with_check.php');
        //     exit;
        // } elseif ($payment_method == 'paypal') {
        //     header('Location: paypal.php');
        //     exit;
        // }
    }
}

?>