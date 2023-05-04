<?php
include 'inc/header.php';
// if (isset($_GET['orderid']) && $_GET['orderid'] == 'order' ) {
//     $customer_id = Session::get('customer_id');
//     $insertOrder = $ct->insertOrders($customer_id);
//     $delCart = $ct->del_all_cart();
//     header('location:success.php');

// }
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment'])) {
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrders($customer_id);
    $delCart = $ct->del_all_cart();
    
    $payment_method = $_POST['paymentmethod'];
    
    if ($payment_method == 'cash') {
        header('Location: success.php');
        exit;
    } elseif ($payment_method == 'vnpay') {
        header('Location: vnpay.php');
        exit;
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
                                                    <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked="">
                                                    <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                                </div>
                                            </div>
                                            <div class="payment-method-details" data-method="cash" style="">
                                                <p>Pay with cash upon delivery.</p>
                                            </div>
                                        </div>
                                        <div class="single-payment-method">
                                            <div class="payment-method-name">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="vnpay" name="paymentmethod" value="vnpay" class="custom-control-input">
                                                    <label class="custom-control-label" for="vnpay">VNPAY <img src="https://sandbox.vnpayment.vn/paymentv2/Images/brands/logo.svg" class="img-fluid paypal-card" alt="Paypal"></label>
                                                    
                                                </div>
                                            </div>
                                            <div class="payment-method-details" data-method="vnpay" style="display: none;">
                                                <p>Make your payment directly into our bank account. Please use your Order
                                                    ID as the payment reference. Your order will not be shipped until the
                                                    funds have cleared in our account..</p>
                                            </div>
                                        </div>
                                        <div class="single-payment-method">
                                            <div class="payment-method-name">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="checkpayment" name="paymentmethod" value="check" class="custom-control-input">
                                                    <label class="custom-control-label" for="checkpayment">Pay with
                                                        Check</label>
                                                </div>
                                            </div>
                                            <div class="payment-method-details" data-method="check" style="display: none;">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State
                                                    / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                        <div class="single-payment-method">
                                            <div class="payment-method-name">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="paypalpayment" name="paymentmethod" value="paypal" class="custom-control-input">
                                                    <label class="custom-control-label" for="paypalpayment">Paypal <img src="assets/img/paypal-card.jpg" class="img-fluid paypal-card" alt="Paypal"></label>
                                                </div>
                                            </div>
                                            <div class="payment-method-details" data-method="paypal" style="display: none;">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a
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