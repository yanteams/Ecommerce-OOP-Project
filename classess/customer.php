<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
class customer
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_customers($data)
    {
        $fullname = mysqli_real_escape_string($this->db->link, $data['fullname']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        $repassword = mysqli_real_escape_string($this->db->link, md5($data['repassword']));

        if ($fullname == "" || $email == "" || $password == "" || $repassword == "") {
            $alert = "<span class='error'>Fiels must be not empty</span>";
            return $alert;
        } elseif ($password !== $repassword) {
            $alert = "<span class='error'>Password not match</span>";
            return $alert;
        } else {

            $check_email = "SELECT * FROM `tbl_customer` WHERE email = '$email' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if ($result_check) {
                $alert = "<span class='error'>Email already existed</span>";
                return $alert;
            } else {
                $query = "INSERT INTO tbl_customer(fullname,email,password) 
        VALUES('$fullname','$email','$password')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='success'>Register successfully</span>";
                    return $alert;

                } else {
                    $alert = "<span class='error'>Register not success</span>";
                    return $alert;
                }

            }
        }
    }
    public function login_customers($data)
    {
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        if ($email == "" || $password == "") {
            $alert = "<span class='error'>Fiels must be not empty</span>";
            return $alert;
        } else {

            $check_login = "SELECT * FROM `tbl_customer` WHERE email = '$email' AND password='$password' LIMIT 1";
            $result_check = $this->db->select($check_login);
            if ($result_check != false) {
                $value = $result_check->fetch_assoc();
                Session::set('customer_login', true);
                Session::set('customer_id', $value['id']);
                Session::set('customer_fullname', $value['fullname']);
                header('location:order.php');
            } else {
                $alert = "<span class='error'>Email & Password dosen't match</span>";
                return $alert;
            }
        }

    }
    public function show_customers($id)
    {
        $query = "SELECT * FROM tbl_customer WHERE id = '$id'";
        $reuslt = $this->db->select($query);
        return $reuslt;
    }
    public function show_order($order_code)
    {
        $query = "SELECT * FROM tbl_order WHERE order_code = '$order_code'";
        $reuslt = $this->db->select($query);
        return $reuslt;
    }
    public function update_customers($data, $id)
    {
        $fullname = mysqli_real_escape_string($this->db->link, $data['fullname']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);

        if ($fullname == "" || $email == "" || $zipcode == "" || $phone == "" | $address == "") {
            $alert = "<span style='color:red'class='error'>Fiels must be not empty</span>";
            return $alert;
        } else {

            $query = "UPDATE tbl_customer SET fullname='$fullname', email='$email', zipcode='$zipcode', phone='$phone', address='$address'
            WHERE id='$id'";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Customer updated successfully</span>";
                return $alert;

            } else {
                $alert = "<span class='error'>Customer updated not success</span>";
                return $alert;
            }

        }
    }
}
?>