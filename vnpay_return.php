<?php
include 'inc/header.php';
?>

<!-- main wrapper start -->
<main>

    <!-- breadcrumb area start -->

    <div class="choosing-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-2">
                        <hr>
                        <h2>Success Order</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="tab-content reviews-tab">
                    <div class="tab-pane fade" id="tab_one" role="tabpanel">
                        <div class="tab-one">
                            <p>123v1231</p>.....
                        </div>
                    </div>
                    <div class="tab-pane fade active show" id="tab_two" role="tabpanel">
                        <table class="table table-bordered">
                            <tbody>
                                <?php
                                $vnp_HashSecret = "WQYVIZYFBSKXLKEHHQAVWWIYAMUIUCWN";
                                $vnp_SecureHash = $_GET['vnp_SecureHash'];
                                $inputData = array();
                                foreach ($_GET as $key => $value) {
                                    if (substr($key, 0, 4) == "vnp_") {
                                        $inputData[$key] = $value;
                                    }
                                }

                                unset($inputData['vnp_SecureHash']);
                                ksort($inputData);
                                $i = 0;
                                $hashData = "";
                                foreach ($inputData as $key => $value) {
                                    if ($i == 1) {
                                        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
                                    } else {
                                        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                                        $i = 1;
                                    }
                                }

                                $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
                                $customer_id = Session::get('customer_id');
                                $method = 'vnpay';
                                $insertOrder = $ct->insertOrders($customer_id, $method);
                                $amount = $_GET['vnp_Amount'];
                                $trans_code = $_GET['vnp_TransactionNo'];
                                $status = "";
                                if ($_GET['vnp_ResponseCode'] == '00') {
                                    $status = '1';
                                } else {
                                    $status = '2';
                                }

                                if ($secureHash == $vnp_SecureHash) {
                                    if ($_GET['vnp_ResponseCode'] == '00') {
                                        $insertPaid = $ct->insertPaid($amount, $trans_code, $customer_id, $method, $status);
                                    } else {
                                        $insertPaid = $ct->insertPaid($amount, $trans_code, $customer_id, $method, $status);
                                    }
                                } else {
                                    echo "";
                                }

                                $delCart = $ct->del_all_cart();
                                ?>
                                <tr>
                                    <td>Order code:</td>
                                    <td>
                                        <?php echo $_GET['vnp_TxnRef'] ?>
                                    </td>
                                </tr>
                                <tr>

                                    <td>Amount:</td>
                                    <td>
                                        <?php echo $_GET['vnp_Amount'] ?>
                                    </td>
                                </tr>
                                <tr>

                                    <td>Payment content:</td>
                                    <td>
                                        <?php echo $_GET['vnp_OrderInfo'] ?>
                                    </td>
                                </tr>
                                <tr>

                                    <td>Response Code:</td>
                                    <td>
                                        <?php echo $_GET['vnp_ResponseCode'] ?>
                                    </td>
                                </tr>
                                <tr>

                                    <td>Transaction Code:</td>
                                    <td>
                                        <?php echo $_GET['vnp_TransactionNo'] ?>
                                    </td>
                                </tr>
                                <tr>

                                    <td>Bank code:</td>
                                    <td>
                                        <?php echo $_GET['vnp_BankCode'] ?>
                                    </td>
                                </tr>
                                <tr>

                                    <td>Payment time:</td>
                                    <td>
                                        <?php echo $_GET['vnp_PayDate'] ?>
                                    </td>
                                </tr>
                                <tr>

                                    <td>Result:</td>
                                    <td>
                                        <?php if ($secureHash == $vnp_SecureHash) {
                                            if ($_GET['vnp_ResponseCode'] == '00') {
                                                echo "<span style='color:blue'>Payment success</span>";
                                            } else {
                                                echo "<span style='color:red'>Payment not success</span>";
                                            }
                                        } else {
                                            echo "<span style='color:red'>BUGGGGGGGGGGGGGGGG</span>";
                                            Session::destroy();
                                        }
                                        ?>
                                    </td>
                                </tr>


                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
    </div>
    <!-- choosing area end -->

</main>
<!-- main wrapper end -->
<?php
include 'inc/footer.php';
?>