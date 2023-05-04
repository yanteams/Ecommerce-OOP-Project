<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
class cart
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function addtocart($product_stock, $quantity, $id)
    {
        $quantity = $this->fm->validation($quantity);
        $product_stock = $this->fm->validation($product_stock);
        if (!is_numeric($quantity)) {
            return false; // Số lượng không hợp lệ
        }
        $quantity = intval($quantity);
        $product_stock = intval($product_stock);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $product_stock = mysqli_real_escape_string($this->db->link, $product_stock);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();
        $query_pd = "SELECT * FROM tbl_product WHERE productId ='$id'";
        $result_pd = $this->db->select($query_pd)->fetch_assoc();
        $img = $result_pd['image'];
        $productName = $result_pd['productName'];
        $price = $result_pd['price'];
        $check_cart = "SELECT * FROM `tbl_cart` WHERE `productId` ='$id' AND `sId`='$sId'";
        $result_check_cart = $this->db->select($check_cart);

        if ($quantity <= $product_stock) {
            if ($result_check_cart) {
                $alert = "<span class='error' style='font-size:18px'>Product already added</span>";
                return $alert;
            } else {

                $query_insert = "INSERT INTO `tbl_cart`(`productId`, `sId`, `productName`, `price`, `quantity`, `image`, `stock`) 
                VALUES ('$id','$sId','$productName','$price','$quantity','$img','$product_stock')";
                $insert_cart = $this->db->insert($query_insert);
                if ($result_pd) {
                    header('location:cart.php');
                } else {
                    header('location:404.php');
                }
            }
        } else {
            $alert = "<span class='error' style='font-size:18px'>The order quantity is less than or equal to the available stock.</span>";
            return $alert;
        }


    }
    public function get_product_cart()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE `sId`='$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_product_cart_checkout()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE `sId`='$sId' AND tbl_cart.status=1";
        $result = $this->db->select($query);
        return $result;
    }
    public function check_cart()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE `sId`='$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_quantity_cart($stock, $quantity, $cartId)
    {
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $stock = mysqli_real_escape_string($this->db->link, $stock);
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);
        if ($stock > $quantity) {
            $query = "UPDATE `tbl_cart` SET
            `quantity`='$quantity'
            WHERE `cartId`='$cartId'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success' style='font-size:18px'>Product quantity updated successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error' style='font-size:18px'>Product quantity updated not successfully</span>";
                return $alert;
            }
        } else {
            $alert = "<span class='error' style='font-size:18px'>There is an insufficient quantity of inventory available.</span>";
            return $alert;
        }

    }

    public function del_cart($cartid)
    {
        $cartid = mysqli_real_escape_string($this->db->link, $cartid);
        $query = "DELETE FROM tbl_cart WHERE cartId='$cartid'";
        $result = $this->db->delete($query);
        if ($result) {
            header('location: cart.php');
        } else {
            $alert = "<span class='error'>Cart deleted not successfully</span>";
            return $alert;
        }
    }
    public function del_all_cart()
    {
        $sId = session_id();
        $query = "DELETE FROM tbl_cart WHERE `sId`='$sId'";
        $result = $this->db->delete($query);
        return $result;
    }
    public function del_compare($customer_id)
    {
        $query = "DELETE FROM tbl_compare WHERE `customer_id`='$customer_id'";
        $result = $this->db->delete($query);
        return $result;
    }
    public function insertOrders($customer_id)
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE `sId`='$sId'";
        $get_pd = $this->db->select($query);
        $order_code = rand(0000, 9999);
        $query_placed = "INSERT INTO `tbl_placed`(`order_code`, `status`, `customer_id`) 
        VALUES ('$order_code','0','$customer_id')";
        $insert_placed = $this->db->insert($query_placed);
        if ($get_pd) {
            while ($result = $get_pd->fetch_assoc()) {
                $productId = $result['productId'];
                $productName = $result['productName'];
                $quantity = $result['quantity'];
                $price = $result['price'] * $quantity;
                $image = $result['image'];
                $query_order = "INSERT INTO `tbl_order`(`order_code`,`productId`, `productName`, `customer_id`, `quantity`, `price`, `image`) 
            VALUES  ('$order_code','$productId','$productName','$customer_id','$quantity','$price','$image')";
                $insert_order = $this->db->insert($query_order);
            }
            return true;
        }

        return false;
    }
    public function getAmountprice($customer_id)
    {
        $query = "SELECT price FROM tbl_order WHERE `customer_id`='$customer_id'";
        $get_price = $this->db->select($query);
        return $get_price;
    }
    public function getorders_customer($id)
    {
        $query = "SELECT * FROM tbl_order WHERE `customer_id`='$id'";
        $get_orders = $this->db->select($query);
        return $get_orders;
    }
    public function get_inbox_cart_history($customer_id)
    {
        $query = "SELECT * FROM tbl_placed,tbl_customer
        WHERE tbl_placed.customer_id=tbl_customer.id
        AND tbl_placed.customer_id='$customer_id'
        ORDER BY date_created";
        $get_cart_history = $this->db->select($query);
        return $get_cart_history;
    }
    
    public function get_inbox_cart()
    {
        $query = "SELECT * FROM tbl_placed,tbl_customer
        WHERE tbl_placed.customer_id=tbl_customer.id
        ORDER BY date_created";
        $get_cart_ordered = $this->db->select($query);
        return $get_cart_ordered;
    }
    public function shifted($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
       
        $query = "UPDATE `tbl_placed` SET
        `status`='1'
        WHERE `order_code`='$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success' style='font-size:18px'>Update order successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error' style='font-size:18px'>Update order not successfully</span>";
            return $alert;
        }
    }
    public function confirm_received($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
       
        $query = "UPDATE `tbl_placed` SET
        `status`='2'
        WHERE `order_code`='$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success' style='font-size:18px'>Update order successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error' style='font-size:18px'>Update order not successfully</span>";
            return $alert;
        }
    }
    public function del_shifted($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM `tbl_placed` 
    WHERE `order_code`='$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success' style='font-size:18px'>Delete order successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error' style='font-size:18px'>Delete order not successfully</span>";
            return $alert;
        }
    }
    public function shifted_confirm($id, $time, $price)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $time = mysqli_real_escape_string($this->db->link, $time);
        $price = mysqli_real_escape_string($this->db->link, $price);
        $query = "UPDATE `tbl_order` SET
        `status`='2'
        WHERE `customer_id`='$id'
        AND `date_order`='$time'
        AND `price`='$price'";
        $result = $this->db->update($query);
        return $result;
    }
}
?>