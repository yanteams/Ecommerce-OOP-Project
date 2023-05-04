<?php
include 'inc/header.php';
if (isset($_GET['proid'])) {
	$proid = $_GET['proid'];
    $customer_id = Session::get('customer_id');
	$delwishlist= $product->delete_wishlist($proid,$customer_id);
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
                            <h1>wishlist</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">wishlist</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- wishlist main wrapper start -->
    <div class="wishlist-main-wrapper pt-50 pb-50">
        <div class="container">
            <!-- Wishlist Page Content Start -->
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Wishlist Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Thumbnail</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <!-- <th class="pro-quantity">Stock Status</th> -->
                                        <th class="pro-subtotal">Add to Cart</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    $get_wlist = $product->get_wlist($customer_id);
                                    if ($get_wlist) {
                                        $i = 0;
                                        while ($result_wlist = $get_wlist->fetch_assoc()) {
                                            $i++
                                                ?>
                                            <tr>
                                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                            src="admin/uploads/<?php echo $result_wlist['image']; ?>" alt="Product" /></a></td>
                                                <td class="pro-title"><a href="#"><?php echo $result_wlist['productName']; ?></a></td>
                                                <td class="pro-price"><span>$<?php echo $fm->format_currency($result_wlist['price']); ?></span></td>
                                                <!-- <td class="pro-quantity"><span class="text-success">In Stock</span></td> -->
                                                <td class="pro-subtotal"><a href="product-details.php?proid=<?php echo $result_wlist['productId'] ?>" class="btn btn__bg">Add to
                                                        Cart</a></td>
                                                <td class="pro-remove"><a href="?proid=<?php echo $result_wlist['productId'];?>"><i class="fa fa-trash-o"></i></a></td>
                                            </tr>
                                        <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Wishlist Page Content End -->
        </div>
    </div>
    <!-- wishlist main wrapper end -->

</main>
<!-- main wrapper end -->
<?php
include 'inc/footer.php';
?>