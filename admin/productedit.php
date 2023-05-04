﻿<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/brand.php'; ?>
<?php include '../classess/category.php'; ?>
<?php include '../classess/product.php'; ?>
<?php
$pd = new product();
if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
    echo "<script>window.location ='productlist.php'</script>";
} else {
    $id = $_GET['productid'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $updateProduct = $pd->update_product($_POST, $_FILES, $id);
}


?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Chỉnh sửa sản phẩm</h2>
        <div class="block">
            <?php
            if (isset($updateProduct)) {
                echo $updateProduct;
            }
            ?>
            <?php
            $get_product_by_id = $pd->getproductbyId($id);
            if ($get_product_by_id) {
                while ($result_product = $get_product_by_id->fetch_assoc()) {

                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">

                            <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $result_product['productName']; ?>" name="productName"
                                        placeholder="Enter Product Name..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Quantity</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $result_product['productQuantity']; ?>" name="productQuantity"
                                        placeholder="Enter Quantity..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Category</label>
                                </td>
                                <td>
                                    <select id="select" name="category">
                                        <option>Select Category</option>
                                        <?php
                                        $cat = new category();
                                        $catlist = $cat->show_category();

                                        if ($catlist) {
                                            while ($result = $catlist->fetch_assoc()) {

                                                ?>
                                                <option <?php
                                                if ($result['catID'] == $result_product['catId']) {
                                                    echo 'Selected';
                                                }
                                                ?>
                                                    value="<?php echo $result['catID']; ?>"><?php echo $result['catName']; ?>
                                                </option>

                                            <?php }
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Brand</label>
                                </td>
                                <td>
                                    <select id="select" name="brand">
                                        <option>Select Brand</option>
                                        <?php
                                        $brand = new brand();
                                        $brandlist = $brand->show_brand();

                                        if ($brandlist) {
                                            while ($resultbrand = $brandlist->fetch_assoc()) {

                                                ?>
                                                <option <?php
                                                if ($resultbrand['brandId'] == $result_product['brandId']) {
                                                    echo 'Selected';
                                                }
                                                ?> value="<?php echo $resultbrand['brandId']; ?>"><?php echo $resultbrand['brandName']; ?>
                                                </option>

                                            <?php }
                                        } ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Description</label>
                                </td>
                                <td>
                                    <textarea name="description"
                                        class="tinymce"><?php echo $result_product['description']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Price</label>
                                </td>
                                <td>
                                    <input value="<?php echo ($result_product['price']); ?>" name="price" type="text"
                                        placeholder="Enter Price..." class="medium" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Upload Image</label>
                                </td>
                                <td>
                                    <img src="uploads/<?php echo $result_product['image']; ?>" width="90">
                                    <input name="image" type="file" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Product Type</label>
                                </td>
                                <td>
                                    <select id="select" name="type">
                                        <option>Select Type</option>
                                        <?php
                                        if ($result_product['type'] == 1) {
                                            ?>
                                            <option selected value="1">Featured</option>
                                            <option value="0">Non-Featured</option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="1">Featured</option>
                                            <option selected value="0">Non-Featured</option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php }
            } ?>

        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>