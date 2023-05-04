<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
class settings
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function show_slogan()
    {
        $query = "SELECT * FROM tbl_slogan WHERE id='1'";
        $result = $this->db->select($query);
        return $result;
    }


    public function update_slogan($data, $files)
    {
        $title = mysqli_real_escape_string($this->db->link, $data['title']);
        $slogan = mysqli_real_escape_string($this->db->link, $data['slogan']);


        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['logo']['name'];
        $file_size = $_FILES['logo']['size'];
        $file_temp = $_FILES['logo']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($title == '' || $slogan == '') {
            $alert = "<span class='error'>Fiels must be not empty</span>";
            return $alert;
        } else {
            if (!empty($file_name)) {
                // if ($file_size > 20480) {
                //     $alert = "<span class='error'>Image Size should be less then 20MB!
                //     </span>";
                //     return $alert;
                // } elseif (in_array($file_ext, $permited) === false) {
                //     $alert = "<span class='error'>You can upload only:-" . implode(",", $permited) . "</span>";
                //     return $alert;
                // }
                move_uploaded_file($file_temp, $uploaded_image);

                $query = "UPDATE tbl_slogan SET
                title='$title',
                slogan='$slogan',
                logo='$unique_image'
                WHERE id='1'";

            } else {
                $query = "UPDATE tbl_slogan SET
                title='$title',
                slogan='$slogan'
                WHERE id='1'";
            }
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'>Setting updated successfully</span>";
                return $alert;

            } else {
                $alert = "<span class='error'>Setting updated not success</span>";
                return $alert;
            }


        }
    }

}

?>