<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/category.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classess/customer.php');
include_once($filepath . '/../helpers/format.php');

if (isset($_GET['customerid']) && $_GET['customerid'] != NULL && (!isset($_GET['order_code']) || $_GET['order_code'] == NULL)) {
    echo "<script>window.location ='inbox.php'</script>";
} else {
    $id = $_GET['customerid'];
    $order_code = $_GET['order_code'];
}
$cs = new customer();
$fm = new Format();

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $catName = $_POST['catname'];
//     $updatecat = $cat->update_category($catName, $id);
// }



?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Order details</h2>

        <div class="block copyblock">

            <?php
            $get_customers = $cs->show_customers($id);
            if ($get_customers) {
                while ($result = $get_customers->fetch_assoc()) {

                    ?>
                    <form action="" method="POST">
                        <table class="form">
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input name="catname" readonly="readonly" value="<?php echo $result['fullname']; ?>"
                                        type="text" class="medium" />
                                </td>
                            </tr>
                            <tr>

                                <td>Phone</td>
                                <td>
                                    <input name="catname" readonly="readonly" value="<?php echo $result['phone']; ?>"
                                        type="text" class="medium" />
                                </td>
                            </tr>
                            <tr>

                                <td>City</td>
                                <td>
                                    <input name="catname" readonly="readonly" value="<?php echo $result['city']; ?>" type="text"
                                        class="medium" />
                                </td>
                            </tr>
                            <tr>

                                <td>Country</td>
                                <td>
                                    <input name="catname" readonly="readonly" value="<?php echo $result['country']; ?>"
                                        type="text" class="medium" />
                                </td>
                            </tr>
                            <tr>

                                <td>Address</td>
                                <td>
                                    <input name="catname" readonly="readonly" value="<?php echo $result['address']; ?>"
                                        type="text" class="medium" />
                                </td>
                            </tr>
                            <tr>

                                <td>Zip Code</td>
                                <td>
                                    <input name="catname" readonly="readonly" value="<?php echo $result['zipcode']; ?>"
                                        type="text" class="medium" />
                                </td>
                            </tr>
                            <tr>

                                <td>Email</td>
                                <td>
                                    <input name="catname" readonly="readonly" value="<?php echo $result['email']; ?>"
                                        type="text" class="medium" />
                                </td>
                            </tr>

                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                }
            } ?>
        </div>
        <div class="table-responsive">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th scope="col">Product name</th>
                        <th scope="col">Product price</th>
                        <th scope="col">Product image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $get_order = $cs->show_order($order_code);
                    if ($get_order) {
                        $total = 0;
                        $subtotal = 0;
                        while ($result_order = $get_order->fetch_assoc()) {
                            $subtotal = $result_order['quantity'] * $result_order['price'];
                            $total += $subtotal;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $result_order['productName']; ?>
                                </td>
                                <td>
                                    <image src="uploads/<?php echo $result_order['image']; ?>" width="120">
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

                    </table>
                    <?php

                        }
                    } ?>
                     Total Amount:
                                    <?php echo $fm->format_currency($total); ?>
        </div>
       
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();
        });
    </script>
    <?php include 'inc/footer.php'; ?>