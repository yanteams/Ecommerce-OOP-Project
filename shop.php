
<?php 
include 'inc/header.php';
?>
<?php
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
    header("Location: 404.php");
} else {
}
$id = $_GET['catId'];


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
                                <?php 
                                $get_name_by_cat = $cat->get_name_by_cat($id);
                                if($get_name_by_cat){
                                    while($result_name_category=$get_name_by_cat->fetch_assoc()){
                                        
                                ?>
                                <h1>Category: <?php echo $result_name_category['catName'];?> </h1>
                                <?php 
                                    }
                                }else{
                                    echo '<h1 style="color:red">Category not available</h1>';
                                }
                                ?>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">shop</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <!-- sidebar area start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="sidebar-wrapper">
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <h3>categories</h3>
                                </div>
                                <div class="sidebar-body">
                                    <!-- mobile menu navigation start -->
                                    <div class="shop-categories">
                                        <nav>
                                            <ul class="mobile-menu">
                                                <li class="menu-item-has-children"><a href="#">hand tools</a>
                                                    <ul class="dropdown">
                                                        <li><a href="product-details.html">fresh food</a></li>
                                                        <li><a href="product-details.html">junk food</a></li>
                                                        <li><a href="product-details.html">wet food</a></li>
                                                        <li><a href="product-details.html">dry food</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children"><a href="#">digital tools</a>
                                                    <ul class="dropdown">
                                                        <li><a href="product-details.html">fresh food</a></li>
                                                        <li><a href="product-details.html">junk food</a></li>
                                                        <li><a href="product-details.html">wet food</a></li>
                                                        <li><a href="product-details.html">dry food</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children"><a href="#">kids shoppers</a>
                                                    <ul class="dropdown">
                                                        <li><a href="product-details.html">fresh food</a></li>
                                                        <li><a href="product-details.html">junk food</a></li>
                                                        <li><a href="product-details.html">wet food</a></li>
                                                        <li><a href="product-details.html">dry food</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children"><a href="#">electronics</a>
                                                    <ul class="dropdown">
                                                        <li><a href="product-details.html">fresh food</a></li>
                                                        <li><a href="product-details.html">junk food</a></li>
                                                        <li><a href="product-details.html">wet food</a></li>
                                                        <li><a href="product-details.html">dry food</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- mobile menu navigation end -->
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <h3>Price filter</h3>
                                </div>
                                <div class="sidebar-body">
                                    <ul class="radio-container">
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="price" id="customCheck11">
                                                <label class="custom-control-label" for="customCheck11">$7.00 - $9.00 (2)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="price" id="customCheck21">
                                                <label class="custom-control-label" for="customCheck21">$10.00 - $12.00 (3)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="price" id="customCheck31">
                                                <label class="custom-control-label" for="customCheck31">$17.00 - $20.00 (3)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="price" id="customCheck41">
                                                <label class="custom-control-label" for="customCheck41"> $21.00 - $22.00 (1)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="price" id="customCheck51">
                                                <label class="custom-control-label" for="customCheck51">$25.00 - $30.00 (3)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <h3>brand</h3>
                                </div>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Graphic corner</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Studio</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">Hastech</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">Quickiin</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <h3>size</h3>
                                </div>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck111">
                                                <label class="custom-control-label" for="customCheck111">S (4)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck222">
                                                <label class="custom-control-label" for="customCheck222">M (5)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck333">
                                                <label class="custom-control-label" for="customCheck333">L (7)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck444">
                                                <label class="custom-control-label" for="customCheck444">XL (3)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-banner">
                                <div class="img-container">
                                    <a href="#">
                                        <img src="assets/img/banner/sidebar-banner.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- single sidebar end -->
                        </aside>
                    </div>
                    <!-- sidebar area end -->

                    <!-- shop main wrapper start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view"><i class="fa fa-list"></i></a>
                                            </div>
                                            <div class="product-amount">
                                                <p>Showing 1–16 of 21 results</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sort By : </p>
                                                <select class="nice-select" name="sortby">
                                                    <option value="trending">Relevance</option>
                                                    <option value="sales">Name (A - Z)</option>
                                                    <option value="sales">Name (Z - A)</option>
                                                    <option value="rating">Price (Low &gt; High)</option>
                                                    <option value="date">Rating (Lowest)</option>
                                                    <option value="price-asc">Model (A - Z)</option>
                                                    <option value="price-asc">Model (Z - A)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item list start -->
                            <div class="shop-product-wrap grid-view row">
                                <!-- product single item start -->
                                <?php 
$get_product_by_cat = $cat->get_product_by_cat($id);
if($get_product_by_cat){
    while($result_by_cat=$get_product_by_cat->fetch_assoc()){
?>
                                <div class="col-md-4 col-sm-6">
                                    <!-- product grid start -->
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img src="admin/uploads/<?php echo $result_by_cat['image'];?>" alt="">
                                            </a>
                                            <div class="add-to-links">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                <a href="compare.html" data-bs-toggle="tooltip" title="Add to Compare"><i class="ion-stats-bars"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" title="Quick View"><i class="ion-eye"></i></span></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="product-name"><a href="product-details.html"><?php echo $result_by_cat['productName'];?></a></h5>
                                            <div class="price-box">
                                                <span class="price-regular"><?php echo $fm->format_currency($result_by_cat['price']);?></span>
                                                <span class="price-old"><del>$29.99</del></span>
                                            </div>
                                            <div class="product-item-action">
                                                <a class="btn btn-cart" href="product-details.php?proid=<?php echo $result_by_cat['productId'];?>"><i class="ion-bag"></i>Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product grid end -->

                                    <!-- product list item end -->
                                    <div class="product-list-item">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img src="assets/img/product/product-1.jpg" alt="">
                                            </a>
                                            <div class="add-to-links">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                <a href="compare.html" data-bs-toggle="tooltip" title="Add to Compare"><i class="ion-stats-bars"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" title="Quick View"><i class="ion-eye"></i></span></a>
                                            </div>
                                        </div>
                                        <div class="product-content-list">
                                            <div class="ratings">
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                            </div>
                                            <h5 class="product-name"><a href="product-details.html">Private Selection Wild Caught</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$50.00</span>
                                                <span class="price-old"><del>$29.99</del></span>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde perspiciatis
                                                quod numquam, sit fugiat, deserunt ipsa mollitia sunt quam corporis ullam
                                                rem, accusantium adipisci officia eaque.</p>
                                            <div class="product-item-action">
                                                <a class="btn btn-cart" href="cart.html"><i class="ion-bag"></i> Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product list item end -->
                                </div>
  <?php }} ?>                            
                            </div>
                            <!-- product item list end -->

                            <!-- start pagination area -->
                            <div class="paginatoin-area text-center">
                               
                                <ul class="pagination-box">
                                    <li><a class="previous" href="#">Prev</a></li>
                                    <?php 
$product_all = $cat->get_all_product();
$product_count=mysqli_num_rows($product_all);
$product_button = $product_count/4;
$i=1;
for($i=1;$i<$product_button;$i++){
    echo '<li class=""><a href="shop.php?catId='.$id.'&pages='.$i.'">'.$i.'</a></li>';
}
?>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="next" href="#">Next</a></li>
                                </ul>
                            </div>
                            <!-- end pagination area -->
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

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