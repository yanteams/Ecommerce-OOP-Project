<?php
include 'inc/header.php';
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
                            <h1>compare</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">compare</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- compare main wrapper start -->
    <div class="compare-page-wrapper pt-50 pb-50">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Compare Page Content Start -->
                        <div class="compare-page-content-wrap">
                            <div class="compare-table table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="first-column">#</td>
                                            <td class="first-column">Product</td>
                                            <td class="first-column">Price</td>
                                            <td class="first-column">Remove
                                            </td>
                                        </tr>
                                        <?php
                                        $customer_id = Session::get('customer_id');
                                        $get_compare = $product->get_compare($customer_id);
                                        if ($get_compare) {
                                            $i = 0;
                                            while ($result_compare = $get_compare->fetch_assoc()) {
                                                $i++
                                                    ?>
                                                <tr>
                                                    <td class="first-column">
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td class="product-image-title">
                                                        <a href="product-details.html" class="image">
                                                            <img class="img-fluid" style="width: 150px;"
                                                                src="admin/uploads/<?php echo $result_compare['image']; ?>"
                                                                alt="Compare Product">
                                                        </a>
                                                        <!-- <a href="#" class="category">Daimond</a> -->
                                                        <a href="product-details.html" class="title">
                                                            <?php echo $result_compare['productName']; ?>
                                                        </a>
                                                    </td>
                                                    <td class="first-column">
                                                        <?php echo $fm->format_currency($result_compare['price']); ?>
                                                    </td>
                                                    <td class="first-column"><a
                                                            href="product-details.php?proid=<?php echo $result_compare['productId'] ?>">
                                                            <i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Compare Page Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- compare main wrapper end -->

</main>
<!-- main wrapper end -->
<?php
include 'inc/footer.php';
?>