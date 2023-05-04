<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/slide.php'; ?>
<?php
$slide = new slide();
if (!isset($_GET['slideId']) || $_GET['slideId'] == NULL) {
    echo "<script>window.location ='productlist.php'</script>";
} else {
    $id = $_GET['slideId'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $updateSlide = $slide->update_slide($_POST, $_FILES, $id);
}


?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Chỉnh sửa slide</h2>
        <div class="block">
            <?php
            if (isset($updateSlide)) {
                echo $updateSlide;
            }
            ?>
            <?php
            $get_slide_by_id = $slide->getslidebyId($id);
            if ($get_slide_by_id) {
                while ($result_slide = $get_slide_by_id->fetch_assoc()) {

                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">

                            <tr>
                                <td>
                                    <label>Title</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $result_slide['slideTitle']; ?>" name="slideTitle"
                                        placeholder="Enter slide title..." class="medium" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Short description</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $result_slide['shortDescription']; ?>"
                                        name="shortDescription" placeholder="Enter short description..." class="medium" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Description</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $result_slide['description']; ?>" name="description"
                                        placeholder="Enter description..." class="medium" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Upload Image</label>
                                </td>
                                <td>
                                    <img src="uploads/slide/<?php echo $result_slide['image']; ?>" width="90">
                                    <input name="image" type="file" />
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