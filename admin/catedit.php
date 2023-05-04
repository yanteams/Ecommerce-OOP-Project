<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/category.php'; ?>
<?php
$cat = new category();
if (!isset($_GET['catID']) || $_GET['catID'] == NULL) {
    echo "<script>window.location ='catlist.php'</script>";
} else {
    $id = $_GET['catID'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catName = $_POST['catname'];
    $updatecat = $cat->update_category($catName,$id);
}



?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa danh mục</h2>

        <div class="block copyblock">
            <?php
            if (isset($updatecat)) {
                echo $updatecat;
            }
            ?>
            <?php
            $get_cate_name = $cat->getcatbyId($id);
            if ($get_cate_name) {
                while ($result = $get_cate_name->fetch_assoc()) {

                    ?>
                    <form action="" method="POST">
                        <table class="form">
                            <tr>
                                <td>
                                    <input name="catname" value="<?php echo $result['catName']; ?>" type="text"
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