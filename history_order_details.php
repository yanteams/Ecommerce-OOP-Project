<?php
include 'inc/header.php';
$login_check = Session::get('customer_login');
if ($login_check == false) {
    Session::destroy();
}

$ct = new cart();

?>

<!-- main wrapper start -->
<main class="body-bg">

    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">

                        <?php
                        if (isset($update_customers)) {
                            echo $update_customers;
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- my account wrapper start -->
    <div class="my-account-wrapper pt-50 pb-50">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">

                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">

                            <!-- My Account Tab Menu Start -->
                            <div class="row">

                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">

                                        <a href="#history" class="active" data-bs-toggle="tab"><i
                                                class="fa fa-cart-arrow-down"></i>
                                            History Order Details</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">

                                        <div class="tab-pane fade show active" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>History Order Details</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">Product name</th>
                                                                <th scope="col">Product price</th>
                                                                <th scope="col">Product image</th>
                                                                <th scope="col">Quantity</th>
                                                                <th scope="col">Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        $order_code = $_GET['order_code'];
                                                        $get_order = $cs->show_order($order_code);
                                                        if ($get_order) {
                                                            $total = 0;
                                                            $subtotal = 0;
                                                            while ($result_order = $get_order->fetch_assoc()) {
                                                                $subtotal = $result_order['quantity'] * $result_order['price'];
                                                                $total += $subtotal;
                                                                ?>
                                                                <tbody>

                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $result_order['productName']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <image
                                                                                src="admin/uploads/<?php echo $result_order['image']; ?>"
                                                                                width="120">
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $fm->format_currency($result_order['price']); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $result_order['quantity']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $fm->format_currency($subtotal); ?>

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            <?php }
                                                        } ?>
                                                        <tr>
                                                            <td colspan="5">
                                                                Total Amount:
                                                                <?php echo $fm->format_currency($total); ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- main wrapper end -->
<?php
include 'inc/footer.php';
?>