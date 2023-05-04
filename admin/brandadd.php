<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/brand.php'; ?>
<?php
$brand = new brand();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brandName = $_POST['brandname'];
    $insertbrand = $brand->insert_brand($brandName);
}


?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm thương hiệu sản phẩm</h2>

        <div class="block copyblock">
            <?php
            if (isset($insertbrand)) {
                echo $insertbrand;
            }
            ?>
            <form action="brandadd.php" method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <input name="brandname" type="text" placeholder="Vui lòng thêm thương hiệu"
                                class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>