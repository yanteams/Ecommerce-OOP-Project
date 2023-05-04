<?php
include 'inc/header.php';
?>
<?php
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
    header("Location: 404.php");
} else {
    $id = $_GET['proid'];
}
$customer_id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['compare'])) {
    $productId = $_POST['productId'];
    $insert_compare = $product->insertCompare($productId, $customer_id);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wishlist'])) {
    $productId = $_POST['productId'];
    $insert_compare = $product->insertWishlist($productId, $customer_id);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $product_stock = $_POST['product_stock'];
    $add_to_cart = $ct->addtocart($product_stock,$quantity, $id);
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
                            <h1>product details</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">product details</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper pt-50">
        <div class="container">
            <div class="row">
                <?php
                $get_product_details = $product->get_details($id);
                if ($get_product_details) {
                    while ($result_details = $get_product_details->fetch_assoc()) {

                        ?>
                        <!-- product details wrapper start -->
                        <div class="col-lg-12 order-1 order-lg-2">
                            <!-- product details inner end -->
                            <div class="product-details-inner">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="product-large-slider mb-20">
                                            <div class="pro-large-img img-zoom">
                                                <img src="assets/img/product/product-details-img1.jpg" alt="" />
                                            </div>
                                            <div class="pro-large-img img-zoom">
                                                <img src="assets/img/product/product-details-img2.jpg" alt="" />
                                            </div>
                                            <div class="pro-large-img img-zoom">
                                                <img src="assets/img/product/product-details-img3.jpg" alt="" />
                                            </div>
                                            <div class="pro-large-img img-zoom">
                                                <img src="assets/img/product/product-details-img4.jpg" alt="" />
                                            </div>
                                            <div class="pro-large-img img-zoom">
                                                <img src="assets/img/product/product-details-img5.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="pro-nav slick-row-10 slick-arrow-style">
                                            <div class="pro-nav-thumb">
                                                <img src="assets/img/product/product-details-img1.jpg" alt="" />
                                            </div>
                                            <div class="pro-nav-thumb">
                                                <img src="assets/img/product/product-details-img2.jpg" alt="" />
                                            </div>
                                            <div class="pro-nav-thumb">
                                                <img src="assets/img/product/product-details-img3.jpg" alt="" />
                                            </div>
                                            <div class="pro-nav-thumb">
                                                <img src="assets/img/product/product-details-img4.jpg" alt="" />
                                            </div>
                                            <div class="pro-nav-thumb">
                                                <img src="assets/img/product/product-details-img5.jpg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="product-details-des">
                                            <h5 class="product-name">
                                                <?php echo $result_details['productName']; ?>
                                            </h5>
                                            <div class="ratings">
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <div class="pro-review">
                                                    <span>1 review(s)</span>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="price-regular">$
                                                    <?php echo $fm->format_currency($result_details['price']) . ""; ?>
                                                </span>
                                                <span class="price-old"><del></del></span>
                                            </div>
                                            <?php echo $fm->textShorten($result_details['description'], 250); ?>

                                            <div class="pro-size ">
                                                <h5>Category:</h5>
                                                <p>
                                                    <?php echo $result_details['catName']; ?>
                                                </p>
                                            </div>
                                            <div class="pro-size">
                                                <h5>Brand:</h5>
                                                <p>
                                                    <?php echo $result_details['brandName']; ?>
                                                </p>
                                            </div>
                                            <div class="availability mt-10 mb-20">
                                                <i class="ion-checkmark-circled"></i>
                                                <span><?php echo $result_details['productQuantity']; ?> in stock</span>
                                            </div>
                                            <?php
                                            if (isset($add_to_cart)) {
                                                echo '<span style="color:red">Product already added</span>';
                                            }
                                            ?>
                                            <form action="" method="POST">

                                                <div class="quantity-cart-box d-flex align-items-center">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input type="hidden" value="<?php echo $result_details['productQuantity']; ?>" name="product_stock">
                                                            <input type="number" value="1" min="1" name="quantity">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <?php 
                                                    if($result_details['productQuantity']>0){
                                                        
                                                    ?>
                                                        <button class="btn btn-cart" type="submit" name="submit"><i
                                                                class="ion-bag"></i>Add to
                                                            cart</button>
                                                    <?php
                                                    } 
                                                    ?>
                                                        </div>
                                                </div>
                                            </form>
                                                <div class="pro-size mb-26 mt-26">
                                                    <h5>size :</h5>
                                                    <select class="nice-select">
                                                        <option>S</option>
                                                        <option>M</option>
                                                        <option>L</option>
                                                        <option>XL</option>
                                                    </select>
                                                </div>
                                                <div class="color-option mb-26">
                                                    <h5>color :</h5>
                                                    <select class="nice-select">
                                                        <option>Golden</option>
                                                        <option>White</option>
                                                        <option>Blue</option>
                                                        <option>Pink</option>
                                                    </select>
                                                </div>
                                                <form  action="" method="POST">
                                                <div class="useful-links mt-28">
                                                    <!-- <a href="?compare=<?php echo $result_details['productId']; ?>"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Compare"><i
                                                        class="ion-ios-shuffle"></i>compare</a>
                                                <a href="?wlist=<?php echo $result_details['productId']; ?>"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist"><i
                                                        class="ion-android-favorite-outline"></i>wishlist</a> -->
                                                    <input type="hidden" name="productId"
                                                        value="<?php echo $result_details['productId']; ?>">
                                                    <?php
                                                    $login_check = Session::get('customer_login');
                                                    if ($login_check) {
                                                        echo ' <button name="compare" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Compare"><i class="ion-ios-shuffle"></i> Compare</button>';
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>

                                                   
                                                </div>
                                              
                                                </form>
                                             
                                                <form accept="" method="POST">
                                                <div class="useful-links mt-28">
                                                    <!-- <a href="?compare=<?php echo $result_details['productId']; ?>"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Compare"><i
                                                        class="ion-ios-shuffle"></i>compare</a>
                                                <a href="?wlist=<?php echo $result_details['productId']; ?>"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist"><i
                                                        class="ion-android-favorite-outline"></i>wishlist</a> -->
                                                    <input type="hidden" name="productId"
                                                        value="<?php echo $result_details['productId']; ?>">
                                                    <?php
                                                    $login_check = Session::get('customer_login');
                                                    if ($login_check) {
                                                           echo '<button name="wishlist" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Wishlist"><i class="ion-android-favorite-outline"></i> Wishlist</button>';
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>

                                                   
                                                </div>
                                               
                                                </form>
                                                <?php
                                                if (isset($insert_compare)) {
                                                    echo $insert_compare;
                                                }

                                                    if (isset($insert_wishlist)) {
                                                        echo $insert_wishlist;
                                                }
                                                ?>
                                                <div class="like-icon mt-20">
                                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                                    <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                                    <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                                    <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                                </div>
                                                <div class="share-icon mt-18">
                                                    <h5>share product:</h5>
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product details inner end -->

                            <!-- product details reviews start -->
                            <div class="product-details-reviews mt-50">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="product-review-info">
                                            <ul class="nav review-tab">
                                                <li>
                                                    <a class="active" data-bs-toggle="tab" href="#tab_one">description</a>
                                                </li>
                                                <li>
                                                    <a data-bs-toggle="tab" href="#tab_two">information</a>
                                                </li>
                                                <li>
                                                    <a data-bs-toggle="tab" href="#tab_three">reviews (1)</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content reviews-tab">
                                                <div class="tab-pane fade show active" id="tab_one">
                                                    <div class="tab-one">
                                                        <?php echo $fm->textShorten($result_details['description'], 250); ?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab_two">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td>color</td>
                                                                <td>black, blue, red</td>
                                                            </tr>
                                                            <tr>
                                                                <td>size</td>
                                                                <td>L, M, S</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- <div class="tab-pane fade" id="tab_three">
                                                    <form action="#" class="review-form">
                                                        <h5>1 review for <span>Chaz Kangeroo</span></h5>
                                                        <div class="total-reviews">
                                                            <div class="rev-avatar">
                                                                <img src="assets/img/about/avatar.jpg" alt="">
                                                            </div>
                                                            <div class="review-box">
                                                                <div class="ratings">
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span><i class="fa fa-star"></i></span>
                                                                </div>
                                                                <div class="post-author">
                                                                    <p><span>admin -</span> 30 Mar, 2019</p>
                                                                </div>
                                                                <p>Aliquam fringilla euismod risus ac bibendum. Sed sit
                                                                    amet sem varius ante feugiat lacinia. Nunc ipsum nulla,
                                                                    vulputate ut venenatis vitae, malesuada ut mi. Quisque
                                                                    iaculis, dui congue placerat pretium, augue erat
                                                                    accumsan lacus</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col">
                                                                <label class="col-form-label"><span class="text-danger">*</span>
                                                                    Your Name</label>
                                                                <input type="text" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col">
                                                                <label class="col-form-label"><span class="text-danger">*</span>
                                                                    Your Email</label>
                                                                <input type="email" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col">
                                                                <label class="col-form-label"><span class="text-danger">*</span>
                                                                    Your Review</label>
                                                                <textarea class="form-control" required></textarea>
                                                                <div class="help-block pt-10"><span
                                                                        class="text-danger">Note:</span>
                                                                    HTML is not translated!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col">
                                                                <label class="col-form-label"><span class="text-danger">*</span>
                                                                    Rating</label>
                                                                &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                                <input type="radio" value="1" name="rating">
                                                                &nbsp;
                                                                <input type="radio" value="2" name="rating">
                                                                &nbsp;
                                                                <input type="radio" value="3" name="rating">
                                                                &nbsp;
                                                                <input type="radio" value="4" name="rating">
                                                                &nbsp;
                                                                <input type="radio" value="5" name="rating" checked>
                                                                &nbsp;Good
                                                            </div>
                                                        </div>
                                                        <div class="buttons">
                                                            <button class="sqr-btn" type="submit">Continue</button>
                                                        </div>
                                                    </form> <!-- end of review-form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                <?php }
                } ?>
        </div>
    </div>
    </div>
    <!-- page main wrapper end -->

    <!-- Related product area start -->
    <section class="related-products-area pt-50 pb-50">
        <div class="container">
            <div class="deals-wrapper bg-white">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header-deals">
                            <div class="section-title-deals">
                                <h4>Related Product</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="most-viewed-carousel-2 slick-arrow-style">
                            <!-- product item start -->
                            <div class="product-slide-item">
                                <div class="product-item mb-0">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="assets/img/product/product-10.jpg" alt="">
                                        </a>
                                        <div class="add-to-links">
                                            <a href="wishlist.html" data-bs-toggle="tooltip" title="Add to Wishlist"><i
                                                    class="ion-android-favorite-outline"></i></a>
                                            <a href="compare.html" data-bs-toggle="tooltip" title="Add to Compare"><i
                                                    class="ion-stats-bars"></i></a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                                    data-bs-toggle="tooltip" title="Quick View"><i
                                                        class="ion-eye"></i></span></a>
                                        </div>
                                    </div>
                                    <div class="product-content p-0">
                                        <h5 class="product-name pb-0"><a href="product-details.html">joust duffle
                                                bag</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$50.00</span>
                                            <span class="price-old"><del>$29.99</del></span>
                                        </div>
                                        <div class="product-item-action">
                                            <a class="btn btn-cart" href="cart.html"><i class="ion-bag"></i> Add To
                                                Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product item start -->

                            <!-- product item start -->
                            <div class="product-slide-item">
                                <div class="product-item mb-0">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="assets/img/product/product-2.jpg" alt="">
                                        </a>
                                        <div class="add-to-links">
                                            <a href="wishlist.html" data-bs-toggle="tooltip" title="Add to Wishlist"><i
                                                    class="ion-android-favorite-outline"></i></a>
                                            <a href="compare.html" data-bs-toggle="tooltip" title="Add to Compare"><i
                                                    class="ion-stats-bars"></i></a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                                    data-bs-toggle="tooltip" title="Quick View"><i
                                                        class="ion-eye"></i></span></a>
                                        </div>
                                    </div>
                                    <div class="product-content p-0">
                                        <h5 class="product-name pb-0"><a href="product-details.html">joust duffle
                                                bag</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$50.00</span>
                                            <span class="price-old"><del>$29.99</del></span>
                                        </div>
                                        <div class="product-item-action">
                                            <a class="btn btn-cart" href="cart.html"><i class="ion-bag"></i> Add To
                                                Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product item start -->

                            <!-- product item start -->
                            <div class="product-slide-item">
                                <div class="product-item mb-0">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="assets/img/product/product-3.jpg" alt="">
                                        </a>
                                        <div class="add-to-links">
                                            <a href="wishlist.html" data-bs-toggle="tooltip" title="Add to Wishlist"><i
                                                    class="ion-android-favorite-outline"></i></a>
                                            <a href="compare.html" data-bs-toggle="tooltip" title="Add to Compare"><i
                                                    class="ion-stats-bars"></i></a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                                    data-bs-toggle="tooltip" title="Quick View"><i
                                                        class="ion-eye"></i></span></a>
                                        </div>
                                    </div>
                                    <div class="product-content p-0">
                                        <h5 class="product-name pb-0"><a href="product-details.html">joust duffle
                                                bag</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$50.00</span>
                                            <span class="price-old"><del>$29.99</del></span>
                                        </div>
                                        <div class="product-item-action">
                                            <a class="btn btn-cart" href="cart.html"><i class="ion-bag"></i> Add To
                                                Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product item start -->

                            <!-- product item start -->
                            <div class="product-slide-item">
                                <div class="product-item mb-0">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="assets/img/product/product-4.jpg" alt="">
                                        </a>
                                        <div class="add-to-links">
                                            <a href="wishlist.html" data-bs-toggle="tooltip" title="Add to Wishlist"><i
                                                    class="ion-android-favorite-outline"></i></a>
                                            <a href="compare.html" data-bs-toggle="tooltip" title="Add to Compare"><i
                                                    class="ion-stats-bars"></i></a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                                    data-bs-toggle="tooltip" title="Quick View"><i
                                                        class="ion-eye"></i></span></a>
                                        </div>
                                    </div>
                                    <div class="product-content p-0">
                                        <h5 class="product-name pb-0"><a href="product-details.html">joust duffle
                                                bag</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$50.00</span>
                                            <span class="price-old"><del>$29.99</del></span>
                                        </div>
                                        <div class="product-item-action">
                                            <a class="btn btn-cart" href="cart.html"><i class="ion-bag"></i> Add To
                                                Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product item start -->

                            <!-- product item start -->
                            <div class="product-slide-item">
                                <div class="product-item mb-0">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="assets/img/product/product-9.jpg" alt="">
                                        </a>
                                        <div class="add-to-links">
                                            <a href="wishlist.html" data-bs-toggle="tooltip" title="Add to Wishlist"><i
                                                    class="ion-android-favorite-outline"></i></a>
                                            <a href="compare.html" data-bs-toggle="tooltip" title="Add to Compare"><i
                                                    class="ion-stats-bars"></i></a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                                    data-bs-toggle="tooltip" title="Quick View"><i
                                                        class="ion-eye"></i></span></a>
                                        </div>
                                    </div>
                                    <div class="product-content p-0">
                                        <h5 class="product-name pb-0"><a href="product-details.html">joust duffle
                                                bag</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$50.00</span>
                                            <span class="price-old"><del>$29.99</del></span>
                                        </div>
                                        <div class="product-item-action">
                                            <a class="btn btn-cart" href="cart.html"><i class="ion-bag"></i> Add To
                                                Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product item start -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related product area end -->

</main>
<!-- main wrapper end -->

<!-- Quick view modal start -->
<div class="modal" id="quick_view">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- product details inner end -->
                <div class="product-details-inner">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="product-large-slider mb-20">
                                <div class="pro-large-img">
                                    <img src="assets/img/product/product-details-img1.jpg" alt="" />
                                </div>
                                <div class="pro-large-img">
                                    <img src="assets/img/product/product-details-img2.jpg" alt="" />
                                </div>
                                <div class="pro-large-img">
                                    <img src="assets/img/product/product-details-img3.jpg" alt="" />
                                </div>
                                <div class="pro-large-img">
                                    <img src="assets/img/product/product-details-img4.jpg" alt="" />
                                </div>
                                <div class="pro-large-img">
                                    <img src="assets/img/product/product-details-img5.jpg" alt="" />
                                </div>
                            </div>
                            <div class="pro-nav slick-row-10 slick-arrow-style">
                                <div class="pro-nav-thumb">
                                    <img src="assets/img/product/product-details-img1.jpg" alt="" />
                                </div>
                                <div class="pro-nav-thumb">
                                    <img src="assets/img/product/product-details-img2.jpg" alt="" />
                                </div>
                                <div class="pro-nav-thumb">
                                    <img src="assets/img/product/product-details-img3.jpg" alt="" />
                                </div>
                                <div class="pro-nav-thumb">
                                    <img src="assets/img/product/product-details-img4.jpg" alt="" />
                                </div>
                                <div class="pro-nav-thumb">
                                    <img src="assets/img/product/product-details-img5.jpg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-details-des">
                                <h5 class="product-name">Private Selection Wild Caught Jumbo</h5>
                                <div class="ratings">
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <div class="pro-review">
                                        <span>1 review(s)</span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="price-regular">$70.00</span>
                                    <span class="price-old"><del></del></span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                    voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac
                                    habitasse platea dictumst.</p>
                                <div class="availability mt-10 mb-20">
                                    <i class="ion-checkmark-circled"></i>
                                    <span>200 in stock</span>
                                </div>

                                <div class="quantity-cart-box d-flex align-items-center">
                                    <div class="quantity">
                                        <div class="pro-qty"><input type="text" value="1"></div>
                                    </div>
                                    <div class="action_link">
                                        <a class="btn btn-cart" href="#"><i class="ion-bag"></i>Add to cart</a>
                                    </div>
                                </div>
                                <div class="useful-links mt-28">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Compare"><i
                                            class="ion-ios-shuffle"></i>compare</a>
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist"><i
                                            class="ion-android-favorite-outline"></i>wishlist</a>
                                </div>
                                <div class="like-icon mt-20">
                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                    <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                    <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                    <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- product details inner end -->
            </div>
        </div>
    </div>
</div>
<!-- Quick view modal end -->
<?php
include 'inc/footer.php';
?>