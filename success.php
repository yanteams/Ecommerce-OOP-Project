<?php
include 'inc/header.php';
sleep(5);
header('location: history_order.php');
?>

<!-- main wrapper start -->
<main>

    <!-- breadcrumb area start -->

    <div class="choosing-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-2">
                        <hr>
                        <h2>Success Order</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="tab-content reviews-tab">
                    <div class="tab-pane fade" id="tab_one" role="tabpanel">
                        <div class="tab-one">
                            <p>123v1231</p>.....
                        </div>
                    </div>
                    <div class="tab-pane fade active show" id="tab_two" role="tabpanel">
                        <table class="table table-bordered">
                            <tbody>
                                <?php
                                $customer_id = Session::get('customer_id');
                                $get_amount = $ct->getAmountprice($customer_id);
                                if ($get_amount) {
                                    $amount = 0;
                                    while ($result = $get_amount->fetch_assoc()) {
                                        $price = $result['price'];
                                        $amount += $price;
                                        ?>
                                        <tr>
                                            <td>Total price</td>
                                            <td>
                                                <?php $vat = $amount * 0.1;
                                                $total = $vat + $amount;
                                                echo $fm->format_currency($total);
                                                ?>
                                            </td>
                                        </tr>

                                        <?php

                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
    </div>
    <!-- choosing area end -->

</main>
<!-- main wrapper end -->
<?php
include 'inc/footer.php';
?>