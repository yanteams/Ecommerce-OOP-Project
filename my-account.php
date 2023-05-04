<?php
include 'inc/header.php';
$login_check = Session::get('customer_login');
if ($login_check == false) {
    Session::destroy();
}

$id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $update_customers = $cs->update_customers($_POST, $id);
}
$ct = new cart();
if (isset($_GET['confirmid'])) {
    $id = $_GET['confirmid'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $shifted_confirm = $ct->shifted_confirm($id, $time, $price);
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
                                      
                                        <a href="#orders"  class="active" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                            Orders</a>
                                        <a href="#download" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i>
                                            Download</a>
                                        <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i>
                                            Payment
                                            Method</a>
                                        <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>
                                            address</a>
                                        <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account
                                            Details</a>
                                        <a href="#change-info" data-bs-toggle="tab"><i class="fa fa-edit"></i> Change
                                            Info</a>
                                        <a href="login-register.html"><i class="fa fa-sign-out"></i> Logout</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                     
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Orders</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Total</th>
                                                                <!-- <th>Status</th> -->
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        $id = Session::get('customer_id');
                                                        $getorders_customer = $ct->getorders_customer($id);
                                                        if ($getorders_customer) {
                                                            $i = 0;
                                                            while ($result_orders = $getorders_customer->fetch_assoc()) {
                                                                $i++
                                                                    ?>
                                                                <tbody>

                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $i; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $result_orders['date_order']; ?>
                                                                        </td>

                                                                        <td>
                                                                            <?php echo $fm->format_currency($result_orders['price']); ?>
                                                                        </td>
                                                                        <!-- <td>
                                                                            <?php

                                                                            if ($result_orders['status'] == 0) {
                                                                                echo 'Pending';
                                                                                ?>
                                                                                <?php
                                                                            } elseif ($result_orders['status'] == 1) {

                                                                                echo 'Shifted';
                                                                                ?>
                                                                                <?php
                                                                            } else {
                                                                                echo 'Received';
                                                                            }
                                                                            ?>
                                                                        </td> -->
                                                                        <?php
                                                                        if ($result_orders['status'] == '0') { ?>
                                                                            <td>
                                                                                <?php echo 'N/A'; ?>
                                                                            </td>
                                                                            <?php
                                                                        } elseif ($result_orders['status'] == '1') {
                                                                            ?>
                                                                            <td><a
                                                                                    href="?confirmid=<?php echo $id ?>&price=<?php echo $fm->format_currency($result_orders['price']) ?>&time=<?php
                                                                                          echo $result_orders['date_order'] ?>">Confirmed</a>
                                                                            </td>
                                                                            <?php
                                                                        } else { ?>

                                                                            <td>Received</td>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </tr>
                                                                </tbody>
                                                            <?php }
                                                        } ?>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="download" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Downloads</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Date</th>
                                                                <th>Expire</th>
                                                                <th>Download</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Haven - Free Real Estate PSD Template</td>
                                                                <td>Aug 22, 2018</td>
                                                                <td>Yes</td>
                                                                <td><a href="#" class="btn btn__bg"><i
                                                                            class="fa fa-cloud-download"></i>
                                                                        Download File</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>HasTech - Profolio Business Template</td>
                                                                <td>Sep 12, 2018</td>
                                                                <td>Never</td>
                                                                <td><a href="#" class="btn btn__bg"><i
                                                                            class="fa fa-cloud-download"></i>
                                                                        Download File</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Payment Method</h3>
                                                <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Billing Address</h3>
                                                <address>
                                                    <p><strong>Alex Tuntuni</strong></p>
                                                    <p>1355 Market St, Suite 900 <br>
                                                        San Francisco, CA 94103</p>
                                                    <p>Mobile: (123) 456-7890</p>
                                                </address>
                                                <a href="#account-info" class="btn btn__bg"><i class="fa fa-edit"></i>
                                                    Edit Address</a>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Account Details</h3>
                                                <div class="account-details-form">
                                                    <form action="#">
                                                        <div class="row">
                                                            <?php
                                                            $id = Session::get('customer_id');
                                                            $show_customer = $cs->show_customers($id);
                                                            if ($show_customer) {
                                                                while ($result_info = $show_customer->fetch_assoc()) {

                                                                    ?>
                                                                    <div class="col-lg-6" F>
                                                                        <div class="single-input-item">
                                                                            <label for="first-name" class="required">Full
                                                                                Name</label>
                                                                            <input type="text"
                                                                                placeholder="<?php echo $result_info['fullname']; ?>"
                                                                                disabled />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="last-name" class="required">Email
                                                                                Address</label>
                                                                            <input type="text"
                                                                                placeholder="<?php echo $result_info['email']; ?>"
                                                                                disabled />
                                                                        </div>
                                                                    </div>
                                                                    <div class="single-input-item">
                                                                        <button class="btn btn__bg">Update Profile</button>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                        <fieldset>
                                                            <legend>Password change</legend>
                                                            <div class="single-input-item">
                                                                <label for="current-pwd" class="required">Current
                                                                    Password</label>
                                                                <input type="password" id="current-pwd"
                                                                    placeholder="Current Password" />
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="new-pwd" class="required">New
                                                                            Password</label>
                                                                        <input type="password" id="new-pwd"
                                                                            placeholder="New Password" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="confirm-pwd"
                                                                            class="required">Confirm
                                                                            Password</label>
                                                                        <input type="password" id="confirm-pwd"
                                                                            placeholder="Confirm Password" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="single-input-item">
                                                            <button class="btn btn__bg">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- Single Tab Content End -->
                                        <div class="tab-pane fade" id="change-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Account Details</h3>
                                                <?php
                                                $id = Session::get('customer_id');
                                                $show_customer = $cs->show_customers($id);
                                                if ($show_customer) {
                                                    while ($result_info = $show_customer->fetch_assoc()) {

                                                        ?>
                                                        <div class="account-details-form">
                                                            <form action="" method="POST">

                                                                <div class="row">

                                                                    <div class="col-lg-4">
                                                                        <div class="single-input-item">
                                                                            <label for="first-name" class="required">Full
                                                                                Name</label>
                                                                            <input name="fullname" type="text"
                                                                                value="<?php echo $result_info['fullname']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <div class="single-input-item">
                                                                            <label for="last-name" class="required">Email
                                                                                Address</label>
                                                                            <input name="email" type="text"
                                                                                value="<?php echo $result_info['email']; ?>" />
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <div class="row">

                                                                    <!-- <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="first-name"
                                                                                class="required">City</label>
                                                                            <input type="text"
                                                                                value="<?php echo $result_info['fullname']; ?>"
                                                                                 />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="last-name" class="required">
                                                                                Country</label>
                                                                            <input type="text"
                                                                                value="<?php echo $result_info['email']; ?>"
                                                                                 />
                                                                        </div>
                                                                    </div> -->
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="last-name" class="required">
                                                                                Zip Code</label>
                                                                            <input name="zipcode" type="text"
                                                                                value="<?php echo $result_info['zipcode']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="last-name" class="required">
                                                                                Phone</label>
                                                                            <input name="phone" type="text"
                                                                                value="<?php echo $result_info['phone']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="single-input-item">
                                                                            <label for="last-name" class="required">
                                                                                Address</label>
                                                                            <input name="address" type="text"
                                                                                value="<?php echo $result_info['address']; ?>" />
                                                                        </div>
                                                                    </div>


                                                                </div>

                                                                <div class="single-input-item">
                                                                    <button class="btn btn__bg" type="submit" name="save">Save
                                                                        Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->

</main>
<!-- main wrapper end -->
<?php
include 'inc/footer.php';
?>