<?php
include 'inc/header.php';
$login_check = Session::get('customer_login');
if ($login_check == false) {
    Session::destroy();
}

$ct = new cart();
if (isset($_GET['received'])) {
    $received = $_GET['received'];
    $received = $ct->confirm_received($received);
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
                                            History Orders</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">

                                        <div class="tab-pane fade show active" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>History Orders</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Order Time</th>
                                                                <th>Order Code</th>
                                                                <th>Customer Name</th>
                                                                <th>Action</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        $customer_id = Session::get('customer_id');
                                                        $get_inbox_cart_history = $ct->get_inbox_cart_history($customer_id);
                                                        if ($get_inbox_cart_history) {
                                                            $i = 0;
                                                            while ($result_history = $get_inbox_cart_history->fetch_assoc()) {
                                                                $i++
                                                                    ?>
                                                                <tbody>

                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $i; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $result_history['date_created']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $result_history['order_code']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $result_history['fullname']; ?>
                                                                        </td>


                                                                        <td><a
                                                                                href="history_order_details.php?customerid=<?php echo $result_history['customer_id']; ?>&order_code=<?php echo $result_history['order_code']; ?>">View
                                                                                order</a>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            if ($result_history['status'] == 1) {
                                                                                ?>
                                                                                <a
                                                                                    href="?received=<?php echo $result_history['order_code']; ?>">Received</a>
                                                                                <?php
                                                                            } elseif ($result_history['status'] == 2) {
                                                                                echo 'Successful Order';
                                                                                ?>

                                                                                <?php
                                                                            }else{
                                                                                echo 'Pending';
                                                                            }
                                                                            ?>

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            <?php }
                                                        } ?>

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