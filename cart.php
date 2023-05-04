<?php
include 'inc/header.php';

if (isset($_GET['cartid'])) {
    $id = $_GET['cartid'];
    $delcart = $ct->del_cart($id);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $stock = $_POST['stock'];
    $update_quantity_cart = $ct->update_quantity_cart($stock, $quantity, $cartId);
    if ($quantity <= 0) {
        $delcart = $ct->del_cart($cartid);
    }
}
if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
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
                            <h1>cart</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">cart</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper pt-50 pb-50">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Thumbnail</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-title">Stock</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-subtotal">Buy</th>
                                        <th class="pro-remove">Update</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <form action="" method="POST">
                                        <?php

                                        $get_product_cart = $ct->get_product_cart();
                                        if ($get_product_cart) {
                                            $subtotal = 0;
                                            $qty = 0;
                                            while ($result = $get_product_cart->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                                src="admin/uploads/<?php echo $result['image']; ?>"
                                                                alt="Product" /></a></td>
                                                    <td class="pro-title"><a href="#">
                                                            <?php echo $result['productName']; ?>
                                                        </a></td>
                                                    <td class="pro-title"><a href="#">
                                                            <?php echo $result['stock']; ?>
                                                        </a></td>
                                                    <td class="pro-price"><span>$
                                                            <?php echo $fm->format_currency($result['price']); ?>
                                                        </span></td>
                                                    <td class="pro-quantity">
                                                        <div class="pro-qty">
                                                            <input type="hidden" name="cartId"
                                                                value="<?php echo $result['cartId']; ?>">
                                                            <input type="hidden" name="stock"
                                                                value="<?php echo $result['stock']; ?>">
                                                            <input type="text" name="quantity" min="0"
                                                                value="<?php echo $result['quantity']; ?>">

                                                        </div>
                                                    </td>
                                                    <td class="pro-subtotal"><span>$
                                                            <?php
                                                            $total = $result['price'] * $result['quantity'];
                                                            echo $fm->format_currency($total);
                                                            ?>
                                                        </span></td>
                                                    <td><input <?php echo $result['status']==1 ? 'checked' : ''?>
                                                     type="checkbox" id="" name="" value="<?php echo $result['cartId']; ?>"
                                                            class="custom-control-input buy_checked">
                                                        <label class="custom-control-label " for="cashon">Purchase</label>
                                                    </td>
                                                    <td> <button name="submit" type="submit" class="btn btn__bg">Update
                                                            Cart</button>
                                                    </td>
                                                    <td class="pro-remove"><a href="?cartid=<?php echo $result['cartId']; ?>"><i
                                                                class="fa fa-trash-o"></i></a>
                                                    </td>
                                            </form>
                                            </tr>
                                            <?php
                                            $subtotal += $total;
                                            $qty = $qty + $result['quantity'];

                                            }
                                        } ?>

                                </tbody>



                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        <div class="cart-update-option d-block d-md-flex justify-content-between">
                            <!-- <div class="apply-coupon-wrapper">
                                <form action="#" method="post" class=" d-block d-md-flex">
                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                    <button class="btn btn__bg btn__sqr">Apply Coupon</button>
                                </form>
                            </div> -->
                            <?php
                            if (isset($update_quantity_cart)) {
                                echo ($update_quantity_cart);
                            }
                            ?>
                            <?php
                            if (isset($delcart)) {
                                echo ($delcart);
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php

                $check_cart = $ct->check_cart();
                if ($check_cart) {
                    ?>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->

                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h3>Cart Totals</h3>
                                    <div class="table-responsive">
                                        <table class="table">


                                            <tr>
                                                <td>Sub Total</td>
                                                <td>
                                                    <?php
                                                    echo $fm->format_currency($subtotal);
                                                    Session::set('sum', $subtotal);
                                                    Session::set('qty', $qty);

                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>VAT</td>
                                                <td>10%</td>
                                            </tr>

                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount">
                                                    <?php
                                                    $vat = $subtotal * 0.1;
                                                    $gtotal = $subtotal + $vat;
                                                    echo $fm->format_currency($gtotal);
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                                <a href="checkout.php" class="btn btn__bg d-block">Proceed To Checkout</a>
                            </div>

                        </div>
                    </div>
                    <?php
                } else {
                    echo '<center><span  style="color:red;font-size:18px" >Your cart is empty</span></center>';
                } ?>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->

</main>
<!-- main wrapper end -->

<?php
include 'inc/footer.php';
?>