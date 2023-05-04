<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
class product
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_product($data, $files)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($productQuantity == "" | $productName == "" || $category == "" || $brand == "" || $description == "" || $type == "" || $price == "" || $file_name == "") {
            $alert = "<span class='error'>Fiels must be not empty</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName,productQuantity,catId,brandId,description, type, price,image) 
            VALUES('$productName','$productQuantity','$category','$brand','$description','$type', '$price', '$unique_image')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Insert product successfully</span>";
                return $alert;

            } else {
                $alert = "<span class='error'>Insert product not success</span>";
                return $alert;
            }

        }

    }
    public function show_product()
    {
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
        FROM tbl_product 
        INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catID
        INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
        ORDER BY tbl_product.productId DESC";
        // $query = "SELECT * FROM tbl_product ORDER BY productId DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_product($id)
    {
        $query = "DELETE FROM tbl_product WHERE productId='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'>Product deleted successfully</span>";
            return $alert;

        } else {
            $alert = "<span class='error'>Product deleted not success</span>";
            return $alert;
        }
    }
    public function delete_wishlist($proid, $customer_id)
    {
        $query = "DELETE FROM tbl_wishlist WHERE productId='$proid' AND customer_id='$customer_id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'>Product deleted successfully</span>";
            return $alert;

        } else {
            $alert = "<span class='error'>Product deleted not success</span>";
            return $alert;
        }
    }

    public function update_product($data, $files, $id)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($productQuantity == "" | $productName == "" || $category == "" || $brand == "" || $description == "" || $type == "" || $price == "") {
            $alert = "<span class='error'>Fiels must be not empty</span>";
            return $alert;
        } else {
            if (!empty($file_name)) {
                if ($file_size > 20480) {
                    $alert = "<span class='error'>Image Size should be less then 20MB!
                    </span>";
                    return $alert;
                } elseif (in_array($file_ext, $permited) === false) {
                    $alert = "<span class='error'>You can upload only:-" . implode(",", $permited) . "</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);

                $query = "UPDATE tbl_product SET
                productName='$productName',
                productQuantity='$productQuantity',
                catId='$category',
                brandId='$brand',
                description='$description',
                type='$type',
                image='$unique_image',
                price='$price'
                WHERE productId='$id'";

            } else {
                $query = "UPDATE tbl_product SET
                productName='$productName',
                productQuantity='$productQuantity',
                catId='$category',
                brandId='$brand',
                description='$description',
                type='$type',
                price='$price'
                WHERE productId='$id'";
            }
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'>Product updated successfully</span>";
                return $alert;

            } else {
                $alert = "<span class='error'>Product updated not success</span>";
                return $alert;
            }


        }
    }
    public function getproductbyId($id)
    {
        $query = "SELECT * FROM tbl_product WHERE productId ='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    // END BACKEND
    public function getproduct_feathered()
    {
        $query = "SELECT * FROM tbl_product WHERE type ='1'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_new()
    {
        $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_compare($customer_id)
    {
        $query = "SELECT * FROM tbl_compare WHERE customer_id='$customer_id' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_wlist($customer_id)
    {
        $query = "SELECT * FROM tbl_wishlist WHERE customer_id='$customer_id' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_details($id)
    {
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
        FROM tbl_product 
        INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catID
        INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
        WHERE tbl_product.productId='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function insertCompare($productId, $customer_id)
    {
        $productId = mysqli_real_escape_string($this->db->link, $productId);
        $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
        $query_pd = "SELECT * FROM tbl_product WHERE productId ='$productId'";
        $result_pd = $this->db->select($query_pd)->fetch_assoc();

        $image = $result_pd['image'];
        $productName = $result_pd['productName'];
        $price = $result_pd['price'];
        $check_compare = "SELECT * FROM `tbl_compare` WHERE `productId` ='$productId' AND `customer_id`='$customer_id'";
        $result_check_compare = $this->db->select($check_compare);
        if ($result_check_compare) {
            $alert = "<span class='error'>Product already added to compare</span>";
            return $alert;
        } else {

            $query_insert = "INSERT INTO `tbl_compare`(`customer_id`, `productId`, `productName`, `price`, `image`) 
        VALUES ('$customer_id','$productId','$productName','$price','$image')";
            $insert_compare = $this->db->insert($query_insert);
            if ($insert_compare) {
                $alert = "<span class='success'>Added compare successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Added compare not successfully</span>";
                return $alert;
            }
        }
    }
    public function insertWishlist($productId, $customer_id)
    {
        $productId = mysqli_real_escape_string($this->db->link, $productId);
        $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
        $check_wlist = "SELECT * FROM `tbl_wishlist` WHERE `productId` ='$productId' AND `customer_id`='$customer_id'";
        $result_check_wlist = $this->db->select($check_wlist);
        if ($result_check_wlist) {
            $alert = "<span class='error'>Product already added to wishlist</span>";
            return $alert;
        } else {
            $query_pd = "SELECT * FROM tbl_product WHERE productId ='$productId'";
            $result_pd = $this->db->select($query_pd)->fetch_assoc();

            $image = $result_pd['image'];
            $productName = $result_pd['productName'];
            $price = $result_pd['price'];

            $query_insert = "INSERT INTO `tbl_wishlist`(`customer_id`, `productId`, `productName`, `price`, `image`) 
        VALUES ('$customer_id','$productId','$productName','$price','$image')";
            $insert_wishlist = $this->db->insert($query_insert);
            if ($insert_wishlist) {
                $alert = "<span class='success'>Added wishlist successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Added wishlist not successfully</span>";
                return $alert;
            }
        }
    }
    public function search_product($keyword)
    {
        $keyword = $this->fm->validation($keyword);
        $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$keyword%'";
        $result = $this->db->select($query);
        return $result;
    }
}

?>