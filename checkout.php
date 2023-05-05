<?php
include 'inc/header.php';
// if (isset($_GET['orderid']) && $_GET['orderid'] == 'order' ) {
//     $customer_id = Session::get('customer_id');
//     $insertOrder = $ct->insertOrders($customer_id);
//     $delCart = $ct->del_all_cart();
//     header('location:success.php');

// }
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment'])) {

    $payment_method = $_POST['paymentmethod'];

    if ($payment_method == 'cash') {
        header('Location: pay.php?gate=cash');
    } elseif ($payment_method == 'vnpay') {
        header('Location: pay.php?gate=vnpay');
    } elseif ($payment_method == 'momocode') {
        header('Location: pay.php?gate=momocode');
    } elseif ($payment_method == 'momoatm') {
        header('Location: pay.php?gate=momoatm');
        // } elseif ($payment_method == 'pay_with_check') {
        //     header('Location: pay_with_check.php');
        //     exit;
        // } elseif ($payment_method == 'paypal') {
        //     header('Location: paypal.php');
        //     exit;
        // }

    } else {
        echo '';
    }
}

?>

<!-- main wrapper start -->
<main class="body-bg">

    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <h1>checkout</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">checkout</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper">
        <div class="container">

            <div class="section-bg-color">
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h2>Billing Details</h2>
                            <div class="billing-form-wrap">

                                <form action="#">
                                    <?php
                                    $id = Session::get('customer_id');
                                    $show_customer = $cs->show_customers($id);
                                    if ($show_customer) {
                                        while ($result_info = $show_customer->fetch_assoc()) {

                                            ?>
                                            <!-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name" class="required">First Name</label>
                                                <input type="text" id="f_name" placeholder="First Name" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="l_name" class="required">Last Name</label>
                                                <input type="text" id="l_name" placeholder="Last Name" required />
                                            </div>
                                        </div>
                                    </div> -->


                                            <div class="single-input-item">
                                                <label for="com-name">Full Name</label>
                                                <input type="text" placeholder="Full Name"
                                                    value="<?php echo $result_info['fullname']; ?>" disabled />
                                            </div>
                                            <div class="single-input-item">
                                                <label for="email" class="required">Email Address</label>
                                                <input type="email" value="<?php echo $result_info['email']; ?>"
                                                    placeholder="Email Address" disabled />
                                            </div>
                                            <!-- 
                                    <div class="single-input-item">
                                        <label for="country" class="required">Country</label>
                                        <select name="country nice-select" id="country">
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="India">India</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="England">England</option>
                                            <option value="London">London</option>
                                            <option value="London">London</option>
                                            <option value="Chaina">China</option>
                                        </select>
                                    </div> -->

                                            <div class="single-input-item">
                                                <label for="street-address" class="required mt-20">Street address</label>
                                                <input type="text" value="<?php echo $result_info['address']; ?>"
                                                    placeholder="Street address Line 1" disabled />
                                            </div>

                                            <!-- <div class="single-input-item">
                                        <input type="text" placeholder="Street address Line 2 (Optional)" />
                                    </div> -->

                                            <!-- <div class="single-input-item">
                                        <label for="town" class="required">Town / City</label>
                                        <input type="text" id="town" placeholder="Town / City" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="state">State / Divition</label>
                                        <input type="text" id="state" placeholder="State / Divition" />
                                    </div> -->

                                            <div class="single-input-item">
                                                <label for="postcode" class="required">Postcode / ZIP</label>
                                                <input type="text" value="<?php echo $result_info['zipcode']; ?>"
                                                    placeholder="Postcode / ZIP" disabled />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="phone">Phone</label>
                                                <input type="text" value="<?php echo $result_info['phone']; ?>"
                                                    placeholder="Phone" disabled />
                                            </div>
                                            <!-- 
                                    <div class="checkout-box-wrap">
                                        <div class="single-input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="create_pwd">
                                                <label class="custom-control-label" for="create_pwd">Create an
                                                    account?</label>
                                            </div>
                                        </div>
                                        <div class="account-create single-form-row">
                                            <p>Create an account by entering the information below. If you are a
                                                returning customer please login at the top of the page.</p>
                                            <div class="single-input-item">
                                                <label for="pwd" class="required">Account Password</label>
                                                <input type="password" id="pwd" placeholder="Account Password"
                                                    required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="checkout-box-wrap">
                                        <div class="single-input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="ship_to_different">
                                                <label class="custom-control-label" for="ship_to_different">Ship to a
                                                    different address?</label>
                                            </div>
                                        </div>
                                        <div class="ship-to-different single-form-row">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="single-input-item">
                                                        <label for="f_name_2" class="required">First Name</label>
                                                        <input type="text" id="f_name_2" placeholder="First Name"
                                                            required />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="single-input-item">
                                                        <label for="l_name_2" class="required">Last Name</label>
                                                        <input type="text" id="l_name_2" placeholder="Last Name"
                                                            required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="single-input-item">
                                                <label for="email_2" class="required">Email Address</label>
                                                <input type="email" id="email_2" placeholder="Email Address" required />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="com-name_2">Company Name</label>
                                                <input type="text" id="com-name_2" placeholder="Company Name" />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="country_2" class="required">Country</label>
                                                <select name="country" id="country_2">
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="India">India</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="England">England</option>
                                                    <option value="London">London</option>
                                                    <option value="London">London</option>
                                                    <option value="Chaina">Chaina</option>
                                                </select>
                                            </div>

                                            <div class="single-input-item">
                                                <label for="street-address_2" class="required mt-20">Street
                                                    address</label>
                                                <input type="text" id="street-address_2"
                                                    placeholder="Street address Line 1" required />
                                            </div>

                                            <div class="single-input-item">
                                                <input type="text" placeholder="Street address Line 2 (Optional)" />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="town_2" class="required">Town / City</label>
                                                <input type="text" id="town_2" placeholder="Town / City" required />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="state_2">State / Divition</label>
                                                <input type="text" id="state_2" placeholder="State / Divition" />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="postcode_2" class="required">Postcode / ZIP</label>
                                                <input type="text" id="postcode_2" placeholder="Postcode / ZIP"
                                                    required />
                                            </div>
                                        </div>
                                    </div> -->

                                            <!-- <div class="single-input-item">
                                        <label for="ordernote">Order Note</label>
                                        <textarea name="ordernote" id="ordernote" cols="30" rows="3"
                                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div> -->
                                            <div class="single-input-item">
                                                <a href="my-account.php" type="submit" class="btn btn__bg">Update profile</a>

                                            </div>
                                        <?php }
                                    } ?>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <form action="" method="POST">

                            <div class="order-summary-details">

                                <h2>Your Order Summary</h2>
                                <div class="order-summary-content">
                                    <!-- Order Summary Table -->
                                    <div class="order-summary-table table-responsive text-center">

                                        <table class="table table-bordered">

                                            <thead>
                                                <tr>
                                                    <th>Products</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php

                                                $get_product_cart = $ct->get_product_cart();
                                                if ($get_product_cart) {
                                                    $subtotal = 0;
                                                    $qty = 0;
                                                    $i = 0;
                                                    while ($result = $get_product_cart->fetch_assoc()) {
                                                        ?>
                                                        <tr>
                                                            <td><a href="single-product.html">
                                                                    <?php echo $result['productName']; ?> <strong> ×
                                                                        <?php echo $result['quantity']; ?>
                                                                    </strong>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $total = $result['price'] * $result['quantity'];
                                                                echo $fm->format_currency($total);
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $subtotal += $total;
                                                        $qty = $qty + $result['quantity'];

                                                    }
                                                } ?>
                                            </tbody>

                                            <?php

                                            $check_cart = $ct->check_cart();
                                            if ($check_cart) {
                                                ?>
                                                <tfoot>
                                                    <tr>
                                                        <td>Sub Total</td>
                                                        <td><strong>
                                                                <?php
                                                                echo $fm->format_currency($subtotal);
                                                                Session::set('sum', $subtotal);
                                                                Session::set('qty', $qty);

                                                                ?>
                                                            </strong></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Total Amount</td>
                                                        <td><strong>
                                                                <?php
                                                                $vat = $subtotal * 0.1;
                                                                $gtotal = $subtotal + $vat;
                                                                echo $fm->format_currency($gtotal);
                                                                ?>
                                                            </strong></td>
                                                    </tr>
                                                </tfoot>

                                                <?php
                                            } ?>

                                        </table>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="order-payment-method">
                                            <div class="single-payment-method show">
                                                <div class="payment-method-name">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="cashon" name="paymentmethod"
                                                            value="cash" class="custom-control-input" checked="">
                                                        <label class="custom-control-label" for="cashon">Cash On
                                                            Delivery</label>
                                                    </div>
                                                </div>
                                                <div class="payment-method-details" data-method="cash" style="">
                                                    <p>Pay with cash upon delivery.</p>
                                                </div>
                                            </div>
                                            <div class="single-payment-method">
                                                <div class="payment-method-name">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="vnpay" name="paymentmethod"
                                                            value="vnpay" class="custom-control-input">
                                                        <label class="custom-control-label" for="vnpay">VNPAY <img
                                                                src="https://sandbox.vnpayment.vn/paymentv2/Images/brands/logo.svg"
                                                                class="img-fluid paypal-card" alt="Paypal"></label>

                                                    </div>
                                                </div>
                                                <div class="payment-method-details" data-method="vnpay"
                                                    style="display: none;">
                                                    <p>Make your payment directly into our bank account. Please use your
                                                        Order
                                                        ID as the payment reference. Your order will not be shipped
                                                        until the
                                                        funds have cleared in our account..</p>
                                                </div>
                                            </div>
                                            <div class="single-payment-method">
                                                <div class="payment-method-name">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="momocode" name="paymentmethod"
                                                            value="momocode" class="custom-control-input">
                                                        <label class="custom-control-label" for="momocode">QRCODE
                                                            MOMO<img
                                                                src="data:image/png;base64,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"
                                                                class="img-fluid paypal-card" alt="Paypal"></label>
                                                    </div>
                                                </div>
                                                <div class="payment-method-details" data-method="momocode"
                                                    style="display: none;">
                                                    <p>Make your payment directly into our bank account. Please use your
                                                        Order
                                                        ID as the payment reference. Your order will not be shipped
                                                        until the
                                                        funds have cleared in our account..</p>
                                                </div>
                                            </div>
                                            <div class="single-payment-method">
                                                <div class="payment-method-name">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="momoatm" name="paymentmethod"
                                                            value="momoatm" class="custom-control-input">
                                                        <label class="custom-control-label" for="momoatm">ATM
                                                            MOMO<img
                                                                src="data:image/png;base64,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"
                                                                class="img-fluid paypal-card" alt="Paypal"></label>
                                                    </div>
                                                </div>
                                                <div class="payment-method-details" data-method="momoatm"
                                                    style="display: none;">
                                                    <p>Make your payment directly into our bank account. Please use your
                                                        Order
                                                        ID as the payment reference. Your order will not be shipped
                                                        until the
                                                        funds have cleared in our account..</p>
                                                </div>
                                            </div>
                                            <div class="single-payment-method">
                                                <div class="payment-method-name">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="paypalpayment" name="paymentmethod"
                                                            value="paypal" class="custom-control-input">
                                                        <label class="custom-control-label" for="paypalpayment">Paypal
                                                            <img src="assets/img/paypal-card.jpg"
                                                                class="img-fluid paypal-card" alt="Paypal"></label>
                                                    </div>
                                                </div>
                                                <div class="payment-method-details" data-method="paypal"
                                                    style="display: none;">
                                                    <p>Pay via PayPal; you can pay with your credit card if you don’t
                                                        have a
                                                        PayPal account.</p>
                                                </div>
                                            </div>
                                            <!-- <div class="summary-footer-area">
                                            <div class="custom-control custom-checkbox mb-20">
                                                <input type="checkbox" class="custom-control-input" id="terms" required="">
                                                <label class="custom-control-label" for="terms">I have read and agree to
                                                    the website <a href="index.html">terms and conditions.</a></label>
                                            </div>
                                        -->
                                            <button type="submit" name="payment" class="btn btn__bg">Place
                                                Order</button>
                                    </form>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout main wrapper end -->

</main>
<!-- main wrapper end -->
<?php
include 'inc/footer.php';
?>