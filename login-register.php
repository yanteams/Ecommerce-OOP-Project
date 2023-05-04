<?php
include 'inc/header.php';
$login_check = Session::get('customer_login');
if ($login_check) {
    header('location: order.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $insertCustomers = $cs->insert_customers($_POST);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $login_customers = $cs->login_customers($_POST);
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
                            <h1>login register</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">login register</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- login register wrapper start -->
    <div class="login-register-wrapper pt-50 pb-50">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Login Content Start -->
                    <div class="col-lg-6">
                        <div class="login-reg-form-wrap">
                            <h2>Sign In</h2>
                            <form action="" method="post">
                                <?php if (isset($login_customers)) {
                                    echo $login_customers;
                                } ?>
                                <div class="single-input-item">
                                    <input type="email" name="email" placeholder="Email or Username" />
                                </div>
                                <div class="single-input-item">
                                    <input type="password" name="password" placeholder="Enter your Password" />
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                            </div>
                                        </div>
                                        <a href="#" class="forget-pwd">Forget Password?</a>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button class="btn btn__bg" type="submit" name="login">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login Content End -->

                    <!-- Register Content Start -->
                    <div class="col-lg-6">
                        <div class="login-reg-form-wrap sign-up-form">
                            <h2>Singup Form</h2>

                            <form action="" method="post">
                                <?php if (isset($insertCustomers)) {
                                    echo $insertCustomers;
                                } ?>
                                <div class="single-input-item">
                                    <input name="fullname" type="text" placeholder="Full Name" />
                                </div>
                                <div class="single-input-item">
                                    <input name="email" type="email" placeholder="Enter your Email" />
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input name="password" type="password" placeholder="Enter your Password" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input name="repassword" type="password"
                                                placeholder="Repeat your Password" />
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta">
                                        <div class="remember-meta">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                                <label class="custom-control-label" for="subnewsletter">Subscribe
                                                    Our Newsletter</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button type="submit" name="submit" class="btn btn__bg">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Register Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- login register wrapper end -->

</main>
<!-- main wrapper end -->
<?php
include 'inc/footer.php';
?>