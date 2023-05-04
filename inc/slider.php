<main class="body-bg">

    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-dot-style">
            <!-- single slider item start -->
            <!-- main wrapper start -->
            <?php
            $get_slide = $slide->show_slide();
            if ($get_slide) {
                while ($result_slide = $get_slide->fetch_assoc()) {

                    ?>
                    <div class="hero-slider-item">
                        <div class="d-flex align-items-center bg-img h-100"
                            data-bg="admin/uploads/slide/<?php echo $result_slide['image']; ?>">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="hero-slider-content">
                                            <h2>
                                                <?php echo $result_slide['slideTitle']; ?>
                                            </h2>
                                            <h1>
                                                <?php echo $result_slide['shortDescription']; ?>
                                            </h1>
                                            <h3>
                                                <?php echo $result_slide['description']; ?>
                                            </h3>
                                            <a href="shop.php" class="btn-hero">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single slider item end -->

                <?php }
            } ?>
        </div>
    </section>