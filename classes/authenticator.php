<?php
require 'db_connect.php';
session_start();


/**
 * this class will check admin login primarily----------- todo---------- include code to check student login.
 *
 * @author Neloy
 */
class Authenticator {

    public function __construct() {
        $db_obj = new Db_Connect();
    }

/***********>>>>>>>>>>>>>>>Function to check ADMIN login<<<<<<<<<<<<<<<******************/    
    public function check_admin_login($data) {
        $password = md5($data['admin_password']);
        $sql = "SELECT * FROM tbl_admin WHERE admin_email_address='$data[admin_email_address]' AND admin_password='$password' ";
        $result = mysql_query($sql);

        if ($result) {
            $admin_info = mysql_fetch_assoc($result);
            if ($admin_info) {
                $_SESSION['admin_name'] = $admin_info['admin_name'];
                $_SESSION['admin_id'] = $admin_info['admin_id'];
                header('Location: admin_master.php');
            } else {
                //header('Location: index.php');
                $message = 'Your User Name or Password is Invalid! ';
            }
        }
        return $message;
    }
    
    
    

}
//class end
