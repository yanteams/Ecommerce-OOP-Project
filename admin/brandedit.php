<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/brand.php'; ?>
<?php
$brand = new brand();
if (!isset($_GET['brandId']) || $_GET['brandId'] == NULL) {
    echo "<script>window.location ='brandlist.php'</script>";
} else {
    $id = $_GET['brandId'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brandName = $_POST['brandname'];
    $updatebrand = $brand->update_brand($brandName, $id);
}



?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa thương hiệu</h2>

        <div class="block copyblock">
            <?php
            if (isset($updatebrand)) {
                echo $updatebrand;
            }
            ?>
            <?php
            $get_brand_name = $brand->getbrandbyId($id);
            if ($get_brand_name) {
                while ($result = $get_brand_name->fetch_assoc()) {

                    ?>
                    <form action="" method="POST">
                        <table class="form">
                            <tr>
                                <td>
                                    <input name="brandname" value="<?php echo $result['brandName']; ?>" type="text"
                                        placeholder="Vui lòng thêm danh mục sản phẩm" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                }
            } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>