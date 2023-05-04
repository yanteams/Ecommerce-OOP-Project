<?php
$filepath=realpath(dirname(__FILE__));
include ($filepath.'/../lib/session.php');
Session::checkLogin();
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
class adminlogin
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login_admin($username, $passwd)
    {
        $username = $this->fm->validation($username);
        $passwd = $this->fm->validation($passwd);
        // validation lib helpers
        // check valid word
        $username = mysqli_real_escape_string($this->db->link, $username);
        $passwd = mysqli_real_escape_string($this->db->link, $passwd);
        // link lib database
        // mysqli_real_escape_string nhiều biến
        // connect database
        if (empty($username) || empty($passwd)) {
            $alert = 'Username and Password must be not empty';
            return $alert;
        } else {
            $query = "SELECT * FROM tbl_admin WHERE adminUser='$username' AND adminPass='$passwd' LIMIT 1";
            $result = $this->db->select($query);
            // link select database
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set('login', true);
                Session::set('adminID', $value['adminID']);
                Session::set('adminName', $value['adminName']);
                Session::set('adminUser', $value['adminUser']);
                header('location:index.php');
            } else {
                $alert = 'Username and Password wrong';
                return $alert;
            }

        }

    }

}

?>