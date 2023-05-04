<?php
ob_start();
include 'lib/session.php';
Session::init();
include_once 'lib/database.php';
include_once 'helpers/format.php';
?>
<?php
spl_autoload_register(function ($class) {
    include_once "classess/" . $class . ".php";
});
$db = new Database();
$fm = new Format();
$ct = new cart();
$us = new user();
$cat = new category();
$product = new product();
$slide = new slide();
$cs = new customer();
$settings = new settings();

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Oregon - Multipurpose eCommerce Bootstrap 5 Template</title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />

    <!-- Google fonts include -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,900" rel="stylesheet">

    <!-- All Vendor & plugins CSS include -->
    <link href="assets/css/vendor.css" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!--[if lt IE 9]>
<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

    <!-- Start Header Area -->
    <header class="header-area">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            <!-- header top start -->
            <div class="header-top theme-color">
                <div class="container bdr-bottom">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center">
                                    <li class="language">
                                        <span>Language:</span>
                                        <img src="assets/img/icon/en.png" alt=""> English
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list">
                                            <li><a href="#"><img src="assets/img/icon/en.png" alt=""> english</a></li>
                                            <li><a href="#"><img src="assets/img/icon/fr.png" alt=""> french</a></li>
                                        </ul>
                                    </li>
                                    <li class="curreny-wrap">
                                        <span>Currency:</span>
                                        $ USD
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list curreny-list">
                                            <li><a href="#">$ usd</a></li>
                                            <li><a href="#"> € EURO</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="header-links">
                                <?php
                                if (isset($_GET['customer_id'])) {
                                    $customer_id = $_GET['customer_id'];
                                    $delCart = $ct->del_all_cart();
                                    $delCompare = $ct->del_compare($customer_id);

                                    Session::destroy();
                                }
                                ?>
                                <ul class="nav justify-content-end">
                                    <?php
                                    $login_check = Session::get('customer_login');
                                    if ($login_check == false) {
                                        echo '<li><a href="login-register.php">Register</a></li>
                                        <li><a href="login-register.php">Login</a></li>';
                                    } else {
                                        echo '<li><a href="?customer_id=' . Session::get('customer_id') . '">Logout</a></li>';
                                    }
                                    ?>

                                    <?php ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle area start -->
            <div class="header-middle-area theme-color">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- start logo area -->
                        <div class="col-lg-3">
                            <div class="logo">
                                <a href="index.php">
                                    <?php
                                    $show_slogan = $settings->show_slogan();
                                    if ($show_slogan) {
                                        $i = 0;
                                        while ($result_lg = $show_slogan->fetch_assoc()) {
                                            $i++;
                                            ?>
                                            <img src="admin/uploads/<?php echo $result_lg['logo'];?>" alt="">
                                        <?php }
                                    } ?>
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- start search box area -->
                        <div class="col-lg-5">
                            <div class="search-box-wrapper">
                                <form action="search.php" method="POST" class="search-box-inner">
                                    <input type="text" name="keyword" class="search-field"
                                        placeholder="Enter your search key">
                                    <button class="search-btn" type="submit" name="search_product"><i
                                            class="ion-ios-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- start search box end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-4">
                            <div class="header-configure-wrapper">
                                <div class="support-inner">
                                    <div class="support-icon">
                                        <i class="ion-android-call"></i>
                                    </div>
                                    <div class="support-info">
                                        <p>Free support call:</p>
                                        <strong><a href="tel:+881234567899">+88 123 456 7899</a></strong>
                                    </div>
                                </div>
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                        <li>
                                            <a href="wishlist.php">
                                                <i class="ion-android-favorite-outline"></i>
                                                <span class="notify">0</span>
                                            </a>
                                        </li>
                                        <li class="mini-cart-wrap">
                                            <a href="cart.php">
                                                <i class="ion-bag"></i>
                                                <span class="notify">
                                                    <?php
                                                    $check_cart = $ct->check_cart();
                                                    if ($check_cart) {
                                                        $qty = Session::get('qty');
                                                        echo $qty;
                                                    } else {
                                                        echo '0';
                                                    }

                                                    ?>
                                                </span>
                                            </a>
                                            <div class="cart-list-wrapper">
                                                <ul class="cart-list">
                                                    <li>
                                                        <div class="cart-img">
                                                            <a href="product-details.php"><img
                                                                    src="assets/img/cart/cart-1.jpg" alt=""></a>
                                                        </div>
                                                        <div class="cart-info">
                                                            <h4><a href="product-details.php">7th Generation classic
                                                                    smart headset</a></h4>
                                                            <span class="cart-qty">Qty: 1</span>
                                                            <span>$60.00</span>
                                                        </div>
                                                        <div class="del-icon">
                                                            <i class="fa fa-times"></i>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cart-img">
                                                            <a href="product-details.php"><img
                                                                    src="assets/img/cart/cart-2.jpg" alt=""></a>
                                                        </div>
                                                        <div class="cart-info">
                                                            <h4><a href="product-details.php">Digital 8th generation
                                                                    gadget product</a></h4>
                                                            <span class="cart-qty">Qty: 2</span>
                                                            <span>$70.00</span>
                                                        </div>
                                                        <div class="del-icon">
                                                            <i class="fa fa-times"></i>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="minicart-pricing-box">
                                                    <li>
                                                        <span>sub-total</span>
                                                        <span><strong>$300.00</strong></span>
                                                    </li>
                                                    <li>
                                                        <span>Eco Tax (-2.00)</span>
                                                        <span><strong>$10.00</strong></span>
                                                    </li>
                                                    <li>
                                                        <span>VAT (20%)</span>
                                                        <span><strong>$60.00</strong></span>
                                                    </li>
                                                    <li class="total">
                                                        <span>total</span>
                                                        <span><strong>$370.00</strong></span>
                                                    </li>
                                                </ul>
                                                <div class="minicart-button">
                                                    <a href="cart.php"><i class="fa fa-shopping-cart"></i> view
                                                        cart</a>
                                                    <a href="cart.php"><i class="fa fa-share"></i> checkout</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- mini cart area end -->
                    </div>
                </div>
            </div>
            <!-- header middle area end -->

            <!-- main menu area start -->
            <div class="main-menu-area bg-white sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="category-toggle-wrap">
                                <div class="category-toggle">
                                    <i class="ion-android-menu"></i>
                                    categories
                                </div>
                                <nav class="category-menu">
                                    <ul class="categories-list">

                                        <!-- <li class="menu-item-has-children"><a href="shop.php">Fresh Meat</a>
                                            <ul class="category-mega-menu dropdown three-column">
                                                <li class="menu-item-has-children">
                                                    <a href="shop.php">Smartphone</a>
                                                    <ul class="dropdown">
                                                        <li><a href="shop.php">Samsome</a></li>
                                                        <li><a href="shop.php">GL Stylus</a></li>
                                                        <li><a href="shop.php">Uawei</a></li>
                                                        <li><a href="shop.php">Cherry Berry</a></li>
                                                        <li><a href="shop.php">uPhone</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="shop.php">headphone</a>
                                                    <ul class="dropdown">
                                                        <li><a href="shop.php">Desktop Headphone</a></li>
                                                        <li><a href="shop.php">Mobile Headphone</a></li>
                                                        <li><a href="shop.php">Wireless Headphone</a></li>
                                                        <li><a href="shop.php">LED Headphone</a></li>
                                                        <li><a href="shop.php">Over-ear</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="shop.php">accessories</a>
                                                    <ul class="dropdown">
                                                        <li><a href="shop.php">Power Bank</a></li>
                                                        <li><a href="shop.php">Data Cable</a></li>
                                                        <li><a href="shop.php">Power Cable</a></li>
                                                        <li><a href="shop.php">Battery</a></li>
                                                        <li><a href="shop.php">OTG Cable</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li> -->
                                        <?php
                                        $get_all_category = $cat->get_all_category();
                                        if ($get_all_category) {
                                            while ($result_all_category = $get_all_category->fetch_assoc()) {

                                                ?>
                                                <li><a href="shop.php?catId=<?php echo $result_all_category['catID']; ?>"><?php echo $result_all_category['catName']; ?></a></li>
                                            <?php }
                                        } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="main-menu main-menu-style-1">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        <li class="active"><a href="index.php">Home <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="index.php">Home version 01</a></li>
                                                <li><a href="index-2.php">Home version 02</a></li>
                                                <li><a href="index-3.php">Home version 03</a></li>
                                                <li><a href="index-4.php">Home version 04</a></li>
                                            </ul>
                                        </li>
                                        <?php
                                        $check_cart = $ct->check_cart();
                                        if ($check_cart == true) {
                                            echo '<li><a href="cart.php">Cart</a></li>';
                                        } else {
                                            echo '';
                                        }
                                        ?>

                                        <?php
                                        $login_check = Session::get('customer_login');
                                        if ($login_check == false) {
                                            echo '';
                                        } else {
                                            echo '<li><a href="my-account.php">Profile</a></li>';
                                            echo '<li><a href="history_order.php">Orders placed</a></li>';
                                        }
                                        ?>
                                        <?php
                                        $login_check = Session::get('customer_login');
                                        if ($login_check) {
                                            echo '<li><a href="compare.php">Compare</a></li>';
                                            echo '<li><a href="wishlist.php">Wishlist</a></li>';
                                        } else {
                                            echo '';
                                        }
                                        ?>

                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main menu area end -->
        </div>
        <!-- main header start -->

        <!-- mobile header start -->
        <div class="mobile-header d-lg-none d-md-block sticky">
            <!--mobile header top start -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="index.php">
                                    <img src="assets/img/logo/logo-black.png" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                    <a href="cart.php">
                                        <i class="ion-bag"></i>
                                    </a>
                                </div>
                                <div class="mobile-menu-btn">
                                    <div class="off-canvas-btn">
                                        <i class="ion-android-menu"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="category-toggle-wrap">
                            <div class="category-toggle">
                                <i class="ion-android-menu"></i>
                                all categories
                                <span><i class="ion-android-arrow-dropdown"></i></span>
                            </div>
                            <nav class="category-menu">
                                <ul class="categories-list">
                                    <li class="menu-item-has-children"><a href="shop.php">Fruits & Vegetables</a>
                                        <!-- Mega Category Menu Start -->
                                        <ul class="category-mega-menu dropdown">
                                            <li class="menu-item-has-children">
                                                <a href="shop.php">Smartphone</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.php">Samsome</a></li>
                                                    <li><a href="shop.php">GL Stylus</a></li>
                                                    <li><a href="shop.php">Uawei</a></li>
                                                    <li><a href="shop.php">Cherry Berry</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="shop.php">headphone</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.php">Desktop Headphone</a></li>
                                                    <li><a href="shop.php">Mobile Headphone</a></li>
                                                    <li><a href="shop.php">Wireless Headphone</a></li>
                                                    <li><a href="shop.php">LED Headphone</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="shop.php">accessories</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.php">Power Bank</a></li>
                                                    <li><a href="shop.php">Data Cable</a></li>
                                                    <li><a href="shop.php">Power Cable</a></li>
                                                    <li><a href="shop.php">Battery</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="shop.php">headphone</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.php">Desktop Headphone</a></li>
                                                    <li><a href="shop.php">Mobile Headphone</a></li>
                                                    <li><a href="shop.php">Wireless Headphone</a></li>
                                                    <li><a href="shop.php">LED Headphone</a></li>
                                                </ul>
                                            </li>
                                        </ul><!-- Mega Category Menu End -->
                                    </li>
                                    <li class="menu-item-has-children"><a href="shop.php">Fresh Meat</a>
                                        <!-- Mega Category Menu Start -->
                                        <ul class="category-mega-menu dropdown three-column">
                                            <li class="menu-item-has-children">
                                                <a href="shop.php">Smartphone</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.php">Samsome</a></li>
                                                    <li><a href="shop.php">GL Stylus</a></li>
                                                    <li><a href="shop.php">Uawei</a></li>
                                                    <li><a href="shop.php">Cherry Berry</a></li>
                                                    <li><a href="shop.php">uPhone</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="shop.php">headphone</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.php">Desktop Headphone</a></li>
                                                    <li><a href="shop.php">Mobile Headphone</a></li>
                                                    <li><a href="shop.php">Wireless Headphone</a></li>
                                                    <li><a href="shop.php">LED Headphone</a></li>
                                                    <li><a href="shop.php">Over-ear</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="shop.php">accessories</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.php">Power Bank</a></li>
                                                    <li><a href="shop.php">Data Cable</a></li>
                                                    <li><a href="shop.php">Power Cable</a></li>
                                                    <li><a href="shop.php">Battery</a></li>
                                                    <li><a href="shop.php">OTG Cable</a></li>
                                                </ul>
                                            </li>
                                        </ul><!-- Mega Category Menu End -->
                                    </li>
                                    <li class="menu-item-has-children"><a href="shop.php">dairy & eggs</a>
                                        <!-- Mega Category Menu Start -->
                                        <ul class="category-mega-menu dropdown two-column">
                                            <li class="menu-item-has-children">
                                                <a href="shop.php">Smartphone</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.php">Samsome</a></li>
                                                    <li><a href="shop.php">GL Stylus</a></li>
                                                    <li><a href="shop.php">Uawei</a></li>
                                                    <li><a href="shop.php">Cherry Berry</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="shop.php">headphone</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.php">Desktop Headphone</a></li>
                                                    <li><a href="shop.php">Mobile Headphone</a></li>
                                                    <li><a href="shop.php">Wireless Headphone</a></li>
                                                    <li><a href="shop.php">LED Headphone</a></li>
                                                </ul>
                                            </li>
                                        </ul><!-- Mega Category Menu End -->
                                    </li>
                                    <li><a href="shop.php">Frozen</a></li>
                                    <li><a href="shop.php">Grocery</a></li>
                                    <li><a href="shop.php">Kitchenware</a></li>
                                    <li><a href="shop.php">Tools</a></li>
                                    <li><a href="shop.php">Electronics</a></li>
                                    <li><a href="shop.php">Kitchenware</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile header top start -->
        </div>
        <!-- mobile header end -->
    </header>
    <!-- end Header Area -->

    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="ion-android-close"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Search Here...">
                        <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><a href="#">Home</a>
                                <ul class="dropdown">
                                    <li><a href="index.php">Home version 01</a></li>
                                    <li><a href="index-2.php">Home version 02</a></li>
                                    <li><a href="index-3.php">Home version 03</a></li>
                                    <li><a href="index-4.php">Home version 04</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">pages</a>
                                <ul class="megamenu dropdown">
                                    <li class="mega-title has-children"><a href="#">column 01</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.php">shop grid left
                                                    sidebar</a></li>
                                            <li><a href="shop-grid-right-sidebar.php">shop grid right
                                                    sidebar</a></li>
                                            <li><a href="shop-list-left-sidebar.php">shop list left sidebar</a></li>
                                            <li><a href="shop-list-right-sidebar.php">shop list right sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">column 02</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.php">product details</a></li>
                                            <li><a href="product-details-affiliate.php">product
                                                    details
                                                    affiliate</a></li>
                                            <li><a href="product-details-variable.php">product details
                                                    variable</a></li>
                                            <li><a href="product-details-group.php">product details
                                                    group</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">column 03</a>
                                        <ul class="dropdown">
                                            <li><a href="cart.php">cart</a></li>
                                            <li><a href="checkout.php">checkout</a></li>
                                            <li><a href="compare.php">compare</a></li>
                                            <li><a href="wishlist.php">wishlist</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">column 04</a>
                                        <ul class="dropdown">
                                            <li><a href="my-account.php">my-account</a></li>
                                            <li><a href="login-register.php">login-register</a></li>
                                            <li><a href="about-us.php">about us</a></li>
                                            <li><a href="contact-us.php">contact us</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="#">shop</a>
                                <ul class="dropdown">
                                    <li class="has-children"><a href="#">shop grid layout</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.php">shop grid left sidebar</a></li>
                                            <li><a href="shop-grid-right-sidebar.php">shop grid right sidebar</a></li>
                                            <li><a href="shop-grid-full-3-col.php">shop grid full 3 col</a></li>
                                            <li><a href="shop-grid-full-4-col.php">shop grid full 4 col</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children"><a href="#">shop list layout</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-list-left-sidebar.php">shop list left sidebar</a></li>
                                            <li><a href="shop-list-right-sidebar.php">shop list right sidebar</a></li>
                                            <li><a href="shop-list-full-width.php">shop list full width</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children"><a href="#">products details</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.php">product details</a></li>
                                            <li><a href="product-details-affiliate.php">product details affiliate</a>
                                            </li>
                                            <li><a href="product-details-variable.php">product details variable</a>
                                            </li>
                                            <li><a href="product-details-group.php">product details group</a></li>
                                            <li><a href="product-details-box.php">product details box</a></li>
                                            <li><a href="product-details-sticky-left.php">product details sticky
                                                    left</a></li>
                                            <li><a href="product-details-sticky-right.php">product details sticky
                                                    right</a></li>
                                            <li><a href="product-details-gallery-left.php">product details gallery
                                                    left</a></li>
                                            <li><a href="product-details-gallery-right.php">product details gallery
                                                    right</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="#">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog-left-sidebar.php">blog left sidebar</a></li>
                                    <li><a href="blog-left-sidebar-2-col.php">blog left sidebar 2 col</a></li>
                                    <li><a href="blog-right-sidebar.php">blog right sidebar</a></li>
                                    <li><a href="blog-right-sidebar-2-col.php">blog right sidebar 2 col</a></li>
                                    <li><a href="blog-grid-full-width.php">blog grid full width</a></li>
                                    <li><a href="blog-list-full-width.php">blog list full width</a></li>
                                    <li><a href="blog-details.php">blog details</a></li>
                                    <li><a href="blog-details-left-sidebar.php">blog details left sidebar</a></li>
                                    <li><a href="blog-details-audio.php">blog details audio</a></li>
                                    <li><a href="blog-details-video.php">blog details video</a></li>
                                    <li><a href="blog-details-image.php">blog details image</a></li>
                                </ul>
                            </li>
                            <li><a href="contact-us.php">Contact us</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <div class="mobile-settings">
                    <ul class="nav">
                        <li>
                            <div class="dropdown mobile-top-dropdown">
                                <a href="#" class="dropdown-toggle" id="currency" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Currency
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="currency">
                                    <a class="dropdown-item" href="#">$ USD</a>
                                    <a class="dropdown-item" href="#">$ EURO</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown mobile-top-dropdown">
                                <a href="#" class="dropdown-toggle" id="myaccount" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    My Account
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="myaccount">
                                    <a class="dropdown-item" href="my-account.php">my account</a>
                                    <a class="dropdown-item" href="login-register.php"> login</a>
                                    <a class="dropdown-item" href="login-register.php">register</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <ul>
                            <li><i class="fa fa-mobile"></i>
                                <a href="#">0123456789</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="#">info@yourdomain.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->