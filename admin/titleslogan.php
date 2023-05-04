<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/settings.php'; ?>
<?php
$settings = new settings();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $updateSlogan = $settings->update_slogan($_POST, $_FILES);
}



?>
<style>
    .Leftside {
        float: left;
        width: 70%
    }

    .rightside {
        float: left;
        width: 20%
    }

    .rightside img {
        height: 160px;
        width: 170px;
    }
</style>
<div class="grid_10 pull-left">
    <div class="box round first grid">
        <h2>Chỉnh sửa website</h2>

        <div class="block copyblock">
            <?php
            if (isset($updateSlogan)) {
                echo $updateSlogan;
            }
            ?>
            <?php
            $show_slogan = $settings->show_slogan();
            if ($show_slogan) {
                $i = 0;
                while ($result = $show_slogan->fetch_assoc()) {
                    $i++;
                    ?>
                    <form action="titleslogan.php" method="POST" enctype="multipart/form-data">
                        <table class="form">
                            <tr>
                                <td>
                                    <input name="title" type="text" value="<?php echo $result['title']; ?>" class="medium" />
                                    <input name="slogan" type="text" value="<?php echo $result['slogan']; ?>"
                                        class="medium" />
                                    <input name="logo" type="file" />


                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <img src="uploads/<?php echo $result['logo']; ?>" width="200">

                <?php }
            } ?>
        </div>

    </div>
</div>

<?php include 'inc/footer.php'; ?>