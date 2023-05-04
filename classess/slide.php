<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
class slide
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_slide($data, $files)
    {
        $slideTitle = mysqli_real_escape_string($this->db->link, $data['slideTitle']);
        $shortDescription = mysqli_real_escape_string($this->db->link, $data['shortDescription']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/slide/" . $unique_image;

        if (empty($slideTitle) || empty($shortDescription) || empty($description) || empty($file_name)) {
            $alert = "<span class='error'>Fiels must be not empty</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO `tbl_slide`(`slideTitle`, `shortDescription`, `description`,`image`)
             VALUES ('$slideTitle','$shortDescription','$description','$unique_image')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Insert slide successfully</span>";
                return $alert;

            } else {
                $alert = "<span class='error'>Insert slide not success</span>";
                return $alert;
            }

        }

    }
    // {
    //     $slideTitle = $this->fm->validation($slideTitle);
    //     $shortDescription = $this->fm->validation($shortDescription);
    //     $description = $this->fm->validation($description);
    //     $slideTitle = mysqli_real_escape_string($this->db->link, $slideTitle);
    //     $shortDescription = mysqli_real_escape_string($this->db->link, $shortDescription);
    //     $description = mysqli_real_escape_string($this->db->link, $description);
    //     $img = mysqli_real_escape_string($this->db->link, $img);
    //     if (empty($slideTitle) || empty($shortDescription) || empty($description) || empty($img)) {
    //         $alert = "<span class='error'>Slide must be not empty</span>";
    //         return $alert;
    //     } else {
    //         $query = "INSERT INTO `tbl_slide`(`slideTitle`, `shortDescription`, `description`,`img`)
    //          VALUES ('$slideTitle','$shortDescription','$description','$img')";
    //         $result = $this->db->insert($query);
    //         if ($result) {
    //             $alert = "<span class='success'>Insert slide successfully</span>";
    //             return $alert;

    //         } else {
    //             $alert = "<span class='error'>Insert slide not success</span>";
    //             return $alert;
    //         }

    //     }

    // }
    public function show_slide()
    {
        $query = "SELECT * FROM tbl_slide ORDER BY slideId DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_slide($id)
    {
        $query = "DELETE FROM tbl_slide WHERE slideId='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'>Slide deleted successfully</span>";
            return $alert;

        } else {
            $alert = "<span class='error'>Slide deleted not success</span>";
            return $alert;
        }
    }

    public function update_slide($data, $files, $id)
    {
        $slideTitle = mysqli_real_escape_string($this->db->link, $data['slideTitle']);
        $shortDescription = mysqli_real_escape_string($this->db->link, $data['shortDescription']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);


        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/slide/" . $unique_image;

        if ($slideTitle == '' || $shortDescription == '' || $description == '') {
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

                $query = "UPDATE tbl_slide SET
                slideTitle='$slideTitle',
                shortDescription='$shortDescription',
                description='$description',
                image='$unique_image'
                WHERE slideId='$id'";

            } else {
                $query = "UPDATE tbl_slide SET
                slideTitle='$slideTitle',
                shortDescription='$shortDescription',
                description='$description'
                WHERE slideId='$id'";
            }
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'>Slide updated successfully</span>";
                return $alert;

            } else {
                $alert = "<span class='error'>Slide updated not success</span>";
                return $alert;
            }


        }
    }
    public function getslidebyId($id)
    {
        $query = "SELECT * FROM tbl_slide WHERE slideId='$id'";
        $result = $this->db->select($query);
        return $result;
    }

}

?>