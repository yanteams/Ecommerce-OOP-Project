<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/slide.php'; ?>
<?php
$slide = new slide();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $insertSlide = $slide->insert_slide($_POST, $_FILES);
}



?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm slide</h2>

        <div class="block copyblock">
            <?php
            if (isset($insertSlide)) {
                echo $insertSlide;
            }
            ?>
            <form action="slideadd.php" method="POST" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <input name="slideTitle" type="text" placeholder="Vui lòng nhập tiêu đề" class="medium" />
                            <input name="shortDescription" type="text" placeholder="Vui lòng nhập mô tả ngắn"
                                class="medium" />
                            <input name="description" type="text" placeholder="Vui lòng nhập mô tả" class="medium" />
                            <input name="image" type="file" />


                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Add slide" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>