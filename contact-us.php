<?php 
include 'inc/header.php';
?>
    <!-- main wrapper start -->
    <main>

        <!-- breadcrumb area start -->
        <div class="breadcrumb-area breadcrumb-area-style_2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <h1>contact us</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">contact us</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- contact area start -->
        <div class="contact-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-message">
                            <h2>tell us your project</h2>
                            <form id="contact-form" action="https://htmldemo.net/oregon/oregon/assets/php/mail.php" method="post" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="first_name" placeholder="Name *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="phone" placeholder="Phone *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="email_address" placeholder="Email *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="contact_subject" placeholder="Subject *" type="text">
                                    </div>
                                    <div class="col-12">
                                        <div class="contact2-textarea text-center">
                                            <textarea placeholder="Message *" name="message" class="form-control2" required=""></textarea>
                                        </div>
                                        <div class="contact-btn">
                                            <button class="btn btn__bg" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <h2>contact us</h2>
                            <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum
                                est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum
                                formas human.</p>
                            <ul>
                                <li><i class="fa fa-fax"></i> Address : No 40 Baria Sreet 133/2 NewYork City</li>
                                <li><i class="fa fa-phone"></i> info@yourdomain.com</li>
                                <li><i class="fa fa-envelope-o"></i> +88013245657</li>
                            </ul>
                            <div class="working-time">
                                <h3>Working hours</h3>
                                <p><span>Monday – Saturday:</span>08AM – 22PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area end -->

    </main>
    <!-- main wrapper end -->
    <?php
include 'inc/footer.php';
?>