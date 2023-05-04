<?php
include 'inc/header.php';
if (isset($_GET['gate']) && $_GET['gate'] == 'vnpay') {
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrders($customer_id);
    $delCart = $ct->del_all_cart();
}

?>
<main class="body-bg">

    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">

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

                    <form action="paymentgate.php" id="frmCreateOrder" method="post">
                        <div class="order-summary-details">

                            <h2>Confirm Order </h2>
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

                                    </table><br>
                                    <input type="hidden" name="totalamount" value="<?php echo $gtotal;?>">
                                    <button type="submit" class="btn btn__bg" >Thanh toán VNPAY</button>
                                    <br><br>
                                </div>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
    <!-- checkout main wrapper end -->

</main>
<?php
include 'inc/footer.php';
?>